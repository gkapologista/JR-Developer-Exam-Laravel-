{{-- resources/views/cities/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <!-- Section for Reading City Details -->
        <h1>Read City Details</h1>

        <!-- Container for Displaying City Details -->
        <div class="city-details">
            <p>ID: {{ $city->id }}</p> <!-- Display City ID -->
            <p>Name: {{ $city->name }}</p> <!-- Display City Name -->
        </div>
        
        <!-- Link to Edit City -->
        <a href="{{ route('cities.edit', $city) }}" class="city-action-link">Save</a>
        <!-- 'Save' link here might be intended for 'Edit'. Typically, 'Save' is used in forms. -->
    </div> 
@endsection
