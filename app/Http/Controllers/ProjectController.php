<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
    
        // Search by name or project_code
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('project_code', 'like', "%$search%");
            });
        }
    
        // Get filtered projects
        $projects = $query->get();
    
        return view('project.index', compact('projects'));
    }
    

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_code' => 'required|unique:projects,project_code',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'project_code' => $request->project_code
        ]);

        return redirect()->route('project')->with('success', 'Project created successfully');
    }

    public function edit(Request $request)
    {
        $project = Project::find($request->id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'project_code' => 'nullable',
        ]);

        $project = Project::find($id);
        
        $project->update([
            'name' => $request->name,
        ]);

        return redirect()->route('project')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('project')->with('success', 'Project deleted successfully');
    }
}
