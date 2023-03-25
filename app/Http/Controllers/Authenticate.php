<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Controller
{
    public function show()
    {
        return view('auth');
    }

    public function login(AuthFormRequest $request)
    {
        $data = $request->all();
        $remember = $request->has('remember');

        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']],
            $remember))
        {
            return redirect()->intended('/');
        }

        return redirect()->route('login')->withErrors('Invalid user email or password');
    }

    public function attach(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        dump($user);
    }
}
