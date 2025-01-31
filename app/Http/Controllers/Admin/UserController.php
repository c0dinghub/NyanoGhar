<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users with pagination and total count
    public function index()
    {
        $allUsers = User::paginate(10); // Paginate users
        $userCount = User::count(); // Get total number of users

        return view('admin.users.allUsers.index', compact('allUsers', 'userCount'));
    }

    // Show a specific user's profile details
    public function show($id)
    {
        $user = User::findOrFail($id); // Find user by ID or show 404 error if not found
        return view('admin.pages.userProfile', compact('user'));
    }

    // Delete a user
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Delete the user if found
            $user->delete();
            return redirect()->route('admin.allUsers.index')->with('success', 'User deleted successfully.');
        }

        // If user not found, return with an error message
        return redirect()->route('admin.allUsers.index')->with('error', 'User not found.');
    }

    // Update user role (Assign agent, admin, or user role)
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        return view('admin.users.edit', compact('user')); // Pass the user to the edit view
    }

    // Update user role in the database
    public function update(Request $request, $id)
    {

        // Validate the role input
        $request->validate([
            'role' => 'required|in:admin,agent,user', // Role must be one of these
        ]);
        $user = User::findOrFail($id); // Find user by ID

        // Update the role of the user
        $user->role = $request->role;
        $user->save(); // Save the updated user

        // Redirect back with success message
        return redirect()->route('admin.allUsers.index')->with('success', 'User role updated successfully.');
    }
}
