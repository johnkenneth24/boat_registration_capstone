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
        $reg_no = RegisterBoat::latest()->first('registration_no');
        $regNo = $reg_no ? $reg_no->registration_no + 1 : 1;
        $latestregNo = str_pad($regNo, 4, '0', STR_PAD_LEFT);

        return view('modules.register-boat.form1PerInfo', compact('latestregNo'));
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
