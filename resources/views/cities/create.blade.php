{{-- resources/views/cities/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="city-container">
        <h1>Create / Add City</h1>

        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('cities.store') }}">
            @csrf
            <div class="city-form-group">
                <label for="name" class="city-label">Name:</label>
                <input type="text" id="name" name="name" required class="city-input">
            </div>
            
            <button type="submit" class="city-button">Save</button>
        </form>
    </div>
@endsection
