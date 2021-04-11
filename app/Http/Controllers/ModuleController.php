<?php

namespace App\Http\Controllers;

use App\Models\Module;
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
        return view('module.preparatory', compact('loggedUser'));
    }

    public function evaluatePreparatory(Request $request)
    {

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

