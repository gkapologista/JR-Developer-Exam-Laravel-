{{-- resources/views/patients/check_status_form.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="status-container">
        <h1>Check Patient Status</h1>

        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('patients.check_status') }}" method="POST" class="status-form">
            @csrf
            <div class="status-form-group">
                <label for="number" class="status-label">Contact Number:</label>
                <input type="text" id="number" name="number" required class="status-input">
            </div>
            <button type="submit" class="status-button">Check Status</button>
        </form>
    </div>
@endsection
