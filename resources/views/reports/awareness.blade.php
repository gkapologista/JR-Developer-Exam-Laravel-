{{-- resources/views/reports/awareness.blade.php --}}

@extends('layouts.app') <!-- Extend the layout 'app' -->

@section('content') <!-- Define the content section to be filled in by child views -->
    <div class="report-container">
        <h1 class="report-title">Awareness Report</h1> <!-- Display a title for the awareness report -->
        <form method="GET" action="{{ route('reports.awareness') }}" class="report-form">
            <div class="report-form-group">
                <label for="city_id" class="report-label" >City:</label> <!-- Display a label for selecting the city -->
                <select id="city_id" name="city_id" class="report-select" data-report-type="awareness">
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

        {{-- Display the report here --}}
        @if(request('city_id') || request('barangay_id')) <!-- Check if city or barangay is selected -->
            <h2 class="report-results-title">Report Results</h2> <!-- Display a title for the report results -->
            <div class="report-results">
            @foreach ($filteredCities as $city) <!-- Loop through filtered cities -->
                <div class="city-report">
                <h3>{{ $city->name }}</h3> <!-- Display the city name -->
                    @foreach ($city->barangays as $barangay) <!-- Loop through barangays within the city -->
                        <div class="barangay-report">
                            <h4>{{ $barangay->name }}</h4> <!-- Display the barangay name -->
                            <p>PUI: {{ $barangay->patients->where('case_type', 'PUI')->count() }}</p> <!-- Display the count of patients with PUI case type -->
                            <p>PUM: {{ $barangay->patients->where('case_type', 'PUM')->count() }}</p> <!-- Display the count of patients with PUM case type -->
                            <p>Positive: {{ $barangay->patients->where('case_type', 'Positive')->count() }}</p> <!-- Display the count of patients with Positive case type -->
                            <p>Negative: {{ $barangay->patients->where('case_type', 'Negative')->count() }}</p> <!-- Display the count of patients with Negative case type -->
                        </div>
                    @endforeach
                </div>
            @endforeach
            </div>
        @endif
    </div>
@endsection <!-- End of content section -->
