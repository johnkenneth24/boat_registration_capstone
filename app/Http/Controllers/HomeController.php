<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Owners;
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
        $count = $rBoats->count();
        $pendingCount = $rBoats->where('status', 'pending')->count();
        $renewalCount = $rBoats->where('status', 'renewal')->count();
        $expiredCount = $rBoats->where('status', 'expired')->count();
        $user = auth()->user();
        if ($user->role === 'admin' || $user->role === 'staff') {
            $pendings = $rBoats->where('status', 'pending')->all();
        } else {
            $user_id = auth()->user()->id;
            $pendings = $rBoats->where('status', 'pending')->where('user_id', $user_id)->all();
        }

        $owners = Owners::all();
        $ownerCount = $owners->count();

        $announcements = Announcements::all();

        return view('home', compact('rBoats', 'count', 'pendingCount', 'pendings', 'renewalCount', 'expiredCount', 'ownerCount', 'announcements'));
    }
}
