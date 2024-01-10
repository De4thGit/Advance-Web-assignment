<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\business_units;


class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessUnits = business_units::all();
        return view('BusinessUnit.index', compact('businessUnits'));
    }

    public function create()
    {
        return view('BusinessUnits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'BuID' => 'required|string|max:255'
        ]);
        
        business_units::create($validated);

        return redirect()->route('BusinessUnit.index')
            ->withSuccess('New business unit added successfully');
    }

    public function show(business_units $businessUnit)
    {
        return view('BusinessUnit.show', compact('businessUnit'));
    }

    public function edit(business_units $businessUnit)
    {
        return view('BusinessUnit.edit', compact('businessUnit'));
    }

    public function update(Request $request, business_units $businessUnit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'BuID' => 'required|string|max:255'
        ]);

        $businessUnit->update($validated);

        return redirect()->route('BusinessUnit.index')
            ->withSuccess('Business unit updated successfully');
    }

    public function destroy(business_units $businessUnit)
    {
        $businessUnit->delete();
        
        return redirect()->route('BusinessUnit.index')
            ->withSuccess('Business unit deleted successfully');
    }
}
