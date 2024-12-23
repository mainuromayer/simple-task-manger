<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $status = $request->get('status');
        $project_id = $request->get('project');
        $tasks = Task::with('project');

        $tasks = $tasks->when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })->when($project_id, function ($query) use ($project_id) {
            return $query->where('project_id', $project_id);
        });
    
        $tasks = $tasks->get();

        return view('task.index', compact('tasks', 'projects'));
    }
    
    


    public function search(Request $request)
    {
        $search = $request->search;
        $tasks = Task::where('task_name', 'like', "%$search%")->get();
        return view('task.index', compact('tasks'));

    }

    public function create()
    {
        $projects = Project::all();
        return view('task.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'project' => 'required|exists:projects,id',
            'description' => 'required',
            'status' => 'required|in:pending,working,done',
        ]);

        $task = Task::create([
            'task_name' => $request->task_name,
            'project_id' => $request->project,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('task')->with('success', 'Task created successfully');
    }

    public function edit(Request $request)
    {
        $task = Task::find($request->id);

        $projects = Project::all();
        // dd($task->project->name);
        return view('task.edit', compact('task', 'projects'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'task_name' => 'required',
            'project' => 'required|exists:projects,id',
            'description' => 'required',
            'status' => 'required|in:pending,working,done',
        ]);

        $task = Task::find($id);
        
        $task->update([
            'task_name' => $request->task_name,
            'project_id' => $request->project,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('task')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('task')->with('success', 'Task deleted successfully');
    }
}
