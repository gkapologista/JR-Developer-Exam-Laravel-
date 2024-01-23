{{-- resources/views/barangays/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Edit Barangay</h1>
    <form method="POST" action="{{ route('barangays.update', $barangay) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $barangay->name }}" required>

        <label for="city_id">City:</label>
        <select id="city_id" name="city_id">
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @if($city->id == $barangay->city_id) selected @endif>{{ $city->name }}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
