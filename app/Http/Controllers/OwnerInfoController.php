<?php

namespace App\Http\Controllers;

use App\Models\OwnerInfo;
use Illuminate\Http\Request;

class OwnerInfoController extends Controller
{

    public $salutations = ['Mr.', 'Mrs.', 'Ms.'];
    public $suffixes = ['Jr.', 'Sr.', 'III', 'IV'];
    public $genders = ['Male', 'Female'];
    public $civil_status = ['Single', 'Married', 'Widowed', 'Legally Separated'];
    public $educ_bcc = ['Elementary', 'High School', 'College', 'Vocational', 'Post Graduate'];
    public function index()
    {
        $salutations = $this->salutations;
        $suffixes = $this->suffixes;
        $genders = $this->genders;
        $civil_status = $this->civil_status;
        $educ_bcc = $this->educ_bcc;

        return view('modules.owner-info.index', compact('salutations', 'suffixes', 'genders', 'civil_status', 'educ_bcc'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'suffix' => 'nullable',
            'address' => 'required',
            'resident_since' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'contact_no' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'birthplace' => 'required',
            'educ_background' => 'required',
            'children_count' => 'nullable',
            'emContact_person' => 'nullable',
            'emRelationship' => 'nullable',
            'emContact_no' => 'nullable',
            'emAddress' => 'nullable',
        ]);

        $form1 = new OwnerInfo();
        $form1->user_id = auth()->user()->id;

        return redirect()->back();
    }
}
