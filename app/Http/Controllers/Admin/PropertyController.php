<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddProperty;
use Illuminate\Http\Request;

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
}
