{{-- resources/views/cities/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <h1>Update City Details</h1>
        <form method="POST" action="{{ route('cities.update', $city) }}">
            @csrf
            @method('PUT')

            <div class="city-form-group">
                <label for="name" class="city-label">Name:</label>
                <input type="text" id="name" name="name" value="{{ $city->name }}" required class= "city-input">
            </div>
            
            <button type="submit" class="city-button">Save</button>
        </form>
    </div>
@endsection
