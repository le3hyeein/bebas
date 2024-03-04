<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index()
    {
        return view ('layouts\edit');
        $users = User::all(); // Mengambil semua data pengguna
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Return the view for editing the user
        return view('users.edit', compact('user'));
    }
}
