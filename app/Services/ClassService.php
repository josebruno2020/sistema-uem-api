<?php

namespace App\Services;

use App\Models\ClassModel;
use App\Models\Module;

class ClassService
{
    public static function createClassModel(Module $module, string $name, string $video, int $number): void
    {
        ClassModel::create([
            'module_id' => $module->id,
            'name' => $name,
            'video' => $video,
            'number' => $number
        ]);
    }
}
