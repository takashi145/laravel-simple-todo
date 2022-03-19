<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\PostRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(PostRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'explanation' => $request->explanation,
            'deadline' => $request->deadline,
            'progress' => $request->progress,
        ]);

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
        return redirect()->route('task.index');
    }

    public function destroy($id)
    {
        
    }
}
