<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('admin.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agent.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents',
            'phone' => 'nullable',
        ]);

        Agent::create($request->all());
        return redirect()->route('admin.agent.index')->with('success', 'Agent added successfully.');
    }

    public function edit(Agent $agent)
    {
        return view('admin.agent.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents,email,' . $agent->id,
            'phone' => 'nullable',
        ]);

        $agent->update($request->all());
        return redirect()->route('admin.agent.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('admin.agent.index')->with('success', 'Agent deleted successfully.');
    }
}

