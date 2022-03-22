<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('task');
            if(!is_null($id)){
                $userId = Task::findOrFail($id)->user_id;
                if($userId !== Auth::id()){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(PostRequest $request)
    {
        Task::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'explanation' => $request->explanation,
            'deadline' => $request->deadline,
            'progress' => $request->progress,
        ]);
        session()->flash('message', 'タスクを作成されました。');
        return redirect()->route('task.index');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('task.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'explanation' => $request->explanation,
            'deadline' => $request->deadline,
            'progress' => $request->progress,
        ]);
        session()->flash('message', '更新されました。');
        return redirect()->route('task.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'タスクが削除されました。');
        return redirect()->route('task.index');
    }
}
