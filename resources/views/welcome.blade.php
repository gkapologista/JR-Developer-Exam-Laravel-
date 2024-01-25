@extends('layouts.app')

@section('content')
    <div class="welcome-container">
        <header class="welcome-header">
            <p>This platform offers a holistic solution for city and barangay administration, streamlining processes ranging from urban planning to local governance. Additionally, it incorporates an advanced patient management system, enhancing healthcare service efficiency and accessibility.</p>
        </header>

        <div class="welcome-links">
            <a href="{{ route('cities.create') }}">Cities Management</a>
            <a href="{{ route('barangays.create') }}">Barangays Management</a>
            <a href="{{ route('patients.create') }}">Patients Management</a>
            <a href="{{ route('reports.awareness') }}">Awareness Report</a>
            <a href="{{ route('reports.coronavirus') }}">Coronavirus Report</a>
            <a href="{{ route('patients.check_status_form') }}">Patient Check Status</a>
        </div>
    </div>
@endsection
