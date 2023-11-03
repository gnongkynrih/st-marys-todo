<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect()->route('task.index');
    }
}
