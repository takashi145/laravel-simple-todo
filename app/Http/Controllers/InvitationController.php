<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\Invitation;
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
        $user = User::where('name', $request->name)->first();  //ユーザ名からユーザーの情報を取得
        if(is_null($user)){
            session()->flash('error', 'ユーザーが存在しません。');
            return redirect()->back();
        }
        $belong_check = $team->users()->where('user_id', $user->id)->exists();  //すでにチームに所属済みか判定
        if($belong_check){
            session()->flash('error', 'すでに所属しているユーザーです。');
            return redirect()->back();
        }
        $team->invitation_users()->syncWithoutDetaching($user->id);
        session()->flash('message', 'ユーザーを招待を送りました。');
        return redirect()->route('team.index');
    }

    public function uninvitation($id)
    {
        Auth::user()->invitation_teams()->detach($id);
        return redirect()->back();
    }
}
