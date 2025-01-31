<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddProperty;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.page');
    }

    public function dashboard()
{
    $propertyCount = AddProperty::count();
    $userCount = User::count(); // Count all user accounts
    $agentCount = Agent::count(); // Count all agents

    return view('admin.dashboard', compact('propertyCount', 'userCount', 'agentCount'));
}



}
