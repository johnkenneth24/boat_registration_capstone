<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use App\Models\OwnerInfo;
use Illuminate\Support\Arr;
use App\Models\RegisterBoat;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Notifications\Disapproved;
use App\Notifications\BoatRegistered;
use App\Notifications\Renewal;

use Illuminate\Validation\Rule;


class RegisterBoatController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $roleName = $user->getRoleNames()->first();

        if ($roleName === 'admin' || $roleName === 'staff') {
            $search = $request->input('search');

            $query = RegisterBoat::where('status', 'registered')
                ->with(['ownerInfo', 'boat'])
                ->where(function ($query) use ($search) {
                    $query->where('registration_no', 'like', '%' . $search . '%')
                        ->orWhere('registration_date', 'like', '%' . $search . '%')
                        ->orWhereHas('ownerInfo', function ($query) use ($search) {
                            $query->where('first_name', 'like', '%' . $search . '%')
                                ->orWhere('middle_name', 'like', '%' . $search . '%')
                                ->orWhere('last_name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('boat', function ($query) use ($search) {
                            $query->where('vessel_name', 'like', '%' . $search . '%')
                                ->orWhere('boat_type', 'like', '%' . $search . '%');
                        });
                })
                ->orderBy('created_at', 'asc');

            $registeredBoats = $query->paginate(10);

            return view('modules.register-boat.index', compact('registeredBoats'));
        } else {
            $user_id = $user->id;
            $ownerInfo = OwnerInfo::where('user_id', $user_id)->first();
            $registeredBoats = RegisterBoat::where('user_id', $user_id)->paginate(10);

            return view('modules.register-boat.index', compact('registeredBoats', 'ownerInfo'));
        }
    }

    public function pendingRegBoats(Request $request)
    {
        $search = $request->input('search');

        $query = RegisterBoat::whereIn('status', ['pending', 'pending for renewal'])
            ->with(['ownerInfo', 'boat'])
            ->where(function ($query) use ($search) {
                $query->where('registration_no', 'like', '%' . $search . '%')
                    ->orWhere('registration_date', 'like', '%' . $search . '%')
                    ->orWhereHas('ownerInfo', function ($query) use ($search) {
                        $query->where('first_name', 'like', '%' . $search . '%')
                            ->orWhere('middle_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('boat', function ($query) use ($search) {
                        $query->where('vessel_name', 'like', '%' . $search . '%')
                            ->orWhere('boat_type', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy('created_at', 'asc');

        $pendingBoats = $query->paginate(10);

        return view('modules.register-boat.pending', compact('pendingBoats'));
    }

    public function archived(Request $request)
    {
        $search = $request->input('search');

        $query = RegisterBoat::withTrashed()
            ->where(function ($query) use ($search) {
                $query->where('status', 'disapproved')
                    ->orWhere('deleted_at', '<>', null); // archived
            })
            ->with(['ownerInfo', 'boat'])
            ->where(function ($query) use ($search) {
                $query->where('registration_no', 'like', '%' . $search . '%')
                    ->orWhere('registration_date', 'like', '%' . $search . '%')
                    ->orWhereHas('ownerInfo', function ($query) use ($search) {
                        $query->where('first_name', 'like', '%' . $search . '%')
                            ->orWhere('middle_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('boat', function ($query) use ($search) {
                        $query->where('vessel_name', 'like', '%' . $search . '%')
                            ->orWhere('boat_type', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy('created_at', 'asc');

        $archivedBoats = $query->paginate(10);


        return view('modules.register-boat.archived', compact('archivedBoats'));
    }

    public function reports()
    {
        $reports = RegisterBoat::paginate(10);

        return view('modules.reports.index', compact('reports'));
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

    protected function messages()
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


    public function regBoat(Request $request)
    {

        $rules = [
            'owner_id' => 'nullable',
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
            'color' => ['required', 'regex:/^[a-zA-Z, ]*$/'],
            'materials_used' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
        ];

        $user = auth()->user();

        if ($user->hasRole(['staff', 'admin'])) {
            $rules['length'] = 'required';
            $rules['breadth'] = 'required';
            $rules['depth'] = 'required';
            $rules['tonnage_length'] = 'required';
            $rules['tonnage_breadth'] = 'required';
            $rules['tonnage_depth'] = 'required';
            $rules['gross_tonnage'] = 'required';
            $rules['net_tonnage'] = 'required';
        }


        $validated = $request->validate($rules, $this->messages());

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

        // to prevent duplicate entries
        $boatReg = RegisterBoat::where('registration_no', $validated['registration_no'])->first();

        if ($boatReg) {
            $boatReg->update(Arr::only($validated, ['registration_date']));
        } else {
            $boatReg = RegisterBoat::create([
                'user_id' => auth()->user()->id,
                'registration_no' => $validated['registration_no'],
                'registration_date' => $validated['registration_date'],
                'owner_info_id' => $validated['owner_id'],
                'registration_type' => 'new',
            ]);
        }

        $owners = Boat::create([
            'user_id' => auth()->user()->id,
            'register_boat_id' => $boatReg->id,
            'owner_id' => $validated['owner_id'],
            'vessel_name' => $validated['vessel_name'],
            'image' => $imageName,
            'boat_type' => $validated['vessel_type'],
            'home_port' => $validated['home_port'],
            'place_built' => $validated['place_built'],
            'year_built' => $validated['year_built'],
            'engine_make' => $validated['engine_make'],
            'serial_number' => $validated['serial_number'],
            'horsepower' => $validated['horsepower'] ?? '',
            'color' => $validated['color'],
            'length' => $validated['length'] ?? '',
            'breadth' => $validated['breadth'] ?? '',
            'depth' => $validated['depth'] ?? '',
            'body_number' => $validated['body_number'],
            'materials' => $validated['materials_used'],
            'tonnage_length' => $validated['tonnage_length'] ?? '',
            'tonnage_breadth' => $validated['tonnage_breadth'] ?? '',
            'tonnage_depth' => $validated['tonnage_depth']  ?? '',
            'gross_tonnage' => $validated['gross_tonnage'] ?? '',
            'net_tonnage' => $validated['net_tonnage']  ?? '',
        ]);

        return redirect()->route('reg-boat.index')->with('success', 'Boat record added. Please wait for confirmation regarding your registration!');
    }

    public function edit($id)
    {
        $boatReg = RegisterBoat::with('boat')->find($id);

        return view('modules.register-boat.edit', compact('boatReg'));
    }

    public function updatePending(Request $request, $id)
    {

        $boat = Boat::where('id', $id)->first();

        $validated = $request->validate([
            'length' => 'required',
            'breadth' => 'required',
            'depth' => 'required',
            'tonnage_length' => 'required',
            'tonnage_breadth' => 'required',
            'tonnage_depth' => 'required',
            'gross_tonnage' => 'required',
            'net_tonnage' => 'required',
        ]);

        $boat->update($validated);

        return redirect()->back()->with('success', 'Boat record updated.');
    }

    public function update(Request $request, $id)
    {

        $boat = Boat::with('registerBoat')->where('register_boat_id', $id)->first();

        $rules = [
            'vessel_name' => ['required', Rule::unique('boats', 'vessel_name')->ignore($boat->id),],
            'vessel_type' => ['required'],
            'home_port' => ['required'],
            'place_built' => ['required'],
            'year_built' => ['required'],
            'engine_make' => ['nullable'],
            'serial_number' => ['nullable', Rule::unique('boats', 'serial_number')->ignore($boat->id),],
            'horsepower' => ['nullable'],
            'body_number' => ['required'],
            'color' => ['required', 'regex:/^[a-zA-Z, ]*$/'],
            'materials_used' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
        ];

        $user = auth()->user();

        if ($user->hasRole(['staff', 'admin'])) {
            $rules['length'] = 'required';
            $rules['breadth'] = 'required';
            $rules['depth'] = 'required';
            $rules['tonnage_length'] = 'required';
            $rules['tonnage_breadth'] = 'required';
            $rules['tonnage_depth'] = 'required';
            $rules['gross_tonnage'] = 'required';
            $rules['net_tonnage'] = 'required';
        }


        $validated = $request->validate($rules, $this->messages());

        // dd($validated);

        // dd($boat);

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
            if (file_exists(public_path('images/user-upload/' . $boat->image))) {
                unlink(public_path('images/user-upload/' . $boat->image));
            }
        } else {
            $imageName = $boat->image;
        }

        $boat->update([
            'vessel_name' => $validated['vessel_name'],
            'image' => $imageName,
            'boat_type' => $validated['vessel_type'],
            'home_port' => $validated['home_port'],
            'place_built' => $validated['place_built'],
            'year_built' => $validated['year_built'],
            'engine_make' => $validated['engine_make'] ?? '',
            'serial_number' => $validated['serial_number'] ?? '',
            'horsepower' => $validated['horsepower'] ?? '',
            'color' => $validated['color'],
            'length' => $validated['length'] ?? '',
            'breadth' => $validated['breadth'] ?? '',
            'depth' => $validated['depth'] ?? '',
            'body_number' => $validated['body_number'],
            'materials' => $validated['materials_used'],
            'tonnage_length' => $validated['tonnage_length'] ?? '',
            'tonnage_breadth' => $validated['tonnage_breadth'] ?? '',
            'tonnage_depth' => $validated['tonnage_depth'] ?? '',
            'gross_tonnage' => $validated['gross_tonnage'] ?? '',
            'net_tonnage' => $validated['net_tonnage'] ?? '',
        ]);

        return redirect()->route('reg-boat.index')->with('success', 'Boat record updated. Please wait for confirmation regarding your registration!');
    }

    public function show($id)
    {
        $boatReg = RegisterBoat::with('boat')->find($id);

        return view('modules.register-boat.view', compact('boatReg'));
    }

    public function destroy($id)
    {
        $boatReg = RegisterBoat::with('boat')->find($id);

        if ($boatReg->boat) {
            $boatReg->boat->delete();
        }

        $boatReg->delete();
        return redirect()->route('reg-boat.index')->with('success', 'Boat record deleted successfully!');
    }

    public function view($id)
    {
        // Fetch a specific boat registration record by ID, including the associated boat information
        // Retrieve both soft-deleted (trashed) records
        $boatReg = RegisterBoat::with(['boat' => function ($query) {
            $query->withTrashed();
        }])
            ->withTrashed()
            ->find($id);

        // Return a view, passing the boat registration data to the view
        return view('modules.register-boat.pending-view', compact('boatReg'));
    }

    public function archivedView($id)
    {
        // Fetch a specific boat registration record by ID, including the associated boat information
        // Retrieve both soft-deleted (trashed) records
        $boatReg = RegisterBoat::with(['boat' => function ($query) {
            $query->withTrashed();
        }])
            ->withTrashed()
            ->find($id);

        // Return a view, passing the boat registration data to the view
        return view('modules.register-boat.archived-view', compact('boatReg'));
    }

    public function approve($id)
    {
        $boatReg = RegisterBoat::find($id);

        $user = OwnerInfo::where('id', $boatReg->owner_info_id)->first();

        // dd($user);
        $user->notify(new BoatRegistered());

        $boatReg->status = 'registered';
        $boatReg->approved_at = now();
        $boatReg->save();

        // Check if a Certification with the matching register_boat_id exists
        $certification = Certification::firstOrNew(['register_boat_id' => $boatReg->id]);

        // If it doesn't exist, create a new Certification
        if (!$certification->exists) {
            // get max certification_no from Certification model
            $cert = Certification::all();
            $maxCert = $cert->max('certificate_no') ?? 0;
            $latestCertNo = intval(substr($maxCert, 8)) + 1;
            $addSeries = sprintf("%04d", $latestCertNo);
            $latestCertNo = date('Y-') . $addSeries;

            $certification->certificate_no = $latestCertNo;
            $certification->register_boat_id = $boatReg->id;
            $certification->save();
        }


        return redirect()->route('reg-boat.pending')->with('success', 'Boat Registration successfully approved!');
    }


    public function disapprove($id)
    {
        $boatReg = RegisterBoat::find($id);

        $user = OwnerInfo::where('id', $boatReg->owner_info_id)->first();

        // dd($user);
        $user->notify(new Disapproved());

        $boatReg->status = 'disapproved';
        $boatReg->save();

        return redirect()->route('reg-boat.pending')->with('success', 'Boat Registration successfully disapproved!');
    }

    public function undo($id)
    {
        $boatReg = RegisterBoat::find($id);
        $boatReg->status = 'pending';
        $boatReg->approved_at = null;
        $boatReg->save();

        return redirect()->route('reg-boat.archived')->with('success', 'Boat Registration successfully restored!');
    }


    public function renewal(Request $request, $id)
    {

        $boatReg = RegisterBoat::with('boat')->find($id);

        // dd($boatReg);

        return view('modules.register-boat.renewal', compact('boatReg'));
    }

    public function renewalUpdate(Request $request, $id)
    {

        $boatReg = RegisterBoat::with('boat')->find($id);

        $validated = $request->validate([
            'owner_id' => 'nullable',
            'registration_no' => 'required',
            'registration_date' => 'required',
            'vessel_name' => [
                'required',
                Rule::unique('boats', 'vessel_name')->ignore($boatReg->boat->id),
            ],
            'vessel_type' => ['required'],
            'home_port' => ['required'],
            'place_built' => ['required'],
            'year_built' => ['required'],
            'engine_make' => ['nullable'],
            'serial_number' => ['nullable', Rule::unique('boats', 'serial_number')->ignore($boatReg->boat->id),],
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
        ], $this->messages());


        $boatReg->update([
            'registration_no' => $validated['registration_no'],
            'registration_date' => $validated['registration_date'],
            'registration_type' => 'renewal',
            'status' => 'pending for renewal',
            'approved_at' => null,
        ]);


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
            if (file_exists(public_path('images/user-upload/' . $boatReg->boat->image))) {
                unlink(public_path('images/user-upload/' . $boatReg->boat->image));
            }
        } else {
            $imageName = $boatReg->boat->image;
        }

        $boatReg->boat->update([
            'vessel_name' => $validated['vessel_name'],
            'image' => $imageName,
            'boat_type' => $validated['vessel_type'],
            'home_port' => $validated['home_port'],
            'place_built' => $validated['place_built'],
            'year_built' => $validated['year_built'],
            'engine_make' => $validated['engine_make'] ?? '',
            'serial_number' => $validated['serial_number'] ?? '',
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

        return redirect()->route('reg-boat.index')->with('success', 'Boat record updated. Please wait for confirmation regarding your renewal registration!');
    }
}
