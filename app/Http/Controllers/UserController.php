<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AddProperty;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('pages.userProfile', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $properties = AddProperty::where
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('userProfile')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function properties()
    {
        $user = Auth::user();
        $properties = $user->properties; // Assuming you have a relationship set up
        return view('pages.userProperties', compact('properties'));
    }


    public function favourites()
    {
        $user = Auth::user();
        $favourites = $user->favourites; // Assuming you have a relationship set up
        return view('pages.userFavourites', compact('favourites'));
    }


public function userProfile()
{
    $user = Auth::user(); // Get the authenticated user
    $properties = $user->properties; // Get properties belonging to the user

    return view('pages.userProfile', compact('user', 'properties'));
}


}
