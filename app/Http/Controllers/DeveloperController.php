<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\developers;

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
            'project_id' => 'required|integer'
        ]);

        developers::create($validated);

        return redirect()->route('Developer.index')->withSuccess('Developer created successfully');
    }

    public function show(developers $developer)
    {
        return view('Developer.show', compact('developer'));
    }

    public function edit(developers $developer)
    {
        return view('Developer.edit', compact('developer'));
    }

    public function update(Request $request, developers $developer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'StaffID' => 'required|string|max:255',
            'project_id' => 'required|integer'
        ]);

        $developer->update($validated);

        return redirect()->route('Developer.index')->withSuccess('Developer updated successfully');
    }

    public function destroy(developers $developer)
    {
        $developer->delete();
        return redirect()->route('Developer.index')->withSuccess('Developer deleted successfully');
    }
}
