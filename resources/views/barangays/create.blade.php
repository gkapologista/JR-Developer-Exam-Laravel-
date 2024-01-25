{{-- resources/views/barangays/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container"> <!-- CREATE VIEW -->
        <h1>Create Barangay</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('barangays.store') }}">
            @csrf
            <div class="barangay-form-group">
                <label for="name" class="barangay-label">Name:</label>
                <input type="text" id="name" name="name" required class="barangay-input">
            </div>

            <div class="barangay-form-group">
                <label for="city_id" class="barangay-label">City:</label>
                <select id="city_id" name="city_id" class="barangay-select">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="barangay-button">Save</button>
        </form>
    </div>
@endsection
