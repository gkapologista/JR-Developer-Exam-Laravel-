{{-- resources/views/patients/check_status_form.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="status-container">
        <h1>Check Patient Status</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="status-error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Patient Status Check Form -->
        <form action="{{ route('patients.check_status') }}" method="POST" class="status-form">
            @csrf <!-- CSRF protection -->
            <div class="status-form-group">
                <label for="number" class="status-label">Contact Number:</label>
                <input type="text" id="number" name="number" required class="status-input">
            </div>
            <button type="submit" class="status-button">Check Status</button>
        </form>
    </div>
@endsection <!-- End of content section -->
