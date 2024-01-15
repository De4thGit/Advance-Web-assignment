<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\business_units;
use App\Models\developers;

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
        $businessUnits = business_units::all(); 
        $developers = developers::all();
        return view('project.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bu_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'lead_developer_id' => 'sometimes|nullable|exists:developers,id',
            'platform' => 'required|string|max:50',
            'deployment_type' => 'required|string|max:50',
            'development_methodology' => 'required|string|max:255',
        ]);

        projects::create($validated);

        return redirect()->route('projects.index')->withSuccess('New project added successfully');
    }

    public function show(projects $project)
    {
        return view('project.show', compact('project'));
    }

    public function edit(projects $project)
    {
        $developers = developers::all();
        $businessUnits = business_units::all();
        return view('project.edit', compact('project','developers','businessUnits'));
    }

    public function update(Request $request, projects $project)
    {
        $validated = $request->validate([
            'bu_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'lead_developer_id' => 'sometimes|nullable|exists:developers,id',
            'platform' => 'required|string|max:50',
            'deployment_type' => 'required|string|max:50',
            'development_methodology' => 'required|string|max:255',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
            ->withSuccess('Project updated successfully');
    }

    public function destroy(projects $project)
    {
        $project->delete();
        
        return redirect()->route('projects.index')
            ->withSuccess('Project deleted successfully');
    }
}
