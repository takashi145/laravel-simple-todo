<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function invitation($id)
    {
        $team = Team::findOrFail($id);
        return view('team.invitation', compact('team'));
    }

    public function store(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $user = User::where('name', $request->name)->first();
        $team->invitation_users()->attach($user->id);
        return redirect()->route('team.index');
    }

    public function uninvitation($id)
    {
        Auth::user()->invitation_teams()->detach($id);
        return redirect()->back();
    }
}
