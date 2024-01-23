<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class ReportsController extends Controller
{
    public function patientsByCity()
    {
        $cities = City::with('barangays.patients')->get();

        return view('reports.patients_by_city', compact('cities'));
    }
}
