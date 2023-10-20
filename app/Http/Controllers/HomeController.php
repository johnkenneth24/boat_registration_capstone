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
        $registeredCount = $rBoats->where('status', 'registered')->count();
        $pendingCount = $rBoats->where('status', 'pending')->count();
        $renewalCount = $rBoats->where('status', 'renewal')->count();

        $expiredCount = $rBoats->where('status', 'registered')->where('approved_at', '<', now()->endOfYear())->count();


        // dd($expiredCount);

        $user = auth()->user()->roles->first()->name;

        // dd($user);

        if ($user == 'admin' || $user == 'staff') {
            $pendings = RegisterBoat::where('status', 'pending')->get();
        } else {
            $user_id = auth()->user()->id;
            $pendings = RegisterBoat::where('user_id', $user_id)->where('status', 'pending')->paginate(10);
        }

        $owner_info = OwnerInfo::where('user_id', auth()->user()->id)->first();
        // dd($owner_info);


        $owners = OwnerInfo::all();
        $ownerCount = $owners->count();

        $announcements = Announcements::all();

        return view('home', compact('rBoats', 'registeredCount', 'pendingCount', 'pendings', 'renewalCount', 'expiredCount', 'ownerCount', 'announcements', 'owner_info'));
    }
}
