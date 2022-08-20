<?php

namespace App\Services;

use App\Models\Module;
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

    public static function createUserModule(string $moduleSlug): array
    {
        $module = Module::query()->where('slug', $moduleSlug)->first();

        if (!$module) throw new NotFound();

        $userId = Auth::user()->id;
        $userModuleExistent = UserModule::query()->where('user_id', $userId)
            ->where('module_id', $module->id)->first();

        if ($userModuleExistent) {
            return $userModuleExistent->toArray();
        }

        $userModule = new UserModule();
        $userModule->user_id = $userId;
        $userModule->module_id = $module->id;
        $userModule->save();

        return $userModule->toArray();
    }

    public static function finished(int $moduleId, string $type = 'preparatory' | 'final'): void
    {
        $userId = Auth::user()->id;
        switch ($type) {
            case 'preparatory':
                UserModule::query()->where('module_id', $moduleId)->where('user_id', $userId)
                    ->update([
                        'is_preparatory_done' => true
                    ]);
                break;
            case 'final':
                UserModule::query()->where('module_id', $moduleId)->where('user_id', $userId)
                    ->update([
                        'is_finished' => true
                    ]);
                break;
        }
    }
}
