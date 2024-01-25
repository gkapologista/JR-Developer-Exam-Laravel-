{{-- resources/views/cities/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <!-- Form to Create/Add a New City -->
        <h1>Create / Add City</h1>

        <!-- Display Validation Errors if Any -->
        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- Display each error -->
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- City Creation Form -->
        <form method="POST" action="{{ route('cities.store') }}">
            @csrf <!-- CSRF Token for Form Security -->

            <div class="city-form-group">
                <label for="name" class="city-label">Name:</label>
                <input type="text" id="name" name="name" required class="city-input">
                <!-- Input field for city name -->
            </div>
            
            <button type="submit" class="city-button">Save</button>
            <!-- Submit Button to Save the New City -->
        </form>
    </div>
@endsection
