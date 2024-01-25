@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="welcome-container">
        <header class="welcome-header">
            <p>This platform offers a holistic solution for city and barangay administration, streamlining processes ranging from urban planning to local governance. Additionally, it incorporates an advanced patient management system, enhancing healthcare service efficiency and accessibility.</p>
        </header>

        <div class="welcome-links">
            <a href="{{ route('cities.create') }}">Cities Management</a> <!-- Display a link for managing cities and link to 'cities.create' route -->
            <a href="{{ route('barangays.create') }}">Barangays Management</a> <!-- Display a link for managing barangays and link to 'barangays.create' route -->
            <a href="{{ route('patients.create') }}">Patients Management</a> <!-- Display a link for managing patients and link to 'patients.create' route -->
            <a href="{{ route('reports.awareness') }}">Awareness Report</a> <!-- Display a link to generate an awareness report and link to 'reports.awareness' route -->
            <a href="{{ route('reports.coronavirus') }}">Coronavirus Report</a> <!-- Display a link to generate a coronavirus report and link to 'reports.coronavirus' route -->
            <a href="{{ route('patients.check_status_form') }}">Patient Check Status</a> <!-- Display a link to check patient status and link to 'patients.check_status_form' route -->
        </div>
    </div>
@endsection <!-- End of content section -->
