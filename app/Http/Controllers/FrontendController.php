<?php
namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\District;
use App\Models\LocalBody;
use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Http\Requests\AddProperty\UpdateAddPropertyRequest;
use App\Models\AddProperty;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function addProperty()
    {
        $provinces = Province::all();
        return view('frontend.addProperty', compact('provinces'));
    }

    public function searchPage()
    {
        $properties = AddProperty::all();

        return view('pages.searchPage', compact('properties'));
    }

    public function propertyDetail($id)
    {
        $property = AddProperty::findOrFail($id);

        return view('pages.propertyDetail', compact('property'));
    }


    public function getDistricts($province_Id)
    {
        $districts = District::where('province_id', $province_Id)->pluck('name', 'id');
        return response()->json($districts);
    }

    public function getLocalBodies($district_Id)
    {
        $localBodies = LocalBody::where('district_id', $district_Id)->pluck('name', 'id');
        return response()->json($localBodies);
    }

    public function storeProperty(StoreAddPropertyRequest $request)
    {
        $propertyData = $request->validated();
        $propertyData['user_id'] = Auth::user()->id;

        // dd($propertyData);
        $newProperty = AddProperty::create($propertyData);

        return redirect()->route('home')
            ->with('success', 'Property added successfully!');
    }

    public function edit($id)
    {
        $property = AddProperty::findOrFail($id);

        if (Auth::id() !== $property->user_id) {
            return redirect()->route('userProfile')->with('error', 'You do not have permission to edit this property.');
        }

        return view('frontend.editUserProperty', compact('property'));
    }

    public function update(UpdateAddPropertyRequest $request, $id)
    {
        $property = AddProperty::findOrFail($id);

        if (Auth::id() !== $property->user_id) {
            return redirect()->route('userProfile')->with('error', 'You do not have permission to update this property.');
        }

        // dd($request);
        $property->update($request->validated());

        return redirect()->route('userProfile')->with('success', 'Property updated successfully!');
    }


}
