{{-- resources/views/cities/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Create City</h1>
    <form method="POST" action="{{ route('cities.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">Submit</button>
    </form>
@endsection
