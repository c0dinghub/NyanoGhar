<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Http\Requests\AddProperty\UpdateAddPropertyRequest;
use App\Models\AddProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function addProperty()
    {
        $agents = User::where('role', 'agent')->get(); // Assuming agents are users with the 'agent' role
        return view('frontend.addProperty', compact('agents'));
    }

    public function services()
    {

        return view('pages.services');
    }

    public function propertyPage(Request $request)
    {
        $favourites = getUserFavourites();
        // Get sorting option from request or default to 'latest'
        $sortBy = $request->query('sort', 'latest');
        $searchPerformed = false; // Default to false unless a search is performed

        // Create a query builder for properties
        $query = AddProperty::query();

        // Check for search parameters
        if ($request->has('property_type') || $request->has('location') || $request->has('status') || $request->has('budget')) {
            $searchPerformed = true;

            // Retrieve search criteria from the request
            $location = $request->input('location');
            $status = $request->input('status');
            $propertyType = $request->input('property_type');
            $budget = $request->input('budget');

            // Apply filters based on search criteria
            if ($location) {
                $locationSegments = array_map('trim', explode(',', strtolower($location)));
                $query->where(function ($q) use ($locationSegments) {
                    foreach ($locationSegments as $segment) {
                        $q->orWhere(function ($subQuery) use ($segment) {
                            $subQuery->where('address_area', 'like', '%' . $segment . '%')
                                ->orWhereHas('district', function ($q) use ($segment) {
                                    $q->where('district_en', 'like', '%' . $segment . '%');
                                });
                        });
                    }
                });
            }

            if ($status) {
                $query->where('status', $status); // for_rent or for_sale
            }

            if ($propertyType) {
                $query->where('property_type', $propertyType); // apartment or house
            }

            // Handle budget filtering based on the purpose (status)
            if ($budget) {
                if ($status === 'for_sale') {
                    switch ($budget) {
                        case 'under50k':
                            $query->where('sale_price', '<', 50000);
                            break;
                        case '50k-100k':
                            $query->whereBetween('sale_price', [50000, 100000]);
                            break;
                        case '100k-500k':
                            $query->whereBetween('sale_price', [100000, 500000]);
                            break;
                        case '500k-20lkh':
                            $query->whereBetween('sale_price', [500000, 2000000]);
                            break;
                        case '20lkh-50lkh':
                            $query->whereBetween('sale_price', [2000000, 5000000]);
                            break;
                        case '50lkh-1cr':
                            $query->whereBetween('sale_price', [5000000, 10000000]);
                            break;
                        case '1cr-5cr':
                            $query->whereBetween('sale_price', [10000000, 50000000]);
                            break;
                        case 'above5cr':
                            $query->where('sale_price', '>', 50000001);
                            break;
                    }
                } elseif ($status === 'for_rent') {
                    switch ($budget) {
                        case 'under10k':
                            $query->where('rent_price', '<', 10000);
                            break;
                        case '10k-50k':
                            $query->whereBetween('rent_price', [10000, 50000]);
                            break;
                        case '50k-100k':
                            $query->whereBetween('rent_price', [50000, 100000]);
                            break;
                        case '100k-200k':
                            $query->whereBetween('rent_price', [100000, 200000]);
                            break;
                        case '200k-500k':
                            $query->whereBetween('rent_price', [200000, 500000]);
                            break;
                        case 'above500k':
                            $query->where('rent_price', '>', 500001);
                            break;
                    }
                }
            }
        }

        // Apply sorting based on the selected option
        switch ($sortBy) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'lowest_sale_price':
                $query->whereNotNull('sale_price')->orderBy('sale_price', 'desc');
                break;
            case 'highest_sale_price':
                $query->whereNotNull('sale_price')->orderBy('sale_price', 'asc');
                break;
            case 'lowest_rent_price':
                $query->whereNotNull('rent_price')->orderBy('rent_price', 'asc');
                break;
            case 'highest_rent_price':
                $query->whereNotNull('rent_price')->orderBy('rent_price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $filteredPropertiesCount = $query->count();

        // Get the filtered and sorted properties
        $properties = $query->paginate(5);
        $allProperties = AddProperty::all();
        $propertiesCount = $allProperties->count();

        return view('pages.propertyPage', [
            'properties' => $properties,
            'propertiesCount' => $propertiesCount,
            'sortBy' => $sortBy,
            'filteredPropertiesCount' => $filteredPropertiesCount,
            'searchPerformed' => $searchPerformed,
            'favourites' => $favourites,
        ]);
    }


    public function propertyDetail($id)
    {
        $property = AddProperty::with('district', 'agent')->findOrFail($id);

        return view('pages.propertyDetail', compact('property'));
    }

    public function storeProperty(StoreAddPropertyRequest $request)
    {
        $propertyData = $request->validated();
        $propertyData['user_id'] = Auth::user()->id;
        $propertyData['agent_id'] = $request->agent_id;

        // Handle single image upload
        if ($request->hasFile('property_photo')) {
            $propertyData['property_photo'] = $request->file('property_photo')->store('property', 'public');
        }

        // Create the new property record
        AddProperty::create($propertyData);

        toast('Your Property has been submitted!', 'success');
        return redirect()->route('propertyPage');
    }


    public function edit($id)
    {
        $property = AddProperty::findOrFail($id);

        // Check if the logged-in user is the owner of the property
        if (Auth::id() !== $property->user_id) {
            return redirect()->route('userProfile')->with('error', 'You do not have permission to edit this property.');
        }

        // Fetch the list of agents (assuming you have a 'role' column or similar in the User model)
        $agents = User::where('role', 'agent')->get();

        toast('Your Property has been submited!', 'success');

        // Pass the property and agents to the view
        return view('frontend.editUserProperty', compact('property', 'agents'));
    }


    public function update(UpdateAddPropertyRequest $request, $id)
    {
        $property = AddProperty::findOrFail($id);

        if (Auth::id() !== $property->user_id) {
            return redirect()->route('userProfile')->with('error', 'You do not have permission to update this property.');
        }

        // Add agent_id from the request (admin will assign this)
        $propertyData = $request->validated();
        $propertyData['agent_id'] = $request->agent_id;

        // Update the property
        $property->update($propertyData);

        toast('Your Property has been updated!', 'success');
        return redirect(route('userProfile'));
    }

    public function destroy($id)
    {
        // Find the property by ID
        $property = AddProperty::findOrFail($id);

        // Check if the authenticated user is the owner of the property
        if (Auth::id() === $property->user_id) {
            // Delete the property
            $property->delete();

            // Redirect back with a success message
            return redirect()->route('userProfile')->with('success', 'Property deleted successfully.');
        }

        return redirect()->route('userProfile')->with('error', 'You do not have permission to delete this property.');
    }
}
