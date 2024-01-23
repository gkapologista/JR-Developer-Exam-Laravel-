{{-- resources/views/patients/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Create Patient</h1>
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="brgy_id">Barangay:</label>
        <select id="brgy_id" name="brgy_id">
            @foreach ($barangays as $barangay)
                <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
            @endforeach
        </select>

        <label for="number">Contact Number:</label>
        <input type="text" id="number" name="number" required>

        <label for="email">Email (optional):</label>
        <input type="email" id="email" name="email">

        <label for="case_type">Case Type:</label>
        <input type="text" id="case_type" name="case_type" required>

        <label for="coronavirus_status">Coronavirus Status:</label>
        <input type="text" id="coronavirus_status" name="coronavirus_status" required>

        <button type="submit">Submit</button>
    </form>
@endsection
