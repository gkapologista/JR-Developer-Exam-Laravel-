<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of cities.
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
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
            'name' => 'required|max:255|unique:cities,name'
        ]);

        $city = City::create($validatedData);

        // Redirect to the 'show' route of the newly created city
        return redirect()->route('cities.show', $city)->with('success', 'City created successfully.');
    }

    /**
     * Display the specified city.
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
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
            'name' => 'required|max:255|unique:cities,name,' . $city->id
        ]);

        $city->update($validatedData);

        // Redirect to the 'index' route after update
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
