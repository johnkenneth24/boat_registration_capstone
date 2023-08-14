<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterBoat\Form1Request;
use App\Http\Requests\RegisterBoat\Form2Request;
use App\Models\RegisterBoat;
use Illuminate\Http\Request;

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
        $regNo = substr($reg_no->registration_no, 8);
        // using the null coalescence, check if regNo starts with 0001 and add 1 else make it 0001
        $latestregNo = date('Y-m-') . sprintf('%04d', $regNo ? $regNo + 1 : 1);
        // dd($latestregNo);

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

        // put into session the id of the created form1
        session(['form1_id' => $form1->id]);

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

    public function createForm2(Request $request)
    {
        $form1_id = $request->session()->get('form1_id');
        $source_of_income = $this->source_of_income;

        $regBoat = RegisterBoat::find($form1_id);
        // dd($regBoat);

        return view('modules.register-boat.form2Livelihood', compact('source_of_income', 'regBoat'));
    }

    public function storeForm2(Form2Request $request)
    {
        $validated = $request->validated();
        // dd($validated);

        $regBoat = RegisterBoat::findOrFail($validated['form1_id']);

        $regBoat->source_of_income = serialize($validated['income_sources']);
        // $regBoat->gear_used = $validated['gear_used'];
        // $regBoat->culture_method = $validated['culture_method'];
        // $regBoat->specify = $validated['specify'];
        $regBoat->other_source = serialize($validated['other_income_sources']);
        // $regBoat->gear_used_os = $validated['gear_used_os'];
        // $regBoat->culture_method_os = $validated['culture_method_os'];
        // $regBoat->specify_os = $validated['specify_os'];
        $regBoat->org_name = $validated['org_name'];
        $regBoat->member_since = $validated['member_since'];
        $regBoat->position = $validated['position'];
        $regBoat->save();

        session()->forget('form1_id');

        return redirect(route('reg-boat.index'))->with('success', 'Successfully registered boat!');
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
