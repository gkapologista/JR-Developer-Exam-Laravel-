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
    return view('welcome');
});

// Define RESTful routes for the City, Barangay, and Patient resources
Route::resource('cities', CityController::class);
Route::resource('barangays', BarangayController::class);
Route::resource('patients', PatientController::class);
Route::get('/patient-status', [PatientController::class, 'checkStatusForm'])->name('patients.check_status_form');
Route::post('/patient-status', [PatientController::class, 'checkStatus'])->name('patients.check_status');
Route::get('/cities/{city}/barangays', [ReportsController::class, 'getBarangays']);
Route::get('/reports/awareness', [ReportsController::class, 'awarenessReport'])->name('reports.awareness');
Route::get('/reports/coronavirus', [ReportsController::class, 'coronavirusReport'])->name('reports.coronavirus');
