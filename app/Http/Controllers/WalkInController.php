<?php

namespace App\Http\Controllers;

use App\Models\OwnerInfo;
use App\Models\WalkInAdss;
use Illuminate\Http\Request;
use App\Models\WalkInBoatOwner;
use App\Models\WalkInLivelihood;

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

    public function index(Request $request)
    {
        // $search = $request->input('search');

        // $query = WalkInBoatOwner::where(function ($query) use ($search) {
        //         $query->where('registration_no', 'like', '%' . $search . '%')
        //             ->orWhere('registration_date', 'like', '%' . $search . '%')
        //             ->orWhereHas('ownerInfo', function ($query) use ($search) {
        //                 $query->where('first_name', 'like', '%' . $search . '%')
        //                     ->orWhere('middle_name', 'like', '%' . $search . '%')
        //                     ->orWhere('last_name', 'like', '%' . $search . '%');
        //             })
        //             ->orWhereHas('boat', function ($query) use ($search) {
        //                 $query->where('vessel_name', 'like', '%' . $search . '%')
        //                     ->orWhere('boat_type', 'like', '%' . $search . '%');
        //             });
        //     })
        //     ->orderBy('created_at', 'asc');

        // $walk_in = $query->paginate(10);

        $walk_in = WalkInBoatOwner::paginate(10);

        return view('modules.walk-in.index', compact('walk_in'));
    }
    public function create($id = null)
    {

        $salutations = $this->salutations;
        $suffixes = $this->suffixes;
        $genders = $this->genders;
        $civil_status = $this->civil_status;
        $educ_bcc = $this->educ_bcc;

        $ownerInfo = $id;

        if ($id) {
            $ownerInfo = WalkInBoatOwner::find($id);
        }

        return view('modules.walk-in.create', compact('salutations', 'suffixes', 'genders', 'civil_status', 'educ_bcc', 'ownerInfo'));
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
            'emAddress.regex' => 'Must not contain special characters or numbers',

        ];
    }

    public function store(Request $request, WalkInBoatOwner $id)
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
            'contact_no' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'birthdate' => 'required',
            'age' => 'required',
            'birthplace' => ['required', 'string'],
            'educ_background' => 'required',
            'other_educational_background' => ['nullable', 'string'],
            'children_count' => ['nullable', 'min:0'],
            'emContact_person' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'emRelationship' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/'],
            'emContact_no' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'emAddress' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/'],
        ], $this->messages());

        $walkInOwner = WalkInBoatOwner::where('id', $id)->first();

        if (!$walkInOwner) {
            $walkInOwner = WalkInBoatOwner::create([
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

        $livelihood = WalkInLivelihood::where('walkin_owner_id', $owner_livelihood)->first();


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


        $livelihood = WalkInLivelihood::where('walkin_owner_id', $owner_livelihood)->first();

        if (!$livelihood) {
            $livelihood = new WalkInLivelihood();

            $livelihood->walkin_owner_id = $owner_livelihood;
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
        $adss = WalkInAdss::where('walkin_owner_adss_id', $owner_adss)->first();
        $yes_no = ['Yes', 'No'];

        return view('modules.walk-in.adss', compact('yes_no', 'owner_adss'));
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
        $adss = WalkInAdss::where('walkin_owner_adss_id', $owner_adss)->first();

        if (!$adss) {
            $adss = new WalkInAdss();
        }
    }
}
