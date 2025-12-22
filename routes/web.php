<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// API Routes for IoT Sensor Data
Route::prefix('api')->group(function () {
    Route::post('/sensor/data', [SensorController::class, 'store'])->name('api.sensor.store');
    Route::get('/sensor/latest/{roomId}', [SensorController::class, 'latest'])->name('api.sensor.latest');
});
