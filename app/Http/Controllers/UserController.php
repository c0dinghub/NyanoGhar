<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AddProperty;
use App\Models\Favourite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public $favourites = [];

    public function edit()
    {
        $user = Auth::user();
        $favourites = $this->favourites;
        return view('pages.userProfile', compact('user', 'favourites'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

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
        $properties = $user->properties;
        return view('pages.userProperties', compact('properties'));
    }

    public function userProfile()
    {
        $user = Auth::user();
        $properties = $user->properties;
        $favouritePropertyIds = Favourite::where('user_id', $user->id)->pluck('property_id')->toArray();
        $favourites = AddProperty::whereIn('id', $favouritePropertyIds)->get();

        return view('pages.userProfile', compact('user', 'properties', 'favourites'));
    }

    public function addToFavourites($propertyId)
    {
        $property = AddProperty::find($propertyId);

        if (!$property) {
            return redirect()->back()->with('error', 'Property not found.');
        }

        Favourite::firstOrCreate([
            'user_id' => Auth::id(),
            'property_id' => $propertyId,
            'owner_id' => $property->user_id,
        ]);

        return redirect()->back()->with('success', 'Added to favourites!');
    }

    public function removeFromFavourites($propertyId)
    {
        Favourite::where('user_id', Auth::id())
            ->where('property_id', $propertyId)
            ->delete();

        return redirect()->back()->with('success', 'Removed from favourites!');
    }
}
