{{-- resources/views/patients/index.blade.php --}}

@extends('layouts.app')

@section('content')
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
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->barangay->name }}</td>
                    <td>{{ $patient->number }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->case_type }}</td>
                    <td>{{ $patient->coronavirus_status }}</td>
                    <td class="patient-table-action">
                        <a class="action-link" href="{{ route('patients.show', $patient) }}">View</a>
                        <a class="action-link" href="{{ route('patients.edit', $patient) }}">Edit</a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-link" style="border: none; background: none; font-family: 'Roboto', sans-serif; font-size: 16px; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
