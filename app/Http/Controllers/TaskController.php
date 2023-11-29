<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            //select * from task where name like "%string%"
            $tasks = Task::where('name','like','%'.$request->search.'%')->paginate(2);
        }else{
            $tasks = Task::paginate(2); //select * from tasks
        }
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

    public function updateCompeted(Task $task){
        try{
            // $task = Task::find($id); //select * from tasks where id = $id
            // if(!$task){
            //     return response()->json([
            //         'status' => 'not found'
            //     ],404);
            // }
            $task->completed = !$task->completed;
            $task->save();
            return response()->json([
                'status' => 'updated'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error'
            ],500);
        }
    }
    public function destroy(Task $task)
    {
        // $task = Task::find($id); //select * from task where id=$id
        $task->delete();
        return response()->json([
                'status' => 'deleted'
            ],200);
    }
}
