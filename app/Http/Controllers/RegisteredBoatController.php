<?php

namespace App\Http\Controllers;

use App\Models\RegisterBoat;

class RegisteredBoatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 'admin' || $user->role == 'staff') {
            $registeredBoats = RegisterBoat::where('status', 'registered')->paginate(10);
        } else {
            $user_id = auth()->user()->id;
            $registeredBoats = RegisterBoat::with('owner')->where('user_id', $user_id)->where('status', 'registered')->paginate(10);
        }

        // dd($registeredBoats);

        return view('modules.registered-boat.index', compact('registeredBoats'));
    }
}
