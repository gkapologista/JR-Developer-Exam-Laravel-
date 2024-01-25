{{-- resources/views/patients/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="patient-container">
        <h1>Update Patient Details</h1>
        <form method="POST" action="{{ route('patients.update', $patient) }}">
            @csrf
            <div class="patient-form-group">
                @method('PUT')
                <label for="name" class="patient-label">Name:</label>
                <input type="text" id="name" name="name" value="{{ $patient->name }}" required class="patient-input">

                <label for="brgy_id" class="patient-label">Barangay:</label>
                <select id="brgy_id" name="brgy_id" class="patient-select">
                    @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->id }}" @if($barangay->id == $patient->brgy_id) selected @endif>{{ $barangay->name }}</option>
                    @endforeach
                </select>

                <label for="number" class="patient-label">Contact Number:</label>
                <input type="text" id="number" name="number" value="{{ $patient->number }}" required class="patient-input">

                <label for="email" class="patient-label">Email (optional):</label>
                <input type="email" id="email" name="email" value="{{ $patient->email }}" class="patient-input">

                <label for="case_type" class="patient-label">Case Type:</label>
                <select id="case_type" name="case_type" class="patient-select" value="{{ $patient->case_type }}" required>
                    <option value="PUI">PUI</option>
                    <option value="PUM">PUM</option>
                    <option value="Positive">Positive on Covid</option>
                    <option value="Negative">Negative on Covid</option>
                </select>

                <label for="coronavirus_status" class="patient-label">Coronavirus Status:</label>
                <select id="coronavirus_status" name="coronavirus_status" class="patient-select" value="{{ $patient->coronavirus_status }}" required>
                    <option value="active">Active</option>
                    <option value="recovered">Recovered</option>
                    <option value="death">Death</option>
                </select>
            </div>

            <button type="submit" class="patient-button">Save</button>
        </form>
    </div>
@endsection
