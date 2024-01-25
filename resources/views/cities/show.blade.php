{{-- resources/views/cities/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <h1>Read City Details</h1>
        <div class="city-details">
            <p>ID: {{ $city->id }}</p>
            <p>Name: {{ $city->name }}</p>
        </div>
        
        <a href="{{ route('cities.edit', $city) }}" class="city-action-link">Save</a>
    </div> 
@endsection
