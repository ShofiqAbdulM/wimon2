<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/sensor-masuk', [SensorController::class, 'tambahSensorMasuk'])->name('sensor.masuk.tambah');
Route::post('/sensor-keluar', [SensorController::class, 'tambahSensorKeluar'])->name('sensor.keluar.tambah');
Route::get('/pengunjung-masuk', [SensorController::class, 'getPengunjungMasuk'])->name('pengunjung.masuk');
