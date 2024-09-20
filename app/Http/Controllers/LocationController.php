<?php
namespace App\Http\Controllers;

use App\Models\District;
use App\Models\LocalBody;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Fetch districts based on selected province
    public function getDistricts($province_Id)
    {
        // Fetch districts that belong to the selected province
        $districts = District::where('province_id', $province_Id)->get();

        // Return the districts as a JSON response
        return response()->json($districts);
    }

    // Fetch local bodies based on selected district
    public function getLocalBodies($district_Id)
    {
        // Fetch local bodies that belong to the selected district
        $localBodies = LocalBody::where('district_id', $district_Id)->get();

        // Return the local bodies as a JSON response
        return response()->json($localBodies);
    }
}
