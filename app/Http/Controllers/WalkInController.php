<?php

namespace App\Http\Controllers;

use App\Models\OwnerInfo;

class WalkInController extends Controller
{

    public $salutations = ['Mr.', 'Mrs.', 'Ms.'];
    public $suffixes = ['Jr.', 'Sr.', 'III', 'IV'];
    public $genders = ['Male', 'Female'];
    public $civil_status = ['Single', 'Married', 'Widowed', 'Legally Separated'];
    public $educ_bcc = ['Elementary', 'High School', 'College', 'Vocational', 'Post Graduate'];

    public function create($id = null)
    {

        $salutations = $this->salutations;
        $suffixes = $this->suffixes;
        $genders = $this->genders;
        $civil_status = $this->civil_status;
        $educ_bcc = $this->educ_bcc;

        if ($id) {
            $ownerInfo = OwnerInfo::find($id);
        } else {
            $ownerInfo = OwnerInfo::find(auth()->user()->id);
        }

        return view('modules.register-boat.walk-in.create', compact('salutations', 'suffixes', 'genders', 'civil_status', 'educ_bcc', 'ownerInfo'));
    }
}
