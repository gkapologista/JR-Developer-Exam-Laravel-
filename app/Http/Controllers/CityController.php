<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of cities.
     */
    public function index()
    {
        $cities = City::all(); // Fetch all cities from the database
        return view('cities.index', compact('cities')); // Pass cities data to the view
    }

    /**
     * Show the form for creating a new city.
     */
    public function create()
    {
        return view('cities.create'); // Return the view to create a new city
    }

    /**
     * Store a newly created city in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:cities|max:255' // Validate the name
        ]);

        City::create($validatedData); // Create a new city in the database
        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    /**
     * Display the specified city.
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city')); // Return the view to show a specific city
    }

    /**
     * Show the form for editing the specified city.
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city')); // Return the view to edit a city
    }

    /**
     * Update the specified city in the database.
     */
    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:cities,name,' . $city->id . '|max:255' // Validate the name
        ]);

        $city->update($validatedData); // Update the city in the database
        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified city from the database.
     */
    public function destroy(City $city)
    {
        $city->delete(); // Delete the city
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
