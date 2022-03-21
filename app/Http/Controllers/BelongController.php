<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BelongController extends Controller
{
    // チーム所属
    public function belong($id)
    {
        Auth::user()->teams()->attach($id);
        return redirect()->route('team.index');
    }

    // チーム退会
    public function unbelong($id)
    {
        Auth::user()->teams()->detach($id);
        return redirect()->route('team.index');
    }
}
