{{-- resources/views/barangays/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="barangay-container">
        <!-- Barangay List View -->
        <h1>Delete & View Barangays</h1>
        <table class="barangay-table">
            <!-- Table headers -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
            @foreach($barangays as $barangay)
                <!-- Table rows for each barangay -->
                <tr>
                    <td>{{ $barangay->id }}</td>
                    <td>{{ $barangay->name }}</td>
                    <td>{{ $barangay->city->name }}</td>
                    <td class="barangay-table-action">
                        <!-- View Link -->
                        <a class="action-link" href="{{ route('barangays.show', $barangay) }}">View</a> |
                        <!-- Edit Link -->
                        <a class="action-link" href="{{ route('barangays.edit', $barangay) }}">Edit</a> |
                        <!-- Delete Form -->
                        <form action="{{ route('barangays.destroy', $barangay) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <!-- Delete Button -->
                            <button type="submit" class="action-link" style="border: none; background: none; font-family: 'Roboto', sans-serif; font-size: 16px; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
