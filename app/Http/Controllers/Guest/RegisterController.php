<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function save(RegisterRequest $request)
    {
        $data = $request->only([
            'name','phone', 'email', 'password'
        ]);

        User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);

        $data = ['token' => $token];
        return $this->sendData($data);
        // return redirect()->route('module.preparatory');
    }

}
