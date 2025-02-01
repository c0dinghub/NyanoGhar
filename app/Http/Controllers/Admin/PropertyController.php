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
        $propertyData = $request->validated();
        $propertyData['user_id'] = Auth::user()->id;

        // Add agent_id from the request (admin will assign this)
        $propertyData['agent_id'] = $this->getNextAgentId();

        // Create the new property
        $newProperty = AddProperty::create($propertyData);

        toast('Your Property has been submitted!', 'success');

        return redirect()->route('propertyPage');
    }

    private function getNextAgentId()
    {
        // Get all agents
        $agents = Agent::all();

        // If no agents exist, show error and return
        if ($agents->isEmpty()) {
            toast('No agents available to assign!', 'error');
            return redirect()->back();
        }

        // Get the last assigned agent
        $lastAssignedAgent = AddProperty::latest()->first();

        // Calculate the index for the next agent to be assigned
        if ($lastAssignedAgent) {
            $lastAssignedAgentId = $lastAssignedAgent->agent_id;
            // Find the index of the last assigned agent
            $nextAgentIndex = ($agents->search(fn($agent) => $agent->id === $lastAssignedAgentId) + 1) % $agents->count();
        } else {
            $nextAgentIndex = 0; // Start from the first agent if no agent was assigned previously
        }

        // Return the ID of the next agent in the round-robin sequence
        return $agents[$nextAgentIndex]->id;
    }



    public function edit($id)
    {
        $property = AddProperty::findOrFail($id);
        $agents = Agent::all(); // Retrieve all agents
        $propertyStatus = ['pending','rejected','approved'];

        return view('admin.pages.editProperty', compact('property', 'agents','propertyStatus'));
    }


    public function update(UpdateAddPropertyRequest $request, $id)
    {
        $property = AddProperty::findOrFail($id);

        // dd($property->toArray());
        // dd($request->toArray());
        $property->update($request->validated());

        toast('Property status updated to Approved!', 'success');
        return redirect()->route('admin.allProperties.index');
    }

}
