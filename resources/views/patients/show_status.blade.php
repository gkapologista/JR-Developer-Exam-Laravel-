{{-- resources/views/patients/show_status.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="status-container">
        @if($patient) <!-- Check if the $patient variable is defined -->
            <h1>Status for {{ $patient->name }}</h1> <!-- Display the patient's name -->
            <div class="status-detail">
                <p><strong>Case Type:</strong> {{ $patient->case_type }}</p> <!-- Display the patient's case type -->
                <p><strong>Coronavirus Status:</strong> {{ $patient->coronavirus_status }}</p> <!-- Display the patient's coronavirus status -->
            </div>
        @else
            <p class="status-not-found">Patient not found.</p> <!-- Display a message if the patient is not found -->
        @endif
    </div>
@endsection <!-- End of content section -->
