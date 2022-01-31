<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function showLogin() {
        return view('pages.login-form');
    }

    public function showSignup() {
        return view('pages.signup-form');
    }

    public function signup(Request $request) {
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $newUser = new User();
        $newUser -> name = $request -> input('name');
        $newUser -> email = $request -> input('email');
        $newUser -> password = Hash::make($request -> input('password'));
        $newUser -> save();

        return view('pages.login-form');
    }

    public function login(Request $request) {
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/') -> withSuccess('Вы вошли');
        };

        return view('pages.login-form');
    }

    public function logout() {
        Auth::logout();
        return view('pages.main');
    }
}
