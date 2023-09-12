<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use App\Models\OwnerInfo;
use App\Models\RegisterBoat;
use Illuminate\Http\Request;

class RegisterBoatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $roleName = $user->getRoleNames()->first();

        if ($roleName === 'admin' || $roleName === 'staff') {
            $registeredBoats = RegisterBoat::with('ownerInfo')->where('status', 'registered')->paginate(10);

            return view('modules.register-boat.index', compact('registeredBoats'));
        } else {
            $user_id = $user->id;
            $ownerInfo = OwnerInfo::where('user_id', $user_id)->first();
            $registeredBoats = RegisterBoat::where('user_id', $user_id)->paginate(10);

            return view('modules.register-boat.index', compact('registeredBoats', 'ownerInfo'));
        }
    }

    public function pendingRegBoats()
    {
        $pendingBoats = RegisterBoat::with('ownerInfo')->where('status', 'pending')->paginate(10);

        return view('modules.register-boat.pending', compact('pendingBoats'));

    }

    public function create()
    {
        $reg_nos = RegisterBoat::all();
        $reg_no = $reg_nos->max('registration_no') ?? 0;
        $latestregNo = intval(substr($reg_no, 8)) + 1;
        $addSeries = sprintf("%04d", $latestregNo);
        $latestregNo = date('Y-m-') . $addSeries;
        // dd($latestregNo);
        $ownerInfo = OwnerInfo::where('user_id', auth()->user()->id)->first();

        return view('modules.register-boat.boat-reg', compact('latestregNo', 'ownerInfo'));
    }

    public function regBoat(Request $request)
    {
        $validated = $request->validate([
            'owner_id' => 'nullable',
            'registration_no' => 'required',
            'registration_date' => 'required',
            'vessel_name' => 'required',
            'vessel_type' => 'required',
            'horsepower' => 'required',
            'color' => 'required',
            'length' => 'required',
            'breadth' => 'required',
            'depth' => 'required',
            'body_number' => 'required',
            'materials_used' => 'required',
            'year_built' => 'required',
            'gross_tonnage' => 'required',
        ]);

        // dd($validated);

        $form1 = new RegisterBoat();
        $form1->user_id = auth()->user()->id;
        $form1->registration_no = $validated['registration_no'];
        $form1->registration_date = $validated['registration_date'];
        $form1->owner_info_id = $validated['owner_id'];
        $form1->registration_type = 'new';

        $form1->save();

        $owners = Boat::create([
            'user_id' => auth()->user()->id,
            'owner_id' => $validated['owner_id'],
            'boat_type' => $validated['vessel_type'],
            'vessel_name' => $validated['vessel_name'],
            'horsepower' => $validated['horsepower'],
            'color' => $validated['color'],
            'length' => $validated['length'],
            'breadth' => $validated['breadth'],
            'depth' => $validated['depth'],
            'body_number' => $validated['body_number'],
            'materials' => $validated['materials_used'],
            'year_built' => $validated['year_built'],
            'gross_tonnage' => $validated['gross_tonnage'],
        ]);

        return redirect()->route('reg-boat.index')->with('success', 'Boat record added. Please wait for confirmation regarding your registration!');
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

    // public function storeForm2(Form2Request $request)
    // {
    //     $validated = $request->validated();
    //     // dd($validated);

    //     $owner = Owners::where('register_boat_id', $validated['form1_id'])->first();

    //     // $regBoat = RegisterBoat::findOrFail($validated['form1_id']);

    //     $owner->source_of_income = serialize($validated['income_sources']);
    //     // $owner->gear_used = $validated['gear_used'];
    //     // $owner->culture_method = $validated['culture_method'];
    //     // $owner->specify = $validated['specify'];
    //     $owner->other_source = serialize($validated['other_income_sources']);
    //     // $owner->gear_used_os = $validated['gear_used_os'];
    //     // $owner->culture_method_os = $validated['culture_method_os'];
    //     // $owner->specify_os = $validated['specify_os'];
    //     $owner->org_name = $validated['org_name'];
    //     $owner->member_since = $validated['member_since'];
    //     $owner->position = $validated['position'];
    //     $owner->save();

    //     return redirect(route('reg-boat.index'))->with('success', 'Successfully Registered');
    // }

    // public function confirmForm(Request $request)
    // {
    //     $form1_id = $request->session()->get('form1_id');
    //     $regBoat = RegisterBoat::with('owner')->find($form1_id);

    //     return view('modules.register-boat.confirmForm', compact('regBoat'));
    // }

    public function sample()
    {
        return view('modules.register-boat.samplewithaddItem');
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
