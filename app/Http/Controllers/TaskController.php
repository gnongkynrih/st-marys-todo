<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); //select * from tasks
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }
    public function store(CreateTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect()->route('task.index');
    }
    public function edit(Task $task)
    {
        // $task = Task::find($id); //select * from task where id=$id
        return view('task.edit', compact('task'));
    }
    public function update(Task $task, CreateTaskRequest $request)
    {
        //  $task = Task::find($id); //select * from task where id=$id
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $task->completed = $request->completed == 'yes' ? 1 : 0;
        $task->save();
        return redirect()->route('task.index');
    }
}
