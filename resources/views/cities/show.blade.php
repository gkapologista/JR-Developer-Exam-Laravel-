{{-- resources/views/cities/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>City Details</h1>
    <p>ID: {{ $city->id }}</p>
    <p>Name: {{ $city->name }}</p>

    <a href="{{ route('cities.index') }}">Back to List</a>
    <a href="{{ route('cities.edit', $city) }}">Edit City</a>
@endsection
