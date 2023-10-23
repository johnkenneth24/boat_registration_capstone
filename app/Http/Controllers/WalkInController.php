<?php

namespace App\Http\Controllers;

use App\Models\Adss;
use App\Models\OwnerInfo;
use App\Models\Livelihood;
use App\Models\WalkInAdss;
use Illuminate\Support\Arr;
use App\Models\RegisterBoat;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\WalkInBoatOwner;
use App\Models\WalkInLivelihood;
use App\Models\WalkInBoatRegistration;

class WalkInController extends Controller
{

    public $salutations = ['Mr.', 'Mrs.', 'Ms.'];
    public $suffixes = ['Jr.', 'Sr.', 'III', 'IV'];
    public $genders = ['Male', 'Female'];
    public $civil_status = ['Single', 'Married', 'Widowed', 'Legally Separated'];
    public $educ_bcc = ['Elementary', 'High School', 'College', 'Vocational', 'Post Graduate'];
    public $source_of_income = [
        'Capture Fishing',
        'Aquaculture',
        'Fish Vending',
        'Gleaning',
        'Fish Processing',
        'Other',
    ];

    public function index()
    {
        $walk_in = WalkInBoatOwner::paginate('10');

        return view('modules.walk-in.index', compact('walk_in'));
    }
    public function create($id = null)
    {

        $salutations = $this->salutations;
        $suffixes = $this->suffixes;
        $genders = $this->genders;
        $civil_status = $this->civil_status;
        $educ_bcc = $this->educ_bcc;

        $route = \Illuminate\Support\Facades\Route::currentRouteName();

        $ownerInfo = $id;

        if ($id) {
            $ownerInfo = OwnerInfo::find($id);
        }

        return view('modules.walk-in.create', compact('route', 'salutations', 'suffixes', 'genders', 'civil_status', 'educ_bcc', 'ownerInfo'));
    }

    protected function messages()
    {
        return [
            'salutation.required' => 'Salutation  os required',
            'first_name.required' => 'First Name is required',
            'first_name.regex' => 'Must be a valid firstname and must not contain special characters',
            'last_name.required' => 'Last Name is required',
            'last_name.regex' => 'Must be a valid lastname and must not contain special characters',
            'middle_name.regex' => 'Must be a valid middlename and must not contain special characters',
            'address.required' => 'Address is required',
            'address.max' => 'Must not exceed more than 255 characters',
            'resident_since.required' => 'Required',
            'nationality.required' => 'Required',
            'nationality.regex' => 'Must not contain special characters or numbers',
            'gender.required' => 'Required',
            'contact_no.regex' => 'Must not contain letters or special characters',
            'birthplace.required' => 'Required',
            'other_educational_background.string' => 'Must be a string',
            'emContact_person.regex' => 'Must not contain special characters or numbers',
            'emRelationship.regex' => 'Must not contain special characters or numbers',
            'emContact_no.regex' => 'Must not contain letters or special characters',
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'salutation' => ['required'],
            'first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'middle_name' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'suffix' => 'nullable',
            'address' => ['required', 'max:255'],
            'resident_since' => ['required', 'date:Y-m'],
            'nationality' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'gender' => 'required',
            'civil_status' => 'required',
            'contact_no' => ['required', 'regex:/^09\d{9}$/'],
            'birthdate' => 'required',
            'age' => 'required',
            'birthplace' => ['required', 'string'],
            'educ_background' => 'required',
            'other_educational_background' => ['nullable', 'string'],
            'children_count' => ['nullable', 'min:0'],
            'emContact_person' => ['nullable', 'string'],
            'emRelationship' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'emContact_no' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'emAddress' => ['nullable'],
        ], $this->messages());

        // dd($validated);

        $ownerInfo = $request->input('ownerInfo');

        $walkInOwner = OwnerInfo::where('id', $ownerInfo)->first();

        if (!$walkInOwner) {
            $walkInOwner = OwnerInfo::create([
                'salutation' => $validated['salutation'],
                'last_name' => $validated['last_name'],
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'suffix' => $validated['suffix'],
                'address' => $validated['address'],
                'resident_since' => $validated['resident_since'] . '-01',
                'nationality' => $validated['nationality'],
                'gender' => $validated['gender'],
                'civil_status' => $validated['civil_status'],
                'contact_no' => $validated['contact_no'],
                'birthdate' => $validated['birthdate'],
                'age' => $validated['age'],
                'birthplace' => $validated['birthplace'],
                'educ_background' => $validated['educ_background'],
                'other_educational_background' => $validated['other_educational_background'],
                'children_count' => $validated['children_count'],
                'emContact_person' => $validated['emContact_person'],
                'emRelationship' => $validated['emRelationship'],
                'emContact_no' => $validated['emContact_no'],
                'emAddress' => $validated['emAddress'],
                'type' => 'walk-in',
            ]);
        } else {
            $walkInOwner->update([
                'salutation' => $validated['salutation'],
                'last_name' => $validated['last_name'],
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'suffix' => $validated['suffix'],
                'address' => $validated['address'],
                'resident_since' => $validated['resident_since'] . '-01',
                'nationality' => $validated['nationality'],
                'gender' => $validated['gender'],
                'civil_status' => $validated['civil_status'],
                'contact_no' => $validated['contact_no'],
                'birthdate' => $validated['birthdate'],
                'age' => $validated['age'],
                'birthplace' => $validated['birthplace'],
                'educ_background' => $validated['educ_background'],
                'other_educational_background' => $validated['other_educational_background'] ?? '',
                'children_count' => $validated['children_count'],
                'emContact_person' => $validated['emContact_person'],
                'emRelationship' => $validated['emRelationship'],
                'emContact_no' => $validated['emContact_no'],
                'emAddress' => $validated['emAddress'],
            ]);
        }

        session(['walkInOwner' => $walkInOwner->id]);

        return redirect(route('walk-in.livelihood'));
    }

    public function walkInLivelihood(Request $request)
    {
        $source_of_income = $this->source_of_income;
        $owner_livelihood = $request->session()->get('walkInOwner');

        $livelihood = Livelihood::where('owner_info_id', $owner_livelihood)->first();


        return view('modules.walk-in.livelihood', compact('source_of_income', 'livelihood', 'owner_livelihood'));
    }

    public function walkInLivelihoodStore(Request $request)
    {
        $validated = $request->validate([
            'walkin_owner_id' => 'required',
            'source_of_income' => ['nullable', 'array'],
            'source_of_income.*' => 'in:Capture Fishing,Aquaculture,Fish Vending,Fish Processing,Gleaning,Other',
            'gear_used' => 'nullable',
            'culture_method' => 'nullable',
            'specify' => 'nullable',
            'other_income_sources' => ['nullable', 'array'],
            'other_income_sources.*' => 'in:Capture Fishing,Aquaculture,Fish Vending,Fish Processing,Gleaning,Other',
            'gear_used_os' => 'nullable',
            'culture_method_os' => 'nullable',
            'specify_os' => 'nullable',
            'org_name' => 'nullable',
            'member_since' => 'nullable',
            'position' => 'nullable',
        ]);

        // Initialize empty arrays for cases when the 'other_income_sources' key is not provided.
        $source_of_income = $validated['source_of_income'] ?? [];
        $other_income_sources = $validated['other_income_sources'] ?? [];

        $owner_livelihood = $request->session()->get('walkInOwner');


        $livelihood = Livelihood::where('owner_info_id', $owner_livelihood)->first();

        if (!$livelihood) {
            $livelihood = new Livelihood();

            $livelihood->owner_info_id = $owner_livelihood;
            $livelihood->source_of_income = serialize($source_of_income);
            $livelihood->gear_used = $validated['gear_used'];
            $livelihood->culture_method = $validated['culture_method'];
            $livelihood->specify = $validated['specify'];
            $livelihood->other_income_sources = serialize($other_income_sources);
            $livelihood->gear_used_os = $validated['gear_used_os'];
            $livelihood->culture_method_os = $validated['culture_method_os'];
            $livelihood->specify_os = $validated['specify_os'];
            $livelihood->org_name = $validated['org_name'];
            $livelihood->member_since = $validated['member_since'];
            $livelihood->position = $validated['position'];
            $livelihood->save();
        } else {
            // update Livelihood if already exists
            $livelihood->update([
                'source_of_income' => serialize($source_of_income),
                'gear_used' => $validated['gear_used'],
                'culture_method' => $validated['culture_method'],
                'specify' => $validated['specify'],
                'other_income_sources' => serialize($other_income_sources),
                'gear_used_os' => $validated['gear_used_os'],
                'culture_method_os' => $validated['culture_method_os'],
                'specify_os' => $validated['specify_os'],
                'org_name' => $validated['org_name'],
                'member_since' => $validated['member_since'],
                'position' => $validated['position'],
            ]);
        }

        session(['walkInOwner' =>  $owner_livelihood]);


        return redirect()->route('walk-in.adss')->with('success', 'Owner Information successfully saved!');
    }

    public function walkInAdss(Request $request)
    {
        $owner_adss = $request->session()->get('walkInOwner');
        $adss = Adss::where('owner_info_id', $owner_adss)->first();
        $yes_no = ['Yes', 'No'];

        return view('modules.walk-in.adss', compact('yes_no', 'adss', 'owner_adss'));
    }

    public function walkInAdssStore(Request $request)
    {
        $validated = $request->validate([
            'walkin_owner_adss_id' => 'required',
            'name_spouse' => 'required',
            'number_dependent'  => 'required',
            'name_employer'  => 'required',
            'desired_coverage'  => 'required',
            'premium'  => 'required',
            'cover_from'  => 'required',
            'cover_to'  => 'required',
            'primary_beneficiary'  => 'nullable',
            'primary_relationship'  => 'nullable',
            'secondary_beneficiary'  => 'nullable',
            'secondary_relationship'  => 'nullable',
            'minor_trustee'  => 'nullable',
            'pcic_coverage'  => 'nullable',
            'pcic_name'  => 'nullable',
            'pcic_relationship'  => 'nullable',
            'pcic_address'   => 'nullable',
        ]);


        $owner_adss = $request->session()->get('walkInOwner');
        $adss = Adss::where('owner_info_id', $owner_adss)->first();

        if (!$adss) {
            $adss = new Adss();

            $adss->owner_info_id = $validated['walkin_owner_adss_id'];
            $adss->spouse_name = $validated['name_spouse'];
            $adss->number_dependent = $validated['number_dependent'];
            $adss->employer_name = $validated['name_employer'];
            $adss->desired_coverage = $validated['desired_coverage'];
            $adss->premium = $validated['premium'];
            $adss->cover_from = $validated['cover_from'];
            $adss->cover_to = $validated['cover_to'];
            $adss->primary_beneficiary = $validated['primary_beneficiary'];
            $adss->primary_relationship = $validated['primary_relationship'];
            $adss->secondary_beneficiary = $validated['secondary_beneficiary'];
            $adss->secondary_relationship = $validated['secondary_relationship'];
            $adss->minor_trustee = $validated['minor_trustee'];
            $adss->pcic_coverage = $validated['pcic_coverage'];
            $adss->pcic_name = $validated['pcic_name'];
            $adss->pcic_relationship = $validated['pcic_relationship'];
            $adss->pcic_address = $validated['pcic_address'];

            $adss->save();
        } else {
            $adss->update([
                $adss->spouse_name = $validated['name_spouse'],
                $adss->number_dependent = $validated['number_dependent'],
                $adss->employer_name = $validated['name_employer'],
                $adss->desired_coverage = $validated['desired_coverage'],
                $adss->premium = $validated['premium'],
                $adss->cover_from = $validated['cover_from'],
                $adss->cover_to = $validated['cover_to'],
                $adss->primary_beneficiary = $validated['primary_beneficiary'],
                $adss->primary_relationship = $validated['primary_relationship'],
                $adss->secondary_beneficiary = $validated['secondary_beneficiary'],
                $adss->secondary_relationship = $validated['secondary_relationship'],
                $adss->minor_trustee = $validated['minor_trustee'],
                $adss->pcic_coverage = $validated['pcic_coverage'],
                $adss->pcic_name = $validated['pcic_name'],
                $adss->pcic_relationship = $validated['pcic_relationship'],
                $adss->pcic_address = $validated['pcic_address'],
            ]);
        }
        return redirect()->route('owner-info.registered-owners')->with('success', 'Walk-In Information successfully saved!');
    }

    // public function registeredBoat(RegisterBoat $walkin)
    // {
    //     $walkin_reg_boat = RegisterBoat::where('owner_info_id', $walkin->id)
    //         ->orderBy('registration_date', 'asc')
    //         ->get();

    //     return view('modules.walk-in.registered-boat.index', compact('walkin', 'walkin_reg_boat'));
    // }

    public function createRegBoat(RegisterBoat $registerboat, $walkin)
    {
        // dd($walkin);

        $reg_nos = RegisterBoat::all();
        $reg_no = $reg_nos->max('registration_no') ?? 0;
        $latestregNo = intval(substr($reg_no, 8)) + 1;
        $addSeries = sprintf("%04d", $latestregNo);
        $latestregNo = date('Y-m-') . $addSeries;

        return view('modules.walk-in.registered-boat.create', compact('registerboat', 'walkin', 'latestregNo'));
    }

    protected function messageRegBoatWalkin()
    {
        return [
            'registration_no.required' => 'Registration number is required.',
            'registration_date.required' => 'Registration date is required.',
            'vessel_name.required' => 'Vessel name is required.',
            'vessel_name.unique' => 'Vessel name already exists.',
            'vessel_type.required' => 'Vessel type is required.',
            'home_port.required' => 'Home port is required.',
            'place_built.required' => 'Place built is required.',
            'year_built.required' => 'Year built is required.',
            'body_number.required' => 'Body number is required.',
            'color.required' => 'Color is required.',
            'color.regex' => 'Color must be letters only and a comma.',
            'serial_number' => ['nullable', 'unique:boats,serial_number'],
            'length.required' => 'Length is required.',
            'breadth.required' => 'Breadth is required.',
            'tonnage_length.required' => 'Tonnage length is required.',
            'tonnage_breadth.required' => 'Tonnage breadth is required.',
            'tonnage_depth.required' => 'Tonnage depth is required.',
            'gross_tonnage.required' => 'Gross tonnage is required.',
            'net_tonnage.required' => 'Net tonnage is required.',
            'depth.required' => 'Depth is required.',
            'materials_used.required' => 'Materials used is required.',
            'boat_image.required' => 'Boat image is required.',
            'boat_image.image' => 'Boat image must be an image.',
            'boat_image.mimes' => 'Boat image must be a file of type: jpeg, png, jpg, gif.',
            'boat_image.max' => 'Boat image must not exceed 5MB.',
        ];
    }

    public function walkInRegBoatStore(Request $request)
    {
        $validated = $request->validate([
            'owner_id' => 'required',
            'registration_no' => 'required',
            'registration_date' => 'required',
            'vessel_name' => ['required', 'unique:boats,vessel_name'],
            'vessel_type' => ['required'],
            'home_port' => ['required'],
            'place_built' => ['required'],
            'year_built' => ['required'],
            'engine_make' => ['nullable'],
            'serial_number' => ['nullable', 'unique:boats,serial_number'],
            'horsepower' => ['nullable'],
            'body_number' => ['required'],
            'color' => ['required', 'regex:/^[a-zA-Z, ]*$/'], // letters and comma only
            'length' => ['required'],
            'breadth' => ['required'],
            'tonnage_length' => ['required'],
            'tonnage_breadth' => ['required'],
            'tonnage_depth' => ['required'],
            'gross_tonnage' => ['required'],
            'net_tonnage' => ['required'],
            'depth' => ['required'],
            'materials_used' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
        ], $this->messageRegBoatWalkin());

        // dd($validated);

        // check if validated image is not null
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $ext;

            // if images/user-upload does not exist, create it and move image into that folder
            if (!is_dir(public_path('images/user-upload'))) {
                mkdir(public_path('images/user-upload'), 0777, true);
            }

            $image->move(public_path('images/user-upload'), $imageName);
        }

        // get max certification_no from Certification model
        $cert = Certification::all();
        $maxCert = $cert->max('certificate_no') ?? 0;
        $latestCertNo = intval(substr($maxCert, 8)) + 1;
        $addSeries = sprintf("%04d", $latestCertNo);
        $latestCertNo = date('Y-') . $addSeries;


        $owner_id = $request->input('owner_id');
        // 
        $boatReg = RegisterBoat::where('registration_no', $validated['registration_no'])->first();

        if (!$boatReg) {
            $boatReg = new RegisterBoat();
            $boatReg->owner_info_id = $owner_id;
            $boatReg->registration_no = $validated['registration_no'];
            $boatReg->registration_date = $validated['registration_date'];
            $boatReg->registration_type = 'new';
            $boatReg->status = 'registered';
            $boatReg->approved_at = now();
            $boatReg->save();

            $certification = new Certification();
            $certification->certificate_no = $latestCertNo;
            $certification->register_boat_id = $boatReg->id;
            $certification->save();
        } else {
            $boatReg->update(Arr::only($validated, [
                'registration_date',
            ]));
        }

        $boatReg->boat()->create([
            'owner_id' => $owner_id,
            'vessel_name' => $validated['vessel_name'],
            'image' => $imageName,
            'boat_type' => $validated['vessel_type'],
            'home_port' => $validated['home_port'],
            'place_built' => $validated['place_built'],
            'year_built' => $validated['year_built'],
            'serial_number' => $validated['serial_number'],
            'engine_make' => $validated['engine_make'],
            'horsepower' => $validated['horsepower'] ?? '',
            'color' => $validated['color'],
            'length' => $validated['length'],
            'breadth' => $validated['breadth'],
            'depth' => $validated['depth'],
            'body_number' => $validated['body_number'],
            'materials' => $validated['materials_used'],
            'tonnage_length' => $validated['tonnage_length'],
            'tonnage_breadth' => $validated['tonnage_breadth'],
            'tonnage_depth' => $validated['tonnage_depth'],
            'gross_tonnage' => $validated['gross_tonnage'],
            'net_tonnage' => $validated['net_tonnage'],
        ]);

        return redirect()->route('owner-info.registered-owners', $owner_id)->with('success', 'Walk In Boat Registration Succesfully!');
    }

    public function walkInRegBoatView(WalkInBoatRegistration $walkin)
    {
        $type_vessel = ['Motorized', 'Non-Motorized'];

        return view('modules.walk-in.registered-boat.view', compact('walkin', 'type_vessel'));
    }

    public function walkInRegBoatUpdate(Request $request, WalkInBoatRegistration $walkin)
    {
        $validated = $request->validate([
            'registration_no' => 'required',
            'registration_date' => 'required',
            'vessel_name' => ['required', 'unique:boats,vessel_name'],
            'vessel_type' => ['required'],
            'home_port' => ['required'],
            'place_built' => ['required'],
            'year_built' => ['required'],
            'engine_make' => ['nullable'],
            'serial_number' => ['nullable', 'unique:boats,serial_number'],
            'horsepower' => ['nullable'],
            'body_number' => ['required'],
            'color' => ['required', 'regex:/^[a-zA-Z, ]*$/'], // letters and comma only
            'length' => ['required'],
            'breadth' => ['required'],
            'tonnage_length' => ['required'],
            'tonnage_breadth' => ['required'],
            'tonnage_depth' => ['required'],
            'gross_tonnage' => ['required'],
            'net_tonnage' => ['required'],
            'depth' => ['required'],
            'materials_used' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
        ], $this->messageRegBoatWalkin());

        // if validated image is null, use the old image name
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $ext;

            // if images/user-upload does not exist, create it and move image into that folder
            if (!is_dir(public_path('images/user-upload'))) {
                mkdir(public_path('images/user-upload'), 0777, true);
            }

            $image->move(public_path('images/user-upload'), $imageName);

            // check first if image exists in the folder, if it does, delete it, else, do nothing
            if (file_exists(public_path('images/user-upload/' . $walkin->image))) {
                unlink(public_path('images/user-upload/' . $walkin->image));
            }
        } else {
            $imageName = $walkin->image;
        }

        $walkin->update([
            'registration_no' => $validated['registration_no'],
            'registration_date' => $validated['registration_date'],
            'registration_type' => 'new',
            'vessel_name' => $validated['vessel_name'],
            'image' => $imageName,
            'vessel_type' => $validated['vessel_type'],
            'home_port' => $validated['home_port'],
            'place_built' => $validated['place_built'],
            'year_built' => $validated['year_built'],
            'engine_make' => $validated['engine_make'],
            'horsepower' => $validated['horsepower'] ?? '',
            'color' => $validated['color'],
            'length' => $validated['length'],
            'breadth' => $validated['breadth'],
            'depth' => $validated['depth'],
            'body_number' => $validated['body_number'],
            'materials' => $validated['materials_used'],
            'tonnage_length' => $validated['tonnage_length'],
            'tonnage_breadth' => $validated['tonnage_breadth'],
            'tonnage_depth' => $validated['tonnage_depth'],
            'gross_tonnage' => $validated['gross_tonnage'],
            'net_tonnage' => $validated['net_tonnage'],
        ]);


        return redirect()->route('walkin-regboat.index', $walkin->walkin_owner_id)->with('success', 'Walk In Boat Registration Update Succesfully!');
    }

    public function walkInRegBoatDelete($id)
    {
        $walkinRegBoat = WalkInBoatRegistration::find($id);
        $walkinRegBoat->delete();

        return redirect()->route('walkin-regboat.index', $walkinRegBoat->walkin_owner_id)->with('success', 'Walk In Owner deleted successfully!');
    }
}
