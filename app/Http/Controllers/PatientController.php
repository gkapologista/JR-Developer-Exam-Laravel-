<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Barangay;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display all patients with their barangays
    public function index()
    {
        $patients = Patient::with('barangay')->get();
        return view('patients.index', compact('patients'));
    }

    // Show form to create a new patient
    public function create()
    {
        $barangays = Barangay::all(); // Get all barangays for dropdown
        return view('patients.create', compact('barangays'));
    }

    // Save new patient
    public function store(Request $request)
    {
        // Validate and ensure unique name within the same barangay and contact number
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:patients,name,NULL,id,brgy_id,' . $request->brgy_id . ',number,' . $request->number,
            'brgy_id' => 'required|exists:barangays,id',
            'number' => 'required|max:255',
            'email' => 'nullable|email|max:255|unique:patients,email',
            'case_type' => 'required|max:255',
            'coronavirus_status' => 'required|max:255'
        ]);

        $patient = Patient::create($validatedData);
        return redirect()->route('patients.show', $patient)->with('success', 'Patient created successfully.');
    }

    // Display a specific patient
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // Show form to edit a patient
    public function edit(Patient $patient)
    {
        $barangays = Barangay::all(); // Get all barangays for dropdown
        return view('patients.edit', compact('patient', 'barangays'));
    }

    // Update patient information
    public function update(Request $request, Patient $patient)
    {
        // Validate and ensure unique name within the same barangay and contact number
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:patients,name,' . $patient->id . ',id,brgy_id,' . $request->brgy_id . ',number,' . $request->number,
            'brgy_id' => 'required|exists:barangays,id',
            'number' => 'required|max:255',
            'email' => 'nullable|email|max:255|unique:patients,email,' . $patient->id,
            'case_type' => 'required|max:255',
            'coronavirus_status' => 'required|max:255'
        ]);

        $patient->update($validatedData);
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    // Show form for checking patient status
    public function checkStatusForm()
    {
        return view('patients.check_status_form');
    }

    // Process check status form
    public function checkStatus(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required|max:255',
        ]);

        $patient = Patient::where('number', $validatedData['number'])->first();

        if (!$patient) {
            return redirect()->back()->withErrors(['number' => 'Patient with this contact number does not exist.']);
        }

        return view('patients.show_status', ['patient' => $patient]);
    }
}
