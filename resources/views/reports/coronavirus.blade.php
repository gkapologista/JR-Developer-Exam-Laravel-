{{-- resources/views/reports/coronavirus.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="report-container">
        <h1 class="report-title">Coronavirus Report</h1>
        <form method="GET" action="{{ route('reports.coronavirus') }}">
            <div class="report-form-group">
                <label for="city_id" class="report-label">City:</label>
                <select id="city_id" name="city_id" class="report-select" data-report-type="coronavirus">
                    <option value="">Select a City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="report-form-group">
                <label for="barangay_id" class="report-label">Barangay:</label>
                <select id="barangay_id" name="barangay_id" class="report-select">
                    <option value="">Select a Barangay</option>
                    @foreach ($barangays as $barangay) <!-- Update this based on your data -->
                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="report-button">Generate Report</button>
        </form>

        {{-- Display the total counts here --}}
        @if(request('city_id') || request('barangay_id'))
            <h2 class="report-results-title">Total Coronavirus Cases</h2>
            <div class="report-results">
                <p>Total Number of Persons with Coronavirus: {{ $totalWithCoronavirus }}</p>
                <p>Total Active Cases: {{ $totalActive }}</p>
                <p>Total Recovered Cases: {{ $totalRecovered }}</p>
                <p>Total Deaths: {{ $totalDeaths }}</p>
            </div>
        @endif
    </div>
@endsection
