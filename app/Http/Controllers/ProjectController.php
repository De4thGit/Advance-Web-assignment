<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = projects::all();
        return view('project.index', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
            'lead_developer_id' => 'required|exists:developers,id',
            'platform' => 'required|string|max:50',
            'deployment_type' => 'required|string|max:50',
            'development_methodology' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        projects::create($validated);

        return redirect()->route('project.index')
            ->withSuccess('New project added successfully');
    }

    public function show(projects $project)
    {
        return view('project.show', compact('project'));
    }

    public function edit(projects $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, projects $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
            'lead_developer_id' => 'required|exists:developers,id',
            'platform' => 'required|string|max:50',
            'deployment_type' => 'required|string|max:50',
            'development_methodology' => 'required|string|max:255',
        ]);

        

        $project->update($validated);

        return redirect()->route('project.index')
            ->withSuccess('Project updated successfully');
    }

    public function destroy(projects $project)
    {
        $project->delete();
        
        return redirect()->route('project.index')
            ->withSuccess('Project deleted successfully');
    }
}
