<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $this->user;
    }

    /**
     * Registration Screen
     */
    public function index()
    {
        return view('guest.register');
    }

    /**
     * Register a new visitor
     */
    public function save(Request $request)
    {

    }

}
