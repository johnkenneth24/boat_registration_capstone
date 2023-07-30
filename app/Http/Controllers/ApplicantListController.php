<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantListController extends Controller
{
    public function index()
    {
        return view('modules.applicant-list.index');
    }

    public function process_registration()
    {
        return view('modules.applicant-list.process.index');
    }

    public function mfr_form()
    {
        return view('modules.applicant-list.mfr-form.create');
    }

    public function adss_form()
    {
        return view('modules.applicant-list.ads-form.create');
    }
}
