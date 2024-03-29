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
        $moduleSlug = $request->get('slug');
        $userModule = UserModuleService::createUserModule($moduleSlug);
        return $this->sendData($userModule, Response::HTTP_CREATED);
    }
}
