{{-- resources/views/patients/create.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="patient-container">
        <h1>Create / Add Patient</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Patient Creation Form -->
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf <!-- CSRF protection -->
            <div class="patient-form-group">
                <label for="name" class="patient-label">Name:</label>
                <input type="text" id="name" name="name" required class="patient-input">

                <label for="brgy_id" class="patient-label">Barangay:</label>
                <select id="brgy_id" name="brgy_id" class="patient-select">
                    @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                    @endforeach
                </select>

                <label for="number" class="patient-label">Contact Number:</label>
                <input type="text" id="number" name="number" required class="patient-input">

                <label for="email" class="patient-label">Email (optional):</label>
                <input type="email" id="email" name="email" class="patient-input">

                <label for="case_type" class="patient-label">Case Type:</label>
                <select id="case_type" name="case_type" class="patient-select" required>
                    <option value="PUI">PUI</option>
                    <option value="PUM">PUM</option>
                    <option value="Positive">Positive on Covid</option>
                    <option value="Negative">Negative on Covid</option>
                </select>

                <label for="coronavirus_status" class="patient-label">Coronavirus Status:</label>
                <select id="coronavirus_status" name="coronavirus_status" class="patient-select" required>
                    <option value="active">Active</option>
                    <option value="recovered">Recovered</option>
                    <option value="death">Death</option>
                </select>
            </div>

            <button type="submit" class="patient-button">Save</button>
        </form>
    </div>
@endsection <!-- End of content section -->
