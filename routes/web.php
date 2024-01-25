<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); // Define a route for the homepage that returns the 'welcome' view
});

// Define RESTful routes for the City, Barangay, and Patient resources
Route::resource('cities', CityController::class); // Define RESTful routes for managing cities using CityController
Route::resource('barangays', BarangayController::class); // Define RESTful routes for managing barangays using BarangayController
Route::resource('patients', PatientController::class); // Define RESTful routes for managing patients using PatientController

// Define custom routes for checking patient status
Route::get('/patient-status', [PatientController::class, 'checkStatusForm'])->name('patients.check_status_form'); // Display the form for checking patient status
Route::post('/patient-status', [PatientController::class, 'checkStatus'])->name('patients.check_status'); // Process the form submission to check patient status

// Define a custom route to get the barangays of a city
Route::get('/cities/{city}/barangays', [ReportsController::class, 'getBarangays']); // Retrieve the barangays of a specific city

// Define routes for generating reports
Route::get('/reports/awareness', [ReportsController::class, 'awarenessReport'])->name('reports.awareness'); // Generate an awareness report
Route::get('/reports/coronavirus', [ReportsController::class, 'coronavirusReport'])->name('reports.coronavirus'); // Generate a coronavirus report
