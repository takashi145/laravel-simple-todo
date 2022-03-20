<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\Belong;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Auth::user()->teams;
        return view('team.index', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        $members = $team->users;
        return view('team.show', compact('team','members'));
    }

    public function store(Request $request)
    {
        $team = Team::create([
            'name' => $request->name,
        ]);
        Auth::user()->teams()->attach($team->id);
        return redirect()->route('team.index');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
