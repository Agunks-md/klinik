<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ADMIN
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\PasienController;

// PASIEN
use App\Http\Controllers\Pasien\DataDiriController;
use App\Http\Controllers\Pasien\KonsultasiController;
use App\Http\Controllers\Pasien\MonitoringController as PasienMonitoringController;
use App\Http\Controllers\Pasien\RekamMedisController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Monitoring IoT (INI YANG PENTING)
        Route::get('/monitoring', [MonitoringController::class, 'index'])
            ->name('monitoring');

        // Manajemen Pasien
        Route::resource('pasien', PasienController::class);

        // Dokter
        Route::get('/dokter', function () {
            return view('admin.dokter.index');
        })->name('dokter');

        // Laporan
        Route::get('/laporan', function () {
            return view('admin.laporan.index');
        })->name('laporan');
    });

/*
|--------------------------------------------------------------------------
| PASIEN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('pasien')
    ->name('pasien.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('pasien.dashboard');
        })->name('dashboard');

        Route::get('/data-diri', [DataDiriController::class, 'edit'])
            ->name('data-diri');

        Route::post('/data-diri', [DataDiriController::class, 'update'])
            ->name('data-diri.update');

        Route::get('/konsultasi', [KonsultasiController::class, 'index'])
            ->name('konsultasi');

        Route::get('/monitoring', [PasienMonitoringController::class, 'index'])
            ->name('monitoring');

        Route::get('/rekam-medis', [RekamMedisController::class, 'index'])
            ->name('rekam-medis');
    });

/*
|--------------------------------------------------------------------------
| PROFILE (BREEZE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
