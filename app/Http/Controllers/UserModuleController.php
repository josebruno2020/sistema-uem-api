<?php

namespace App\Http\Controllers;

use App\Services\UserModuleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserModuleController extends Controller
{
    public function show(int $moduleId): JsonResponse
    {
        $userModule = UserModuleService::getByModuleId($moduleId);
        return $this->sendData($userModule);
    }

    public function create(Request $request): JsonResponse
    {
        $moduleId = $request->get('module_id');
        $userModule = UserModuleService::createUserModule($moduleId);
        return $this->sendData($userModule, Response::HTTP_CREATED);
    }
}
