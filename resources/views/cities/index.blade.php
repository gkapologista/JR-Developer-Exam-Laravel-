{{-- resources/views/cities/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <!-- Section for Viewing and Deleting Cities -->
        <h1>Delete & View Cities</h1>

        <!-- Table for Listing Cities -->
        <table class="city-table">
            <!-- Table Header -->
            <tr>
                <th>ID</th> <!-- Column for City ID -->
                <th>Name</th> <!-- Column for City Name -->
                <th>Actions</th> <!-- Column for Actions (View, Edit, Delete) -->
            </tr>
            
            <!-- Loop Through Each City for Display -->
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td> <!-- Display City ID -->
                    <td>{{ $city->name }}</td> <!-- Display City Name -->
                    <td class="city-table-action">
                        <!-- Links for View and Edit -->
                        <a class="action-link" href="{{ route('cities.show', $city) }}">View</a>
                        <a class="action-link" href="{{ route('cities.edit', $city) }}">Edit</a>

                        <!-- Form for Deleting a City -->
                        <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
                            @csrf <!-- CSRF Token for Form Security -->
                            @method('DELETE') <!-- Specify the Method as DELETE for Delete Operation -->
                            <button type="submit" class="action-link" style="border: none; background: none; font-family: 'Roboto', sans-serif; font-size: 16px; cursor:pointer;">Delete</button>
                            <!-- Button for Submitting the Delete Action -->
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
