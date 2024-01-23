{{-- resources/views/cities/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Cities List</h1>
    <a href="{{ route('cities.create') }}">Add New City</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>
                    <a href="{{ route('cities.show', $city) }}">View</a>
                    <a href="{{ route('cities.edit', $city) }}">Edit</a>
                    <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
