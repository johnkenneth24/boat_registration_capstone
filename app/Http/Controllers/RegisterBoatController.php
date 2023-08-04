<?php

namespace App\Http\Controllers;

use App\Models\RegisterBoat;

class RegisterBoatController extends Controller
{
    public function index()
    {
        $registeredBoats = RegisterBoat::paginate(10);

        return view('modules.register-boat.index', compact('registeredBoats'));
    }

    public function create()
    {
        return view('modules.register-boat.create');
    }

    public function process_registration()
    {
        return view('modules.register-boat.process.index');
    }

    public function mfr_form()
    {
        return view('modules.register-boat.mfr-form.create');
    }

    public function adss_form()
    {
        return view('modules.register-boat.ads-form.create');
    }
}
