<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        $flash = $request->session()->get('flash', null);
        return view('guest.login',compact('flash'));
    }

    public function login(Request $request)
    {
        $data = $request->only([
            'email', 'password'
        ]);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true)) {

            return redirect()->route('module.preparatory');

        } else {
            $flash = $request->session()->flash('flash', 'Usuário e/ou senha inválidos!');
            return redirect()->back()->with($flash);
        }

        
    }


    
}
