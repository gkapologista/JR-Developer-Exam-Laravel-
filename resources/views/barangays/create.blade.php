{{-- resources/views/barangays/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container"> 
        <!-- Create Barangay View -->
        <h1>Create Barangay</h1>

        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <!-- Display each error in a list item -->
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Form for creating a new barangay -->
        <form method="POST" action="{{ route('barangays.store') }}">
            @csrf
            <div class="barangay-form-group">
                <!-- Input for barangay name -->
                <label for="name" class="barangay-label">Name:</label>
                <input type="text" id="name" name="name" required class="barangay-input">
            </div>

            <div class="barangay-form-group">
                <!-- Dropdown for selecting city -->
                <label for="city_id" class="barangay-label">City:</label>
                <select id="city_id" name="city_id" class="barangay-select">
                    @foreach ($cities as $city)
                        <!-- Options for each city -->
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit button for the form -->
            <button type="submit" class="barangay-button">Save</button>
        </form>
    </div>
@endsection
