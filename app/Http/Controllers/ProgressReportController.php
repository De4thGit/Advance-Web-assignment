<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\progress_reports;

class ProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progressReports = progress_reports::all();
        return view('ProgressReport.index', compact('progressReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ProgressReport.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'date_of_progress' => 'required|date',
            'progress_status' => 'required|string|max:255',
            'progress_description' => 'required|string'
        ]);

        progress_reports::create($validated);

        return redirect()->route('ProgressReport.index')
            ->withSuccess('New progress report added successfully');
    }

    public function show(progress_reports $progressReport)
    {
        return view('ProgressReport.show', compact('progressReport'));
    }

    public function edit(progress_reports $progressReport)
    {
        return view('ProgressReport.edit', compact('progressReport'));
    }

    public function update(Request $request, progress_reports $progressReport)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'date_of_progress' => 'required|date',
            'progress_status' => 'required|string|max:255',
            'progress_description' => 'required|string'
        ]);

        $progressReport->update($validated);

        return redirect()->route('progress_reports.index')
            ->withSuccess('Progress report updated successfully');
    }

    public function destroy(progress_reports $progressReport)
    {
        $progressReport->delete();
        
        return redirect()->route('ProgressReport.index')
            ->withSuccess('Progress report deleted successfully');
    }
}
