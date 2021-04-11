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

