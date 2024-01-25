<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Barangay;

class ReportsController extends Controller
{
    public function getBarangays($cityId) {
        $barangays = Barangay::where('city_id', $cityId)->get();
        return response()->json($barangays);
    }

    public function awarenessReport(Request $request)
    {
        $cities = City::all();
        $barangays = Barangay::all();

        // Initialize an empty collection for filtered cities
        $filteredCities = collect();

        if ($request->has('barangay_id') && $request->barangay_id != '') {
            $barangay = Barangay::with('city')->find($request->barangay_id);
            if ($barangay) {
                $filteredCities = collect([$barangay->city]);
                $filteredCities->first()->setRelation('barangays', collect([$barangay]));
            }
        } elseif ($request->has('city_id') && $request->city_id != '') {
            $filteredCities = City::where('id', $request->city_id)->with('barangays')->get();
        } else {
            $filteredCities = City::with('barangays')->get();
        }

        return view('reports.awareness', compact('cities', 'barangays', 'filteredCities'));
    }

    public function coronavirusReport(Request $request)
    {
        $cities = City::all();
        $barangays = Barangay::all();

        $filteredCities = collect();

        if ($request->has('barangay_id') && $request->barangay_id != '') {
            $barangay = Barangay::with(['city', 'patients' => function ($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->find($request->barangay_id);
            if ($barangay) {
                $filteredCities = collect([$barangay->city]);
                $filteredCities->first()->setRelation('barangays', collect([$barangay]));
            }
        } elseif ($request->has('city_id') && $request->city_id != '') {
            $filteredCities = City::where('id', $request->city_id)->with(['barangays.patients' => function($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->get();
        } else {
            $filteredCities = City::with(['barangays.patients' => function($query) {
                $query->whereIn('coronavirus_status', ['active', 'recovered', 'death']);
            }])->get();
        }

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
