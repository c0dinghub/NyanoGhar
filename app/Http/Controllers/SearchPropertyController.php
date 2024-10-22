<?php

namespace App\Http\Controllers;

use App\Models\AddProperty;
use Illuminate\Http\Request;

class SearchPropertyController extends Controller
{
  public function search(Request $request)
    {
        // dd($request->toArray());
        // Retrieve search criteria from the request
        $location = $request->input('location');
        $status = $request->input('status');
        $propertyType = $request->input('property_type');
        $budget = $request->input('budget');

        $searchPerformed = $location || $status || $propertyType || $budget;

        // Query the properties based on the input filters
        $query = AddProperty::query();

        // Apply filters if they are present

        if ($location) {
            // Normalize the input and split by commas
            $locationSegments = array_map('trim', explode(',', strtolower($location)));

            // Search for properties matching both district and address area
            $query->where(function($q) use ($locationSegments) {
                foreach ($locationSegments as $segment) {
                    $q->orWhere(function($subQuery) use ($segment) {
                        // Check for matches in address_area or district
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

        // Get the filtered properties
        $properties = $query->get();
        $propertiesCount = $properties->count();

        // Return the search results view
        return view('pages.propertyPage', compact('properties','searchPerformed','propertiesCount'));
    }

}
