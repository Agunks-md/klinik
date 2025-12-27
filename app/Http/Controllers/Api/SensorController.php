<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SensorReading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'temperature' => 'required|numeric|between:-50,150',
            'smoke_density' => 'required|numeric|min:0|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $statusData = SensorReading::determineStatus(
            $request->temperature,
            $request->smoke_density
        );

        $reading = SensorReading::create([
            'room_id' => $request->room_id,
            'temperature' => $request->temperature,
            'smoke_density' => $request->smoke_density,
            'fire_detected' => $statusData['fire_detected'],
            'status' => $statusData['status'],
            'alert_message' => $statusData['alert_message'],
        ]);

        return response()->json([
            'success' => true,
            'data' => $reading
        ], 201);
    }

    public function latest($roomId)
    {
        $reading = SensorReading::where('room_id', $roomId)->latest()->first();

        return response()->json([
            'success' => (bool) $reading,
            'data' => $reading
        ]);
    }
}
