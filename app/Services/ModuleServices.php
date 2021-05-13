<?php

namespace App\Services;

use App\Models\User;

class ModuleServices {

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function updateModuleActive($loggedUser) :int
    {
        $moduleActive = (intval($loggedUser->module_active) + 1);

        $this->user->where('id', $loggedUser->id)->update([
            'module_active' => $moduleActive
        ]);
        

        return $moduleActive;
        
    }

    public function userFinshedAllModules($loggedUser)
    {
        $this->user->where('id', $loggedUser->id)->update([
            'is_finished' => true
        ]);

        return true;
    }

}