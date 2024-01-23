{{-- resources/views/barangays/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Create Barangay</h1>
    <form method="POST" action="{{ route('barangays.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="city_id">City:</label>
        <select id="city_id" name="city_id">
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>
@endsection
