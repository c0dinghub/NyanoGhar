<?php
namespace App\Http\Controllers;


use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Http\Requests\AddProperty\UpdateAddPropertyRequest;
use App\Models\AddProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function addProperty()
    {
        return view('frontend.addProperty');
    }

    public function searchPage()
    {
        $properties = AddProperty::all();

        return view('pages.searchPage', compact('properties'));
    }

    public function propertyDetail($id)
    {
        $property = AddProperty::with('district')->findOrFail($id);

        return view('pages.propertyDetail', compact('property'));
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


    public function search(Request $request)
    {
        $location = $request->input('location');
        $purpose = $request->input('purpose');
        $propertyType = $request->input('property_type');
        $budget = $request->input('budget');

        $properties = AddProperty::query();

        if ($location) {
            $properties->where('address_area', 'LIKE', "%{$location}%"); // Adjusted to use address_area
        }

        if ($purpose) {
            $properties->where('purpose', $purpose);
        }

        if ($propertyType) {
            $properties->where('property_type', $propertyType);
        }

        // Adjust budget filtering based on the selected budget option
        if ($budget) {
            switch ($budget) {
                case 'under50k':
                    $properties->where('price', '<', 50000);
                    break;
                case '50k-100k':
                    $properties->whereBetween('price', [50000, 100000]);
                    break;
                case '100k-200k':
                    $properties->whereBetween('price', [100000, 200000]);
                    break;
                case '200k-500k':
                    $properties->whereBetween('price', [200000, 500000]);
                    break;
                case '500k-1cr':
                    $properties->whereBetween('price', [500000, 10000000]);
                    break;
                case '1cr-2cr':
                    $properties->whereBetween('price', [10000000, 20000000]);
                    break;
                case 'above2cr':
                    $properties->where('price', '>', 20000000);
                    break;
            }

        }

        $properties = $properties->get();


        // dd($properties);
        return view('pages.searchResult', compact('properties'));
    }


}
