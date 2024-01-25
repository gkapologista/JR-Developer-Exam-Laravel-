{{-- resources/views/barangays/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container"> <!-- DELETE & VIEW TABLE -->
        <h1>Delete & View Barangays</h1>
        <table class="barangay-table">
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
                    <td>{{ $barangay->city->name }}</td>
                    <td class="barangay-table-action">
                        <a class="action-link" href="{{ route('barangays.show', $barangay) }}">View</a> |
                        <a class="action-link" href="{{ route('barangays.edit', $barangay) }}">Edit</a> |
                        <form action="{{ route('barangays.destroy', $barangay) }}" method="POST" style="display:inline;">
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

