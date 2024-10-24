<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        // Add the stateless() method to bypass state validation during development
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Create a new user if one doesn't exist
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
            ]);
            Auth::login($newUser);
        }

        // Redirect after successful login
        return redirect()->intended('/');
    } catch (\Exception $e) {
        return redirect()->route('login')->withErrors(['login' => 'Failed to login using Google.']);
    }
}

}



