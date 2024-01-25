<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // Display a list of all cities
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    // Show form for creating a new city
    public function create()
    {
        return view('cities.create');
    }

    // Store a new city in the database with unique name validation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:cities,name'
        ]);

        $city = City::create($validatedData);
        return redirect()->route('cities.show', $city)->with('success', 'City created successfully.');
    }

    // Display details of a specific city
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    // Show form for editing a specific city
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    // Update a specific city in the database with unique name validation
    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:cities,name,' . $city->id
        ]);

        $city->update($validatedData);
        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    // Remove a specific city from the database
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
