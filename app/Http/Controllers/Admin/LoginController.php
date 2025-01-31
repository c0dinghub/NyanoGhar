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
        // Validate the login form
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to login the user
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::user();

            // Check if the user has the admin role
            if ($user->role !== 'admin') {
                // Log the user out if they are not an admin
                Auth::logout();

                // Redirect to login page with error message
                return redirect()->route('admin.login.page')->withErrors(['admin_access' => 'You do not have admin access.']);
            }
            // if ($user->role == 'user') {
            //     // Log the user out if they are not an admin
            //     Auth::logout();

            //     // Redirect to login page with error message
            //     return redirect()->route('login')->withErrors(['Your ' => 'You do not have admin access.']);
            // }

            // Redirect to the admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        }

        // If authentication fails, redirect back to login with an error
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

}
