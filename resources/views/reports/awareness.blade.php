{{-- resources/views/reports/awareness.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="report-container">
        <h1 class="report-title">Awareness Report</h1>
        <form method="GET" action="{{ route('reports.awareness') }}" class="report-form">
            <div class="report-form-group">
                <label for="city_id" class="report-label" >City:</label>
                <select id="city_id" name="city_id" class="report-select" data-report-type="awareness">
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

        {{-- Display the report here --}}
        @if(request('city_id') || request('barangay_id'))
            <h2 class="report-results-title">Report Results</h2>
            <div class="report-results">
            @foreach ($filteredCities as $city)
                <div class="city-report">
                <h3>{{ $city->name }}</h3>
                    @foreach ($city->barangays as $barangay)
                        <div class="barangay-report">
                            <h4>{{ $barangay->name }}</h4>
                            <p>PUI: {{ $barangay->patients->where('case_type', 'PUI')->count() }}</p>
                            <p>PUM: {{ $barangay->patients->where('case_type', 'PUM')->count() }}</p>
                            <p>Positive: {{ $barangay->patients->where('case_type', 'Positive')->count() }}</p>
                            <p>Negative: {{ $barangay->patients->where('case_type', 'Negative')->count() }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
            </div>
        @endif
    </div>
@endsection
