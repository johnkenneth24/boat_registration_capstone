<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterBoatController extends Controller
{
    public function index()
    {
        return view('modules.register-boat.index');
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
