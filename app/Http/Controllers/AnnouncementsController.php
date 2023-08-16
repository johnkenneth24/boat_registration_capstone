<?php

namespace App\Http\Controllers;

use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::all();

        return view('modules.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('modules.announcement.create');
    }
}
