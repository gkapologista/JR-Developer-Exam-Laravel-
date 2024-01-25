{{-- resources/views/reports/coronavirus.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="report-container">
        <h1 class="report-title">Coronavirus Report</h1> <!-- Display a title for the coronavirus report -->
        <form method="GET" action="{{ route('reports.coronavirus') }}">
            <div class="report-form-group">
                <label for="city_id" class="report-label">City:</label> <!-- Display a label for selecting the city -->
                <select id="city_id" name="city_id" class="report-select" data-report-type="coronavirus">
                    <option value="">Select a City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option> <!-- Display options for selecting a city -->
                    @endforeach
                </select>
            </div>

            <div class="report-form-group">
                <label for="barangay_id" class="report-label">Barangay:</label> <!-- Display a label for selecting the barangay -->
                <select id="barangay_id" name="barangay_id" class="report-select">
                    <option value="">Select a Barangay</option>
                    @foreach ($barangays as $barangay) <!-- Display options for selecting a barangay (update based on data) -->
                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="report-button">Generate Report</button> <!-- Display a button to generate the report -->
        </form>

        {{-- Display the total counts here --}}
        @if(request('city_id') || request('barangay_id')) <!-- Check if city or barangay is selected -->
            <h2 class="report-results-title">Total Coronavirus Cases</h2> <!-- Display a title for the total coronavirus cases -->
            <div class="report-results">
                <p>Total Number of Persons with Coronavirus: {{ $totalWithCoronavirus }}</p> <!-- Display the total number of persons with coronavirus -->
                <p>Total Active Cases: {{ $totalActive }}</p> <!-- Display the total number of active cases -->
                <p>Total Recovered Cases: {{ $totalRecovered }}</p> <!-- Display the total number of recovered cases -->
                <p>Total Deaths: {{ $totalDeaths }}</p> <!-- Display the total number of deaths -->
            </div>
        @endif
    </div>
@endsection <!-- End of content section -->
