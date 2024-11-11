<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($request->only('email','password')))
        {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email'=>'The provided credentials does not match our records.'
        ]);
    }
}
