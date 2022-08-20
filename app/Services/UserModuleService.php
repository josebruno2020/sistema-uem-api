<?php

namespace App\Services;

use App\Models\UserModule;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;

class UserModuleService
{
    public static function getByModuleId(int $moduleId): array
    {
        $userId = Auth::user()->id;
        $userModule = UserModule::query()->where('user_id', $userId)
            ->where('module_id', $moduleId)->first();

        if (!$userModule) throw new NotFound();

        return $userModule->toArray();
    }

    public static function createUserModule(int $moduleId): array
    {
        $userId = Auth::user()->id;
        $userModuleExistent = UserModule::query()->where('user_id', $userId)
            ->where('module_id', $moduleId)->first();

        if ($userModuleExistent) {
            return $userModuleExistent->toArray();
        }

        $userModule = new UserModule();
        $userModule->user_id = $userId;
        $userModule->module_id = $moduleId;
        $userModule->save();

        return $userModule->toArray();
    }
}
