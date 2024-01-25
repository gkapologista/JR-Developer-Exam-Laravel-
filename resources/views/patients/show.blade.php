{{-- resources/views/patients/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="patient-container">
        <h1>Patient Details</h1>
        <div class="patient-details">
            <p>ID: {{ $patient->id }}</p>
            <p>Name: {{ $patient->name }}</p>
            <p>Barangay: {{ $patient->barangay->name }}</p>
            <p>Contact Number: {{ $patient->number }}</p>
            <p>Email: {{ $patient->email }}</p>
            <p>Case Type: {{ $patient->case_type }}</p>
            <p>Coronavirus Status: {{ $patient->coronavirus_status }}</p>
        </div>
        <a href="{{ route('patients.edit', $patient) }}" class="patient-action-link">Save</a>
    </div>
@endsection
