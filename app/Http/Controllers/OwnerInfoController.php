<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerInfoController extends Controller
{
    public function index()
    {
        return view('modules.owner-info.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'salutation' => 'required',
        ]);

        return redirect()->back();
    }
}
