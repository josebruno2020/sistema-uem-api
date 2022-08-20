<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\ClassModel;
use App\Models\Module;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use App\Services\AnswerService;
use App\Services\ModuleServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    protected $module;
    protected $question;
    protected $classModel;
    public function __construct(Module $module, Question $question, ClassModel $classModel)
    {
        $this->module = $module;
        $this->question = $question;
        $this->classModel = $classModel;
    }

    public function index(): JsonResponse
    {
        $modules = $this->module->query()
            ->orderBy('id')
            ->get()
            ->toArray();


        return $this->sendData($modules);
    }

    public function show(int $id)
    {
        $module = $this->module->find($id);
        if(!$module) {
            return response('', 404);
        }

        return $this->sendData(['module' => $module]);
    }

    /**
     * Module Screen
     */
    public function slug(string $slug)
    {
        $module = $this->module->query()
            ->where('slug', $slug)
            ->first();

        if(!$module) {
            return response([], 404);
        }
        $data = ['module' => $module];
        return $this->sendData($data);
    }

    /**
     * Preparatory Questions
     */
    public function preparatory(int $id)
    {
        $module = $this->module->query()->where('id', $id)->first();
        $quiz = Quiz::query()
            ->where('module_id', $module->id)
            ->where('is_preparatory', true)
            ->with('questions')
            ->first();

        $data = [
            'module' => $module,
            'quiz' => $quiz
        ];
        return $this->sendData($data);
    }

    public function evaluatePreparatory(Request $request, AnswerService $answerServices)
    {
        $answers = $request->answer;
        $answerServices->UserAnswer($answers);

        return $this->sendData([
            'msg' => 'Resposta enviada com sucesso!'
        ]);
    }

    public function questions(int $id)
    {
        $module = $this->module->find($id);
        $quiz = Quiz::query()
            ->where('module_id', $module->id)
            ->where('is_preparatory', false)
            ->with('questions')
            ->first();

        $data = [
            'module' => $module,
            'quiz' => $quiz
        ];
        return $this->sendData($data);
    }


    /**
     * Evaluate module questions
     */
    public function evaluateQuestions(Request $request, AnswerService $answerServices)
    {
        $answers = $request->answer;

        $correctAnswers = 0;
        $incorrectAnswers = [];
        foreach($answers as $key => $answer) {
            $question = $this->question->find($key);
            if($answer == $question->correct) {
                $correctAnswers++;
            } else {
                $incorrectAnswers[] = $question->number;
            }
        }

        $percent = $answerServices->calculatePorcentage($correctAnswers, count($answers));

        $data = [
            'incoorectAnswers' => $incorrectAnswers,
            'percent' => $percent
        ];

        if($percent < 80) {
            return response()->json($data, 206);
        }

        $answerServices->UserAnswer($answers, false);
        return $this->sendData($data);

    }

    public function updateModuleActive(ModuleServices $moduleServices)
    {
        $loggedUser = Auth::user();
        $moduleActive = $moduleServices->updateModuleActive($loggedUser);
        $totalModules = $this->module->count();
        $value = false;
        if($moduleActive > $totalModules) {
            $value = $moduleServices->userFinshedAllModules($loggedUser, $totalModules);
        }

        return $this->sendData([
            'module_active' => $moduleActive,
            'is_finished' => $value
        ]);
    }
}

