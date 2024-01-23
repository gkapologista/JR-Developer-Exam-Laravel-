{{-- resources/views/cities/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Edit City</h1>
    <form method="POST" action="{{ route('cities.update', $city) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $city->name }}" required>

        <button type="submit">Update</button>
    </form>
@endsection
