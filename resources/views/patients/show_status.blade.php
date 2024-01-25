{{-- resources/views/patients/show_status.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="status-container">
        @if($patient)
            <h1>Status for {{ $patient->name }}</h1>
            <div class="status-detail">
                <p><strong>Case Type:</strong> {{ $patient->case_type }}</p>
                <p><strong>Coronavirus Status:</strong> {{ $patient->coronavirus_status }}</p>
            </div>
        @else
            <p class="status-not-found">Patient not found.</p>
        @endif
    </div>
@endsection