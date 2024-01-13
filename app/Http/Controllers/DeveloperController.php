<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\developers;
use App\Models\projects;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = developers::all();
        return view('Developer.index', compact('developers'));
    }

    
    public function create()
    {
        return view('Developer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'StaffID' => 'required|string|max:255',
            'project_id' => 'nullable|integer'
        ]);

        developers::create($validated);

        return redirect()->route('developers.index')->withSuccess('Developer created successfully');
    }

    public function show(developers $developer)
    {
        return view('Developer.show', compact('developer'));
    }

    public function edit(developers $developer)
    {
        $projects = projects::all();
        return view('Developer.edit', compact('developer','projects'));
    }

    public function update(Request $request, developers $developer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'StaffID' => 'required|string|max:255',
            'project_id' => 'nullable|integer'
        ]);

        $developer->update($validated);

        return redirect()->route('developers.index')->withSuccess('Developer updated successfully');
    }

    public function destroy(developers $developer)
    {
        $developer->delete();
        return redirect()->route('developers.index')->withSuccess('Developer deleted successfully');
    }
}
