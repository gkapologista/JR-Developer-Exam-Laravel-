<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Barangay;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('barangay')->get(); // Fetch all patients with their barangay
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $barangays = Barangay::all(); // Fetch all barangays for the dropdown
        return view('patients.create', compact('barangays'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'brgy_id' => 'required|exists:barangays,id', // Ensure the barangay exists
            'number' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'case_type' => 'required|max:255',
            'coronavirus_status' => 'required|max:255'
        ]);

        Patient::create($validatedData);
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $barangays = Barangay::all(); // Fetch all barangays for the dropdown
        return view('patients.edit', compact('patient', 'barangays'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'brgy_id' => 'required|exists:barangays,id',
            'number' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'case_type' => 'required|max:255',
            'coronavirus_status' => 'required|max:255'
        ]);

        $patient->update($validatedData);
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
