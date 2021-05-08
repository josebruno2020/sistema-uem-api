<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\Module;
use App\Models\Question;
use App\Models\User;
use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    protected $module;
    protected $question;
    public function __construct(Module $module, Question $question)
    {
        $this->module = $module;
        $this->question = $question;
    }

    
    public function index()
    {
        $modules = $this->module->query()
            ->where('is_preparatory', false)
            ->get();
        $data = ['modules' => $modules];

        return $this->sendData($data);
        // // dd($slug);
        // $loggedUser = Auth::user();
        // $module = $this->module->query()
        //     ->where('slug', $slug)
        //     ->where('is_preparatory', false)
        //     ->first();
        

        // if(!$module) {
        //     abort(404);
        // }

        // //Proteções contra a pessoa acessar um modulo no qual ainda não está ativo;
        // if($loggedUser->module_active != $module->id) {
        //     $module = $this->module->find($loggedUser->module_active);
        //     if($module->id == 1) {
        //         return redirect()->route('module.preparatory');
        //     }
        //     return redirect()->route('module.index', $module->slug);
        // }

        // return view('module.index', compact('module', 'loggedUser'));
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
        return redirect()->route('module.index', ['slug' => $module->slug]);
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
    public function evaluateQuestions(Request $request)
    {
        $answers = $request->answer;
        dd($answers);
    }
}

