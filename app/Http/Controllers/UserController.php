<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('layouts/datagaleri', compact('users'));
    }

    public function edit($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Return the view for editing the user
        return view('layouts/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Update user details based on the form data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->level = $request->input('level');

        // Save the updated user
        $user->save();

        // Redirect back to the user list or any other appropriate page
        return redirect()->route('datagaleri.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        // Find the user by ID and delete it
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect the user to a specific page after deletion
        return redirect()->route('datagaleri.index')->with('success', 'User deleted successfully.');
    }
}
