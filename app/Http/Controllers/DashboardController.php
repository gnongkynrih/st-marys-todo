<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $completedTasksCount = Task::where('completed', true)->count();
        $notCompletedTasksCount = Task::where('completed', false)->count();

        
        $tasks = Task::select(
        DB::raw('YEAR(due_date) as year'), 
        DB::raw('MONTH(due_date) as month'),
        DB::raw('COUNT(*) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        
        // $label = array();
        // foreach ($tasks as $task) {
        //     $label[] = $task->year . '-' . sprintf("%02d", $task->month); // Formats the month with leading zeros
        // }

        $labels = $tasks->map(function ($item) {
            return $item->year . '-' . sprintf("%02d", $item->month); // Formats the month with leading zeros
        });

        $dataPoints = $tasks->pluck('total'); //get only the total column


        return view('dashboard.index',compact('completedTasksCount','notCompletedTasksCount','labels','dataPoints'));
    }
}
