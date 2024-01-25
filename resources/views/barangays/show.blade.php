{{-- resources/views/barangays/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container"> <!-- READ VIEW -->
        <h1>Read Barangay Details</h1>
        <div class="barangay-details">
            <p>ID: {{ $barangay->id }}</p>
            <p>Name: {{ $barangay->name }}</p>
            <p>City: {{ $barangay->city->name }}</p>
        </div>
        
        <a href="{{ route('barangays.edit', $barangay) }}" class="barangay-action-link">Save</a>
    </div>
@endsection
