<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        return view('modules.announcement.index');
    }

    public function create()
    {
        return view('modules.announcement.create');
    }
}
