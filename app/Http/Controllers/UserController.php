<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
