<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Models\AddProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function allProperty()
    {
        $allProperties = AddProperty::all();
        $totalProperties= $allProperties->count();

        return view('admin.properties.allProperties.index',compact('allProperties','totalProperties'));

    }

    public function propertyDetail($id)
    {
        $property = AddProperty::with('district')->findOrFail($id);

        return view('admin.pages.propertyDetail', compact('property'));
    }

    public function destroy($id)
    {
        $property = AddProperty::find($id);

        if ($property) {
            $property->delete();
            return redirect()->route('admin.allProperties.index')->with('success', 'Property deleted successfully.');
        }

        return redirect()->route('admin.allProperties.index')->with('error', 'Property not found.');
    }

    public  function addProperty()
    {
        return view('admin.pages.addProperty');
    }

    public function storeProperty(StoreAddPropertyRequest $request)
    {
        $propertyData = $request->validated();
        $propertyData['user_id'] = Auth::user()->id;

        // dd($propertyData);
        $newProperty = AddProperty::create($propertyData);

        toast('Your Property has been submited!','success');

        return redirect()->route('admin.allProperties.index');
    }

}
