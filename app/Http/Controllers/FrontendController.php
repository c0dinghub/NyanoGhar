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
    $favourites = getUserFavourites(); // Ensure this returns an array of favorite property IDs

    // Get sorting option from request or default to 'latest'
    $sortBy = $request->query('sort', 'latest');
    $searchPerformed = false; // Default to false unless a search is performed

    // Create a query builder for properties
    $query = AddProperty::query();

    // Checking for search parameters
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
            $query->where(function($q) use ($locationSegments) {
                foreach ($locationSegments as $segment) {
                    $q->orWhere(function($subQuery) use ($segment) {
                        $subQuery->where('address_area', 'like', '%' . $segment . '%')
                                  ->orWhereHas('district', function($q) use ($segment) {
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
            // ... (budget filtering logic)
        }
    }

    // Apply sorting based on the selected option
    switch ($sortBy) {
        case 'latest':
            $query->orderBy('created_at', 'desc');
            break;
        case 'lowest_sale_price':
            $query->whereNotNull('sale_price')->orderBy('sale_price', 'asc');
            break;
        case 'highest_sale_price':
            $query->whereNotNull('sale_price')->orderBy('sale_price', 'desc');
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
        'favourites' => $favourites, // Ensure this is passed to the view
    ]);
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

        toast('Your Property has been submited!','success');

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $property = AddProperty::findOrFail($id);

        if (Auth::id() !== $property->user_id) {
            return redirect()->route('userProfile')->with('error', 'You do not have permission to edit this property.');
        }

        toast('Your Property has been submited!','success');

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

        toast('Your Property has been submited!','success');
        // return redirect()->route('userProfile');
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
