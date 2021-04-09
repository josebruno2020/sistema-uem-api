<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('guest.welcome');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('register.index');
    }
}
