<?php

namespace App\Http\Controllers;

use App\Models\AddProperty;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public $favourites=[];
    public function addToFavourites($propertyId)
    {
        // dd($property);

        $property_id = $propertyId;
        $property = AddProperty::where('id',$propertyId)->first();
        $owner_id = $property->user_id;
        $user_id = Auth::user()->id;

        Favourite::create([
            'user_id'=>$user_id,
            'property_id'=>$property_id,
            'owner_id'=>$owner_id,
            'favourites'=>$this->favourites
        ]);
        return redirect()->back()->with('success', 'Added to favorites!');
    }

    public function removeFromFavorites($propertyId)
    {
        $property = AddProperty::findOrFail($propertyId);
        return redirect()->back()->with('success', 'Removed from favorites!');
    }

    public function showFavourites()
    {
        $user = Auth::user()->id;
        // $favourites =getUserFavourites();
        $properties =Favourite::with('user')->where('user_id',$user)->get();
        // dd($favourites);
        $this->favourites = AddProperty::whereIn('id',$properties);

        return view('favourites.index', compact('favourites'));
    }
}
