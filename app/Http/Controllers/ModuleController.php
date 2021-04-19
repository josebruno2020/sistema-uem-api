<?php

namespace App\Http\Controllers;

use App\Models\AnswerUser;
use App\Models\Module;
use App\Models\User;
use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    protected $module;
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * Module Screen
     */
    public function index(string $slug)
    {
        // dd($slug);
        $loggedUser = Auth::user();
        $module = $this->module->query()
            ->where('slug', $slug)
            ->where('is_preparatory', false)
            ->first();
        

        if(!$module) {
            abort(404);
        }

        //Proteções contra a pessoa acessar um modulo no qual ainda não está ativo;
        if($loggedUser->module_active != $module->id) {
            $module = $this->module->find($loggedUser->module_active);
            if($module->id == 1) {
                return redirect()->route('module.preparatory');
            }
            return redirect()->route('module.index', $module->slug);
        }

        return view('module.index', compact('module', 'loggedUser'));
    }

    /**
     * Preparatory Questions
     */
    public function preparatory()
    {
        $loggedUser = Auth::user();
        if($loggedUser->module_active != 1) {
            $module = $this->module->find($loggedUser->module_active);
            return view('module.index', compact('module', 'loggedUser'));
        }

        $module = $this->module->query()->where('is_preparatory', true)->first();

        return view('module.preparatory', compact('loggedUser', 'module'));
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
     */
    public function questions()
    {
        return view('module.questions');
    }


    /**
     * Evaluate module questions 
     */
    public function evaluateQuestions(Request $request)
    {
        
    }
}

