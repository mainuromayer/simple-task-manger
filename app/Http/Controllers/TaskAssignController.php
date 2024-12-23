<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskAssignController extends Controller
{

public function index(){
    $taskAssign = TaskAssign::with('user', 'task')->get();
    return view('task_assign.index', compact('taskAssign'));
}



    public function create()
    {
        $teammate = User::where('role', 'teammate')->get();
        $task = Task::all();
    
        return view('task_assign.create', compact('teammate', 'task'));
    }
    


    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
        ]);

        $taskAssign = TaskAssign::create([
            'user_id' => $request->user_id,
            'task_id' => $request->task_id,
        ]);

        return redirect()->route('task_assign')->with('success', 'Task assigned successfully');
    }

    
}
