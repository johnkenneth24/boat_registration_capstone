<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $latestId = $users->max('id_number') ?? 'BRIMS-000';
        $formatted = substr($latestId, 6);
        $latestId = 'BRIMS-' . sprintf('%03d', $formatted + 1);

        // dd($latestId);

        return view('dashboard.users.create', compact('latestId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:users',
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'contact_no' => 'required|min:11|max:11',
            'password' => 'required',
        ]);

        $user = new User();
        $user->id_number = $validated['id_number'];
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->contact_no = $validated['contact_no'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'staff';

        $user->save();

        return redirect()->route('users.index')->with('success', 'Staff Account created successfully.');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:users,id_number,' . $id,
            'name' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'contact_no' => 'required|min:11|max:11',
            'password' => 'required|confirmed',
        ]); // validates the request from the input fields

        $user = User::findOrFail($id); // find the user by id

        $user->id_number = $validated['id_number'];
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->contact_no = $validated['contact_no'];
        $user->password = bcrypt($validated['password']);
        $user->role = $validated['role'];

        $user->save(); // saves the user with the above validated data

        return redirect()->route('users.index')->with('success', 'User Account updated successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.view', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User Account deleted successfully.');
    }
}
