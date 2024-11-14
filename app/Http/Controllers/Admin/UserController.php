<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $allUsers = User::paginate(10);
        $userCount = User::count();

        return view('admin.users.allUsers.index', compact('allUsers', 'userCount'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.userProfile', compact('user'));
    }

    public function destroy($id)
    {
        $property = User::find($id);

        if ($property) {
            $property->delete();
            return redirect()->route('admin.allUsers.index')->with('success', 'Property deleted successfully.');
        }

        return redirect()->route('admin.allUsers.index')->with('error', 'Property not found.');
    }
}
