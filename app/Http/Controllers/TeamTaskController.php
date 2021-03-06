<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Team;
use App\Models\TeamTask;
use Illuminate\Support\Facades\Auth;

class TeamTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware(function ($request, $next) {
        //     $id = $request->route()->parameter('task');
        //     if(!is_null($id)){
        //         $userId = Task::findOrFail($id)->user_id;
        //         if($userId !== Auth::id()){
        //             abort(404);
        //         }
        //     }
        //     return $next($request);
        // });
    }

    public function index($id)
    {
        $team = Team::findOrFail($id);
        $tasks = $team->team_tasks;
        return view('team.task.index', compact('team', 'tasks'));
    }

    public function create($id)
    {
        $team = Team::findOrFail($id);
        return view('team.task.create', compact('team'));
    }

    public function store(PostRequest $request, $id)
    {
        TeamTask::create([
            'team_id' => $id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'explanation' => $request->explanation,
            'deadline' => $request->deadline,
            'progress' => $request->progress,
        ]);
        session()->flash('message', 'タスクが作成されました。');
        return redirect()->route('team_task.index', ['team' => $id]);
    }

    public function show($id)
    {
        $task = TeamTask::findOrFail($id);
        return view('team.task.show', compact('task'));
    }

    public function edit($id)
    {
        $task = TeamTask::findOrFail($id);
        return view('team.task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = TeamTask::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'explanation' => $request->explanation,
            'deadline' => $request->deadline,
            'progress' => $request->progress,
        ]);
        session()->flash('messge', '更新しました。');
        return redirect()->route('team_task.index', ['team' => $task->team->id]);
    }

    public function destroy($id)
    {
        $task = TeamTask::findOrFail($id);
        $task->delete();
        session()->flash('message', 'タスクを削除しました。');
        return redirect()->back();
    }
}
