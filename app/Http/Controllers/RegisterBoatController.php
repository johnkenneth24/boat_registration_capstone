<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterBoat\Form1Request;
use App\Models\RegisterBoat;

class RegisterBoatController extends Controller
{
    public function index()
    {
        $registeredBoats = RegisterBoat::paginate(10);

        return view('modules.register-boat.index', compact('registeredBoats'));
    }

    public function createForm1()
    {
        $reg_no = RegisterBoat::latest()->first('registration_no');
        // get the numbers after the year and month
        $regNo = substr($reg_no->registration_no, 8);
        $regNo = $reg_no ? $reg_no->registration_no + 1 : 1;
        $latestregNo = date('Y-m-') . str_pad($regNo, 4, '0', STR_PAD_LEFT);

        return view('modules.register-boat.form1PerInfo', compact('latestregNo'));
    }

    public function storeForm1(Form1Request $request)
    {
        $validated = $request->validated();
        // dd($validated);

        $form1 = new RegisterBoat();
        $form1->user_id = auth()->user()->id;
        $form1->registration_no = $validated['registration_no'];
        $form1->registration_date = $validated['registration_date'];
        $form1->registration_type = $validated['registration_type'];

        $form1->salutation = $validated['salutation'];
        $form1->lastname = $validated['lastname'];
        $form1->first_name = $validated['firstname'];
        $form1->middle_name = $validated['middlename'];
        $form1->suffix = $validated['suffix'];
        $form1->address = $validated['address'];
        $form1->resident_since = $validated['resident_since'];
        $form1->nationality = $validated['nationality'];
        $form1->gender = $validated['gender'];
        $form1->civil_status = $validated['civil_status'];
        $form1->contact_no = $validated['contact_no'];
        $form1->birthdate = $validated['birthdate'];
        $form1->age = $validated['age'];
        $form1->birthplace = $validated['birthplace'];
        $form1->educational_background = $validated['educational_background'];
        $form1->children_count = $validated['children_count'];
        $form1->emergency_contact_name = $validated['emergency_contact_name'];
        $form1->emergency_contact_no = $validated['emergency_contact_number'];
        $form1->emergency_contact_address = $validated['emergency_contact_address'];
        $form1->emergency_contact_relationship = $validated['emergency_contact_relationship'];

        $form1->save();

        return redirect(route('form2.create'));
    }

    public $source_of_income = [
        'Capture Fishing',
        'Aquaculture',
        'Fish Vending',
        'Gleaning',
        'Fish Processing',
        'Other',
    ];

    public function createForm2()
    {
        $source_of_income = $this->source_of_income;

        return view('modules.register-boat.form2Livelihood', compact('source_of_income'));
    }

    public function storeForm2()
    {
        return redirect(route('reg-boat3.create'));
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
