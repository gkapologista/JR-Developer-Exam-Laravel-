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

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
