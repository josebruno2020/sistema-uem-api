<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Module;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $classModel;
    public function __construct(ClassModel $classModel)
    {
        $this->classModel = $classModel;
    }

    public function index(int $class_id)
    {
        $class = $this->classModel->find($class_id);
        if(!$class) {
            return response('', 404);
        }
        $module = Module::query()->select('id', 'name')->where('id', $class->module_id)->first();

        return $this->sendData(['class' => $class, 'module' =>$module]);
    }
}
