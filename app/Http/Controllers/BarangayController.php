<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    /**
     * Display a listing of all barangays.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangays = Barangay::with('city')->get(); // Fetch all barangays with their associated city
        return view('barangays.index', compact('barangays'));
    }

    /**
     * Show the form for creating a new barangay.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all(); // Fetch all cities for the dropdown in the create form
        return view('barangays.create', compact('cities'));
    }

    /**
     * Store a newly created barangay in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:barangays,name,NULL,id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id'
        ]);

        $barangay = Barangay::create($validatedData); // Create a new barangay with validated data
        return redirect()->route('barangays.show', $barangay)->with('success', 'Barangay created successfully.');
    }

    /**
     * Display the specified barangay.
     *
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function show(Barangay $barangay)
    {
        return view('barangays.show', compact('barangay')); // Show details of a specific barangay
    }

    /**
     * Show the form for editing the specified barangay.
     *
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangay $barangay)
    {
        $cities = City::all(); // Fetch all cities for the dropdown in the edit form
        return view('barangays.edit', compact('barangay', 'cities'));
    }

    /**
     * Update the specified barangay in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangay $barangay)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:barangays,name,' . $barangay->id . ',id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id'
        ]);

        $barangay->update($validatedData); // Update barangay with new data
        return redirect()->route('barangays.index')->with('success', 'Barangay updated successfully.');
    }

    /**
     * Remove the specified barangay from the database.
     *
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barangay $barangay)
    {
        $barangay->delete(); // Delete the barangay
        return redirect()->route('barangays.index')->with('success', 'Barangay deleted successfully.');
    }
}
