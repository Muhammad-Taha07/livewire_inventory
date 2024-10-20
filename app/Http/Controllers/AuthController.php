<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest\LoginRequest;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            Session::flash('success', 'Login successful! Welcome back.');
            return redirect()->intended('dashboard');
        }

        Session::flash('error', 'Login failed. Please check your credentials and try again.');
        
        // Redirect back
        return redirect()->back();
    }
}
