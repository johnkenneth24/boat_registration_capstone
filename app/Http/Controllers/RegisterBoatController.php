<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterBoat\Form1Request;
use App\Http\Requests\RegisterBoat\Form2Request;
use App\Models\Owners;
use App\Models\RegisterBoat;
use Illuminate\Http\Request;

class RegisterBoatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin' || $user->role === 'staff') {
            $registeredBoats = RegisterBoat::paginate(10);
        } else {
            $user_id = auth()->user()->id;
            $registeredBoats = RegisterBoat::where('user_id', $user_id)->paginate(10);
        }

        return view('modules.register-boat.index', compact('registeredBoats'));
    }

    public function createForm1()
    {
        $reg_nos = RegisterBoat::all();
        $reg_no = $reg_nos->max('registration_no') ?? 0;
        $latestregNo = intval(substr($reg_no, 8)) + 1;
        $addSeries = sprintf("%04d", $latestregNo);
        $latestregNo = date('Y-m-') . $addSeries;
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

        $form1->save();

        $owners = new Owners();
        $owners->register_boat_id = $form1->id;
        $owners->salutation = $validated['salutation'];
        $owners->lastname = $validated['lastname'];
        $owners->first_name = $validated['firstname'];
        $owners->middle_name = $validated['middlename'];
        $owners->suffix = $validated['suffix'];
        $owners->address = $validated['address'];
        $owners->resident_since = $validated['resident_since'];
        $owners->nationality = $validated['nationality'];
        $owners->gender = $validated['gender'];
        $owners->civil_status = $validated['civil_status'];
        $owners->contact_no = $validated['contact_no'];
        $owners->birthdate = $validated['birthdate'];
        $owners->age = $validated['age'];
        $owners->birthplace = $validated['birthplace'];
        $owners->educational_background = $validated['educational_background'];
        $owners->children_count = $validated['children_count'];
        $owners->emergency_contact_name = $validated['emergency_contact_name'];
        $owners->emergency_contact_no = $validated['emergency_contact_number'];
        $owners->emergency_contact_address = $validated['emergency_contact_address'];
        $owners->emergency_contact_relationship = $validated['emergency_contact_relationship'];

        $owners->save();

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

        $owner = Owners::where('register_boat_id', $validated['form1_id'])->first();

        // $regBoat = RegisterBoat::findOrFail($validated['form1_id']);

        $owner->source_of_income = serialize($validated['income_sources']);
        // $owner->gear_used = $validated['gear_used'];
        // $owner->culture_method = $validated['culture_method'];
        // $owner->specify = $validated['specify'];
        $owner->other_source = serialize($validated['other_income_sources']);
        // $owner->gear_used_os = $validated['gear_used_os'];
        // $owner->culture_method_os = $validated['culture_method_os'];
        // $owner->specify_os = $validated['specify_os'];
        $owner->org_name = $validated['org_name'];
        $owner->member_since = $validated['member_since'];
        $owner->position = $validated['position'];
        $owner->save();

        return redirect(route('reg-boat.index'))->with('success', 'Successfully Registered');
    }

    public function confirmForm(Request $request)
    {
        $form1_id = $request->session()->get('form1_id');
        $regBoat = RegisterBoat::with('owner')->find($form1_id);

        return view('modules.register-boat.confirmForm', compact('regBoat'));
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
