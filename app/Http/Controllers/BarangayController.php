<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = Barangay::with('city')->get(); // Fetch all barangays with their associated city
        return view('barangays.index', compact('barangays'));
    }

    public function create()
    {
        $cities = City::all(); // Fetch all cities for the dropdown
        return view('barangays.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city_id' => 'required|exists:cities,id' // Ensure the city exists
        ]);

        Barangay::create($validatedData);
        return redirect()->route('barangays.index')->with('success', 'Barangay created successfully.');
    }

    public function show(Barangay $barangay)
    {
        return view('barangays.show', compact('barangay'));
    }

    public function edit(Barangay $barangay)
    {
        $cities = City::all(); // Fetch all cities for the dropdown
        return view('barangays.edit', compact('barangay', 'cities'));
    }

    public function update(Request $request, Barangay $barangay)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city_id' => 'required|exists:cities,id'
        ]);

        $barangay->update($validatedData);
        return redirect()->route('barangays.index')->with('success', 'Barangay updated successfully.');
    }

    public function destroy(Barangay $barangay)
    {
        $barangay->delete();
        return redirect()->route('barangays.index')->with('success', 'Barangay deleted successfully.');
    }
}
