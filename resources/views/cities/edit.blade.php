{{-- resources/views/cities/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <!-- Section for Updating City Details -->
        <h1>Update City Details</h1>

        <!-- Form for Updating City -->
        <form method="POST" action="{{ route('cities.update', $city) }}">
            @csrf <!-- CSRF Token for Form Security -->
            @method('PUT') <!-- Specify the Method as PUT for Update Operation -->

            <!-- Form Group for City Name -->
            <div class="city-form-group">
                <label for="name" class="city-label">Name:</label>
                <!-- Label for City Name -->
                <input type="text" id="name" name="name" value="{{ $city->name }}" required class="city-input">
                <!-- Input Field for City Name with Existing Value -->
            </div>
            
            <button type="submit" class="city-button">Save</button>
            <!-- Submit Button for Saving the Updated City Details -->
        </form>
    </div>
@endsection
