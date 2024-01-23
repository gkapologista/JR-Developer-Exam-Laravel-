{{-- resources/views/barangays/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Barangay List</h1>
    <a href="{{ route('barangays.create') }}">Add New Barangay</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
        @foreach($barangays as $barangay)
            <tr>
                <td>{{ $barangay->id }}</td>
                <td>{{ $barangay->name }}</td>
                <td>{{ $barangay->city->name }}</td> <!-- Assuming a 'city' relationship -->
                <td>
                    <a href="{{ route('barangays.show', $barangay) }}">View</a>
                    <a href="{{ route('barangays.edit', $barangay) }}">Edit</a>
                    <form action="{{ route('barangays.destroy', $barangay) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
