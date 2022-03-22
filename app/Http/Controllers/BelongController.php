<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BelongController extends Controller
{
    public function belong($id){
        abort('404');
    }

    // チーム所属
    public function store($id)
    {
        Auth::user()->teams()->attach($id);
        Auth::user()->invitation_teams()->detach($id);
        return redirect()->route('team.index');
    }

    // チーム退会
    public function unbelong($id)
    {
        Auth::user()->teams()->detach($id);
        return redirect()->route('team.index');
    }
}
