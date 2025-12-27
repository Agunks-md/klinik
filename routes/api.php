<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Digunakan untuk komunikasi IoT / aplikasi eksternal
| Prefix otomatis: /api
*/

// =======================
// SENSOR / IOT ROUTES
// =======================

// Kirim data sensor dari ESP / IoT
// POST /api/sensor
Route::post('/sensor', [SensorController::class, 'store']);

// Ambil data sensor terbaru per ruangan
// GET /api/sensor/latest/{roomId}
Route::get('/sensor/latest/{roomId}', [SensorController::class, 'latest']);

// =======================
// API TEST (OPSIONAL)
// =======================
Route::get('/ping', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is running'
    ]);
});
