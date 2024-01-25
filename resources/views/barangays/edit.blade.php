{{-- resources/views/barangays/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container"> <!-- UPDATE VIEW -->
        <h1>Update Barangay</h1>

        <form method="POST" action="{{ route('barangays.update', $barangay) }}">
            @csrf
            @method('PUT')

            <div class="barangay-form-group">
                <label for="name" class="barangay-label">Name:</label>
                <input type="text" id="name" name="name" value="{{ $barangay->name }}" required class="barangay-input">
            </div>

            <div class="barangay-form-group">
                <label for="city_id" class="barangay-label">City:</label>
                <select id="city_id" name="city_id" class="barangay-select">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if($city->id == $barangay->city_id) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="barangay-button">Save</button>
        </form>
    </div>
@endsection