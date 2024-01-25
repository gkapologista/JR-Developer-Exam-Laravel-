{{-- resources/views/cities/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <h1>Delete & View Cities</h1>
        <table class="city-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td class="city-table-action">
                        <a class="action-link" href="{{ route('cities.show', $city) }}">View</a>
                        <a class="action-link" href="{{ route('cities.edit', $city) }}">Edit</a>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
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
