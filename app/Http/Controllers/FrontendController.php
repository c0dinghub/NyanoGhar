<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Models\AddProperty;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function addProperty()
    {
        $provinces = Province::with('district')->get();
        $districts = District::all();
        // dd($districts);
        return view('frontend.addProperty',compact('provinces','districts'));
    }
    public function storeProperty(StoreAddPropertyRequest $request)
    {
        // dd($request);

        $propertyPhotoPath = null;
        if ($request->hasFile('property_photo')) {
            $propertyPhotoPath = $request->file('property_photo')->store('property', 'public');
        }

        // Prepare the property data
        $propertyData = $request->validated();
        if ($propertyPhotoPath) {
            $propertyData['property_photo'] = $propertyPhotoPath;
        }

        // Create the new property record
        AddProperty::create($propertyData);

        // Optionally, show a success message
        // toast('Added Successfully!', 'success');

        return redirect()->route('home');
    }


    // public function showProfile()
    // {
    //     return view('pages.userProfile');
    // }

    public function searchPage()
    {
        $properties = AddProperty::latest()->get();
        // dd($properties->toArray());
        return view('pages.searchPage',compact('properties'));
    }

    public function propertyDetail()
    {
        return view('pages.propertyDetail');
    }


}
