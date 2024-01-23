{{-- resources/views/patients/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Patient List</h1>
    <a href="{{ route('patients.create') }}">Add New Patient</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Barangay</th>
            <th>Actions</th>
        </tr>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->barangay->name }}</td> <!-- Assuming a 'barangay' relationship -->
                <td>
                    <a href="{{ route('patients.show', $patient) }}">View</a>
                    <a href="{{ route('patients.edit', $patient) }}">Edit</a>
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
