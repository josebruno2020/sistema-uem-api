<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\ClassModel;
use App\Models\Module;
use App\Models\Question;
use App\Models\User;
use App\Services\AnswerServices;
use App\Services\ModuleServices;
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

    /**
     * Função para retornar os módulos para montar o menu;
     */
    public function index()
    {
        $modules = $this->module->query()
            ->where('is_preparatory', false)
            ->get();
        
        
        $data = ['modules' => $modules];

        return $this->sendData($data);
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
            ->where('is_preparatory', false)
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
    public function preparatory()
    {
        $module = $this->module->query()->where('is_preparatory', true)->first();
        $questions = $this->question->query()->where('module_id', $module->id)->get();
        
        $data = [
            'module' => $module,
            'questions' => $questions
        ];
        return $this->sendData($data);
    }

    public function evaluatePreparatory(Request $request, AnswerServices $answerServices)
    {
        $answers = $request->answer;
        $moduleActive = $answerServices->UserAnswer($answers);
        
        $module = $this->module->find($moduleActive);
        return $this->sendData([
            'module_active' => $moduleActive,
            'slug' => $module->slug, 
            'msg' => 'Resposta enviada com sucesso!'
        ]);
    }


    /**
     * Module Questions
     * @param int $id
     */
    public function questions(int $id)
    {
        $module = $this->module->find($id);
        $questions = $this->question->query()->where('module_id', $module->id)->get();
        
        $data = [
            'module' => $module,
            'questions' => $questions
        ];
        return $this->sendData($data);
    }


    /**
     * Evaluate module questions 
     */
    public function evaluateQuestions(Request $request, AnswerServices $answerServices)
    {
        $answers = $request->answer;

        $correctAnswers = 0;
        $incorrectAnswers = [];
        foreach($answers as $key => $answer) {
            $question = $this->question->find($key);
            if($answer == $question->correct) {
                $correctAnswers++;
            } else {
                array_push($incorrectAnswers, $question->number);
            }
        }

        $percent = $answerServices->calculatePorcentage($correctAnswers, count($answers));

        $data = [
            'incoorectAnswers' => $incorrectAnswers,
            'percent' => $percent
        ];

        if($percent <= 80) {
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
            $value = $moduleServices->userFinshedAllModules($loggedUser);            
        }
        
        return $this->sendData([
            'module_active' => $moduleActive, 
            'is_finished' => $value
        ]);
        

        
    }
}

