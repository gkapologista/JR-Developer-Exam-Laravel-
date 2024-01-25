{{-- resources/views/patients/show.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="patient-container">
        <h1>Patient Details</h1> <!-- Display a heading for patient details -->
        <div class="patient-details">
            <p>ID: {{ $patient->id }}</p> <!-- Display the patient's ID -->
            <p>Name: {{ $patient->name }}</p> <!-- Display the patient's name -->
            <p>Barangay: {{ $patient->barangay->name }}</p> <!-- Display the patient's barangay name -->
            <p>Contact Number: {{ $patient->number }}</p> <!-- Display the patient's contact number -->
            <p>Email: {{ $patient->email }}</p> <!-- Display the patient's email -->
            <p>Case Type: {{ $patient->case_type }}</p> <!-- Display the patient's case type -->
            <p>Coronavirus Status: {{ $patient->coronavirus_status }}</p> <!-- Display the patient's coronavirus status -->
        </div>
        <a href="{{ route('patients.edit', $patient) }}" class="patient-action-link">Save</a> <!-- Display a link to edit the patient details -->
    </div>
@endsection <!-- End of content section -->
