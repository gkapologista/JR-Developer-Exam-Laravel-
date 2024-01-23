{{-- resources/views/patients/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Patient Details</h1>
    <p>ID: {{ $patient->id }}</p>
    <p>Name: {{ $patient->name }}</p>
    <p>Barangay: {{ $patient->barangay->name }}</p>
    <p>Contact Number: {{ $patient->number }}</p>
    <p>Email: {{ $patient->email }}</p>
    <p>Case Type: {{ $patient->case_type }}</p>
    <p>Coronavirus Status: {{ $patient->coronavirus_status }}</p>

    <a href="{{ route('patients.index') }}">Back to List</a>
    <a href="{{ route('patients.edit', $patient) }}">Edit Patient</a>
@endsection
