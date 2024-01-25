<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    // Display a list of barangays along with their associated city
    public function index()
    {
        $barangays = Barangay::with('city')->get();
        return view('barangays.index', compact('barangays'));
    }

    // Show form for creating a new barangay with a list of cities
    public function create()
    {
        $cities = City::all();
        return view('barangays.create', compact('cities'));
    }

    // Store a new barangay in the database with unique name validation per city
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:barangays,name,NULL,id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id'
        ]);

        $barangay = Barangay::create($validatedData);
        return redirect()->route('barangays.show', $barangay)->with('success', 'Barangay created successfully.');
    }

    // Display details of a specific barangay
    public function show(Barangay $barangay)
    {
        return view('barangays.show', compact('barangay'));
    }

    // Show form for editing a specific barangay with a list of cities
    public function edit(Barangay $barangay)
    {
        $cities = City::all();
        return view('barangays.edit', compact('barangay', 'cities'));
    }

    // Update a specific barangay in the database with unique name validation
    public function update(Request $request, Barangay $barangay)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:barangays,name,' . $barangay->id . ',id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id'
        ]);

        $barangay->update($validatedData);
        return redirect()->route('barangays.index')->with('success', 'Barangay updated successfully.');
    }

    // Remove a specific barangay from the database
    public function destroy(Barangay $barangay)
    {
        $barangay->delete();
        return redirect()->route('barangays.index')->with('success', 'Barangay deleted successfully.');
    }
}
