<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\SensorReading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    /**
     * Store sensor data from IoT device
     */
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
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Determine status and fire detection
        $statusData = SensorReading::determineStatus(
            $request->temperature,
            $request->smoke_density
        );

        // Create sensor reading
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
            'message' => 'Sensor data stored successfully',
            'data' => $reading,
            'alert' => $statusData['fire_detected'] ? 'FIRE_DETECTED' : ($statusData['status'] === 'warning' ? 'WARNING' : 'OK')
        ], 201);
    }

    /**
     * Get latest sensor data for a room
     */
    public function latest($roomId)
    {
        $reading = SensorReading::where('room_id', $roomId)
            ->latest()
            ->first();

        if (!$reading) {
            return response()->json([
                'success' => false,
                'message' => 'No sensor data found for this room'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $reading
        ]);
    }
}

