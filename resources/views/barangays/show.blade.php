{{-- resources/views/barangays/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Barangay Details</h1>
    <p>ID: {{ $barangay->id }}</p>
    <p>Name: {{ $barangay->name }}</p>
    <p>City: {{ $barangay->city->name }}</p>

    <a href="{{ route('barangays.index') }}">Back to List</a>
    <a href="{{ route('barangays.edit', $barangay) }}">Edit Barangay</a>
@endsection
