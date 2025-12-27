<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SensorReading;

class MonitoringController extends Controller
{
    public function index()
    {
        // KAMAR 1 (REAL DATA)
        $kamar1 = SensorReading::where('room_id', 1)
            ->latest()
            ->first();

        // KAMAR 2 & 3 (DUMMY)
        $kamar2 = [
            'temperature' => rand(25, 30),
            'smoke_density' => rand(100, 180),
        ];

        $kamar3 = [
            'temperature' => rand(24, 29),
            'smoke_density' => rand(90, 160),
        ];

        return view('admin.monitoring.index', compact(
            'kamar1',
            'kamar2',
            'kamar3'
        ));
    }
}
