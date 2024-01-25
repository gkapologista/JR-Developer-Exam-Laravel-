{{-- resources/views/patients/index.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="patient-container">
        <h1>Patient List</h1>
        <table class="patient-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Barangay</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Case Type</th>
                <th>Coronavirus Status</th>
                <th>Actions</th>
            </tr>
            @foreach($patients as $patient) <!-- Loop through the list of patients -->
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->barangay->name }}</td>
                    <td>{{ $patient->number }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->case_type }}</td>
                    <td>{{ $patient->coronavirus_status }}</td>
                    <td class="patient-table-action">
                        <a class="action-link" href="{{ route('patients.show', $patient) }}">View</a> <!-- Link to view patient details -->
                        <a class="action-link" href="{{ route('patients.edit', $patient) }}">Edit</a> <!-- Link to edit patient details -->
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf <!-- CSRF protection -->
                            @method('DELETE') <!-- Set the HTTP method to DELETE for deleting -->
                            <button type="submit" class="action-link" style="border: none; background: none; font-family: 'Roboto', sans-serif; font-size: 16px; cursor:pointer;">Delete</button> <!-- Button to delete patient -->
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection <!-- End of content section -->
