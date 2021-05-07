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
        $token =  Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);
        if($token) {
            return $this->sendData(['token' => $token]);
            // return redirect()->route('module.preparatory');

        } else {
            return response()->json(['error' => 'Senha e/ou usuário inválidos'], 401);
        }

        
    }


    
}
