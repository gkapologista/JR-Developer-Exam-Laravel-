<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Barangay;

class ReportsController extends Controller
{
    // Retrieve barangays based on city ID
    public function getBarangays($cityId) {
        $barangays = Barangay::where('city_id', $cityId)->get();
        return response()->json($barangays);
    }

    // Generate awareness report
    public function awarenessReport(Request $request)
    {
        $cities = City::all();
        $barangays = Barangay::all();

        // Filter cities and barangays based on selected city or barangay
        $filteredCities = collect();
        if ($request->has('barangay_id') && $request->barangay_id != '') {
            // Filter for a specific barangay
            $barangay = Barangay::with('city')->find($request->barangay_id);
            if ($barangay) {
                // Add city and barangay to filtered collection
                $filteredCities = collect([$barangay->city]);
                $filteredCities->first()->setRelation('barangays', collect([$barangay]));
            }
        } elseif ($request->has('city_id') && $request->city_id != '') {
            // Filter for a specific city
            $filteredCities = City::where('id', $request->city_id)->with('barangays')->get();
        } else {
            // No filter applied, get all cities and their barangays
            $filteredCities = City::with('barangays')->get();
        }

        return view('reports.awareness', compact('cities', 'barangays', 'filteredCities'));
    }

    // Generate coronavirus report
    public function coronavirusReport(Request $request)
    {
        $cities = City::all();
        $barangays = Barangay::all();

        // Filter cities and barangays based on selected city or barangay
        $filteredCities = collect();
        if ($request->has('barangay_id') && $request->barangay_id != '') {
            // Filter for a specific barangay
            $barangay = Barangay::with(['city', 'patients' => function ($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->find($request->barangay_id);
            if ($barangay) {
                // Add city and barangay to filtered collection
                $filteredCities = collect([$barangay->city]);
                $filteredCities->first()->setRelation('barangays', collect([$barangay]));
            }
        } elseif ($request->has('city_id') && $request->city_id != '') {
            // Filter for a specific city
            $filteredCities = City::where('id', $request->city_id)->with(['barangays.patients' => function($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->get();
        } else {
            // No filter applied, get all cities and their barangays with patients
            $filteredCities = City::with(['barangays.patients' => function($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->get();
        }

        // Calculate totals for coronavirus cases
        $totalWithCoronavirus = $totalActive = $totalRecovered = $totalDeaths = 0;
        foreach ($filteredCities as $city) {
            foreach ($city->barangays as $barangay) {
                $totalWithCoronavirus += $barangay->patients->count();
                $totalActive += $barangay->patients->where('coronavirus_status', 'active')->count();
                $totalRecovered += $barangay->patients->where('coronavirus_status', 'recovered')->count();
                $totalDeaths += $barangay->patients->where('coronavirus_status', 'death')->count();
            }
        }

        return view('reports.coronavirus', compact('cities', 'barangays', 'filteredCities', 'totalWithCoronavirus', 'totalActive', 'totalRecovered', 'totalDeaths'));
    }
}
