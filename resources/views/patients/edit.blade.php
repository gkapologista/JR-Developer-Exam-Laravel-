{{-- resources/views/patients/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Edit Patient</h1>
    <form method="POST" action="{{ route('patients.update', $patient) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $patient->name }}" required>

        <label for="brgy_id">Barangay:</label>
        <select id="brgy_id" name="brgy_id">
            @foreach ($barangays as $barangay)
                <option value="{{ $barangay->id }}" @if($barangay->id == $patient->brgy_id) selected @endif>{{ $barangay->name }}</option>
            @endforeach
        </select>

        <label for="number">Contact Number:</label>
        <input type="text" id="number" name="number" value="{{ $patient->number }}" required>

        <label for="email">Email (optional):</label>
        <input type="email" id="email" name="email" value="{{ $patient->email }}">

        <label for="case_type">Case Type:</label>
        <input type="text" id="case_type" name="case_type" value="{{ $patient->case_type }}" required>

        <label for="coronavirus_status">Coronavirus Status:</label>
        <input type="text" id="coronavirus_status" name="coronavirus_status" value="{{ $patient->coronavirus_status }}" required>

        <button type="submit">Update</button>
    </form>
@endsection
