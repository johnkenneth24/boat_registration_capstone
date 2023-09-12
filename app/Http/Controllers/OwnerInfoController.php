<?php

namespace App\Http\Controllers;

use App\Models\Livelihood;
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
        $ownerInfo = OwnerInfo::where('user_id', auth()->user()->id)->first();

        // dd($ownerInfo);
        return view('modules.owner-info.user-info.index', compact('ownerInfo'));
    }
    public function personal($id = null)
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

        return view('modules.owner-info.user-info.personal', compact('salutations', 'suffixes', 'genders', 'civil_status', 'educ_bcc', 'ownerInfo'));
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
            'resident_since' => ['required', 'date:Y-m'],
            'nationality' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'contact_no' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'birthdate' => 'required',
            'age' => 'required',
            'birthplace' => 'required',
            'educ_background' => 'required',
            'other_educational_background' => 'nullable',
            'children_count' => 'nullable',
            'emContact_person' => 'nullable',
            'emRelationship' => 'nullable',
            'emContact_no' => 'nullable',
            'emAddress' => 'nullable',
        ]);

        //    check first if OwnerInfo exists with user_id same as auth()->user()->id and if not exists then create new OwnerInfo
        $form1 = OwnerInfo::where('user_id', auth()->user()->id)->first();
        if (!$form1) {
            $form1 = new OwnerInfo();
            $form1->user_id = auth()->user()->id;
            $form1->salutation = $validated['salutation'];
            $form1->last_name = $validated['last_name'];
            $form1->first_name = $validated['first_name'];
            $form1->middle_name = $validated['middle_name'];
            $form1->suffix = $validated['suffix'];
            $form1->address = $validated['address'];
            $form1->resident_since = $validated['resident_since'] . '-01';
            $form1->nationality = $validated['nationality'];
            $form1->gender = $validated['gender'];
            $form1->civil_status = $validated['civil_status'];
            $form1->contact_no = $validated['contact_no'];
            $form1->birthdate = $validated['birthdate'];
            $form1->age = $validated['age'];
            $form1->birthplace = $validated['birthplace'];
            $form1->educ_background = $validated['educ_background'];
            $form1->other_educational_background = $validated['other_educational_background'];
            $form1->children_count = $validated['children_count'];
            $form1->emContact_person = $validated['emContact_person'];
            $form1->emRelationship = $validated['emRelationship'];
            $form1->emContact_no = $validated['emContact_no'];
            $form1->emAddress = $validated['emAddress'];
            $form1->save();
        } else {
            // else if exists, then update only
            $form1->update([
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

        session(['owner_info' => $form1->id]);

        return redirect(route('owner-info.livelihood'));
    }

    public $source_of_income = [
        'Capture Fishing',
        'Aquaculture',
        'Fish Vending',
        'Gleaning',
        'Fish Processing',
        'Other',
    ];

    public function livelihood(Request $request)
    {
        $source_of_income = $this->source_of_income;
        $form1_id = $request->session()->get('owner_info');

        $livelihood = Livelihood::where('user_id', auth()->user()->id)->first();

        // dd($livelihood);

        return view('modules.owner-info.user-info.livelihood', compact('source_of_income', 'livelihood', 'form1_id'));
    }

    public function livelihoodStore(Request $request)
    {
        $validated = $request->validate([
            'ownerinfoId' => 'required',
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

        $form1_id = $request->session()->get('owner_info');

        $livelihood = Livelihood::where('user_id', auth()->user()->id)->orWhere('owner_info_id', $form1_id)->first();

        if (!$livelihood) {
            $livelihood = new Livelihood();

            $livelihood->user_id = auth()->user()->id;
            $livelihood->owner_info_id = $form1_id;
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

        return redirect()->route('owner-info.index')->with('success', 'Owner Information successfully saved!');
    }

    public function regOwners()
    {
        $regOwners = OwnerInfo::with('livelihood')->where('status', 'registered')->paginate(10);

        return view('modules.owner-info.reg-owners', compact('regOwners'));
    }

    public function pendingOwners()
    {
        $pendingOwners = OwnerInfo::with('livelihood')->where('status', 'pending')->paginate(10);

        return view('modules.owner-info.pending-owners', compact('pendingOwners'));
    }

    public function approve($id)
    {
        // find OwnerInfo with id of $id and update status to registered
        $ownerInfo = OwnerInfo::find($id);
        $ownerInfo->status = 'registered';
        $ownerInfo->save();

        return redirect()->route('owner-info.pending-owners')->with('success', 'Owner Information successfully approved!');

    }
}
