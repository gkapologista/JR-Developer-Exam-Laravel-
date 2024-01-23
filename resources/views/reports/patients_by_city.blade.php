{{-- resources/views/reports/patients_by_city.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Patients by City</h1>
    <table>
        <tr>
            <th>City</th>
            <th>Patient Count</th>
        </tr>
        @foreach ($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->barangays->pluck('patients')->flatten()->count() }}</td>
            </tr>
        @endforeach
    </table>
@endsection
