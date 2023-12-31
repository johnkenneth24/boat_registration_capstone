<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\OwnerInfo;
use App\Models\RegisterBoat;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $rBoats = RegisterBoat::all();
        $registeredCount = $rBoats->where('status', 'registered')->filter(function ($boat) {
            $approvalDate = \Carbon\Carbon::parse($boat->approved_at);
            $currentYear = now()->year;
            return $approvalDate->year >= $currentYear && $approvalDate->endOfYear() >= now();
        })->count();

        $pendingCount = $rBoats->where('status', 'pending')->count();
        $renewalCount = $rBoats->where('registration_type', 'renewal')->count();

        $expiredCount = $rBoats->where('status', 'registered')->filter(function ($boat) {
            $approvalDate = \Carbon\Carbon::parse($boat->approved_at);
            $currentYear = now()->year;
            return $approvalDate->year < $currentYear && $approvalDate->endOfYear() < now();
        })->count();


        // dd($rBoats);
        // dd($expiredCount);

        $user = auth()->user()->roles->first()->name;

        // dd($user);

        if ($user == 'admin' || $user == 'staff') {
            $pendings = RegisterBoat::whereIn('status', ['pending', 'pending for renewal'])->get();
        } else {
            $user_id = auth()->user()->id;
            $pendings = RegisterBoat::where('user_id', $user_id)->whereIn('status', ['pending', 'pending for renewal'])->paginate(10);
        }

        $owner_info = OwnerInfo::where('user_id', auth()->user()->id)->first();
        // dd($owner_info);


        $owners = OwnerInfo::all();
        $ownerCount = $owners->count();

        $announcements = Announcements::all();

        return view('home', compact('rBoats', 'registeredCount', 'pendingCount', 'pendings', 'renewalCount', 'expiredCount', 'ownerCount', 'announcements', 'owner_info'));
    }
}
