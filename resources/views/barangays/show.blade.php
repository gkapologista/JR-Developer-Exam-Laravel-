{{-- resources/views/barangays/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container">
        <!-- Detail View of a Specific Barangay -->
        <h1>Read Barangay Details</h1>
        
        <!-- Displaying the Details of the Barangay -->
        <div class="barangay-details">
            <p>ID: {{ $barangay->id }}</p> <!-- Displays the ID of the barangay -->
            <p>Name: {{ $barangay->name }}</p> <!-- Displays the Name of the barangay -->
            <p>City: {{ $barangay->city->name }}</p> <!-- Displays the Name of the City associated with the barangay -->
        </div>
        
        <!-- Link to Edit the Barangay -->
        <a href="{{ route('barangays.edit', $barangay) }}" class="barangay-action-link">Edit</a>
    </div>
@endsection
