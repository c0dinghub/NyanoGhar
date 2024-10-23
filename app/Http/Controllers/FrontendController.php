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

    public function propertyPage(Request $request)
    {
        $properties = AddProperty::all();
        $propertiesCount= $properties->count();

        $searchPerformed = false;  // Default to false unless a search is performed

    // If any search parameters are provided
         if ($request->has('property_type') || $request->has('location') || $request->has('status') || $request->has('budget')) {
            $searchPerformed = true;
        }

        return view('pages.propertyPage', compact('properties','propertiesCount','searchPerformed'));
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

}
