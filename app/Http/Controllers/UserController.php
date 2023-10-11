<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = User::where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('id_number', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->orWhere('contact_no', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->orderBy('id_number', 'asc');

        $users = $query->paginate(10);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $latestId = $users->max('id_number') ?? 'BRIMS-000';
        $formatted = substr($latestId, 6);
        $latestId = 'BRIMS-' . sprintf('%03d', $formatted + 1);

        return view('dashboard.users.create', compact('latestId'));
    }

    protected function messages()
    {
        return [
            'id_number.required' => 'The ID number field is required.',
            'id_number.unique' => 'The ID number has already been taken.',
            'name.required' => 'The name field is required.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'contact_no.required' => 'The contact number field is required.',
            'contact_no.min' => 'The contact number must be 11 digits.',
            'contact_no.max' => 'The contact number must be 11 digits.',
            'contact_no.regex' => 'The contact number must be a valid mobile number.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:users',
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'contact_no' => ['required', 'decimal', 'regex:/^(09\d{9})|(0\d{10})$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ], $this->messages());

        $user = User::create([
            'id_number' => $validated['id_number'],
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'contact_no' => $validated['contact_no'],
            'password' => Hash::make($validated['password']),
        ])->assignRole('staff');

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
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'contact_no' => [
                'required',
                'string',
                'regex:/^(09\d{9})|(0\d{10})$/',
            ],
            'password' => 'required|min:8|confirmed',
        ], $this->messages()); // validates the request from the input fields

        $user = User::findOrFail($id); // find the user by id
        // get role of user
        // $role = $user->getRoleNames();

        $user->id_number = $validated['id_number'];
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->contact_no = $validated['contact_no'];
        $user->password = bcrypt($validated['password']);
        // $user->role = $validated['role'];

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

        if ($user->hasRole('admin')) {
            return back()->with('error', 'You cannot delete an admin account.');
        }

        if (!$user) {
            return back()->with('error', 'User Account not found.');
        } else {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User Account deleted successfully.');
        }
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function profileupdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'contact_no' => ['required', 'min:11', 'regex:/^09\d{9}$/'],
            'username' => 'required|unique:users,username,' . auth()->user()->id,
        ], $this->messages());

        $user = User::findOrFail($id); // find the user by id

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact_no' => $validated['contact_no'],
            'username' => $validated['username'],
        ]);

        return redirect()->back()->with('success', 'Profile successfully updated!');
    }

    public function passwordUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ], $this->messages());

        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Password successfully updated!');
    }
}
