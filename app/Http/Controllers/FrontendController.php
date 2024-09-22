<?php
namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\District;
use App\Models\LocalBody;
use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Models\AddProperty;

class FrontendController extends Controller
{
    // Display the Add Property form
    public function addProperty()
    {
        $provinces = Province::all();  // Fetch all provinces to populate the dropdown
        return view('frontend.addProperty', compact('provinces'));  // Pass provinces to view
    }

    // Fetch districts based on the selected province
    public function getDistricts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->pluck('name', 'id');
        return response()->json($districts);  // Return districts as JSON response
    }

    // Fetch local bodies based on the selected district
    public function getLocalBodies($districtId)
    {
        $localBodies = LocalBody::where('district_id', $districtId)->pluck('name', 'id');
        return response()->json($localBodies);  // Return local bodies as JSON response
    }

    // Handle property creation logic
    public function storeProperty(StoreAddPropertyRequest $request)
    {
        $propertyData = $request->validated();  // Validate form data
        AddProperty::create($propertyData);  // Store the property data
        return redirect()->route('home');  // Redirect to the homepage after storing
    }
}
