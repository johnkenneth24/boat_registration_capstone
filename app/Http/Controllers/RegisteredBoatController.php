<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredBoatController extends Controller
{
    public function index()
    {
        return view('modules.registered-boat.index');
    }
}
