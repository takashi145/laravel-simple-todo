<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Auth::user()->teams;
        $invited_teams = Auth::user()->invitation_teams;
        return view('team.index', compact('teams', 'invited_teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        $members = $team->users;
        $manager = $team->user;
        return view('team.show', compact('team','members', 'manager'));
    }

    public function store(Request $request)
    {
        $team = Team::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);
        Auth::user()->teams()->attach($team->id);
        session()->flash('message', 'チームが作成されました。');
        return redirect()->route('team.index');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        $members = $team->users;
        $manager = $team->user;
        return view('team.edit', compact('team', 'members', 'manager'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->update([
            'name' => $request->name,
            'user_id' => $request->manager
        ]);
        session()->flash('message', '更新しました。');
        return redirect()->route('team.index');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        session()->flash('message', 'チームを削除しました。');
        return redirect()->route('team.index');
    }

}
