<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProperty\StoreAddPropertyRequest;
use App\Http\Requests\AddProperty\UpdateAddPropertyRequest;
use App\Models\AddProperty;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PropertyController extends Controller
{
    public function allProperty()
    {
        $allProperties = AddProperty::all();
        $totalProperties = $allProperties->count();
        $agents = Agent::all(); // Retrieve all agents


        return view('admin.properties.allProperties.index', compact('allProperties', 'totalProperties', 'agents'));
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
        // Step 1: Validate the incoming data
        $propertyData = $request->validated();

        // Step 2: Fetch the last assigned agent ID from cache
        $lastAssignedAgentId = Cache::get('last_assigned_agent_id', 0);

        // Step 3: Find the next agent in round-robin order
        $nextAgent = User::whereHas('roles', function ($query) {
            $query->where('name', 'agent');
        })->where('id', '>', $lastAssignedAgentId)
          ->orderBy('id')
          ->first();



        // Step 4: If no agent is found, loop back to the first agent
        if (!$nextAgent) {
            $nextAgent = User::whereHas('roles', function ($query) {
                $query->where('name', 'agent');
            })->orderBy('id')->first();
        }

        // Step 5: Assign the agent if available
        if ($nextAgent) {
            Cache::put('last_assigned_agent_id', $nextAgent->id);
            $propertyData['agent_id'] = $nextAgent->id; // Assign the agent to the property
        } else {
            return redirect()->route('admin.allProperties.index')->with('error', 'No agents available to assign.');
        }

        // Step 6: Create the property
        AddProperty::create($propertyData);

        toast('Your Property has been submitted!', 'success');
        return redirect()->route('admin.allProperties.index');
    }


    public function edit($id)
    {
        $property = AddProperty::findOrFail($id);
        $agents = Agent::all(); // Retrieve all agents

        return view('admin.pages.editProperty', compact('property', 'agents'));
    }


    public function update(UpdateAddPropertyRequest $request, $id)
{
    $property = AddProperty::findOrFail($id);

    // dd($request->all()); // Debug request data

    $property->update($request->validated());

    // dd($property->toArray()); // Debug property data after update

    toast('Property updated successfully!', 'success');
    return redirect()->route('admin.allProperties.index');
}

}
