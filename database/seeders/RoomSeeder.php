<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\SensorReading;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample rooms
        $rooms = [
            [
                'room_number' => '101',
                'patient_name' => 'Budi Santoso',
                'status' => 'active',
            ],
            [
                'room_number' => '102',
                'patient_name' => 'Siti Nurhaliza',
                'status' => 'active',
            ],
            [
                'room_number' => '201',
                'patient_name' => 'Ahmad Yani',
                'status' => 'active',
            ],
            [
                'room_number' => '202',
                'patient_name' => 'Maya Indira',
                'status' => 'active',
            ],
            [
                'room_number' => '301',
                'patient_name' => null,
                'status' => 'active',
            ],
        ];

        foreach ($rooms as $roomData) {
            $room = Room::create($roomData);

            // Create some initial sensor readings for each room
            for ($i = 0; $i < 5; $i++) {
                $temperature = rand(22, 35); // Normal room temperature
                $smokeDensity = rand(10, 100); // Normal smoke levels
                
                $statusData = SensorReading::determineStatus($temperature, $smokeDensity);

                SensorReading::create([
                    'room_id' => $room->id,
                    'temperature' => $temperature,
                    'smoke_density' => $smokeDensity,
                    'fire_detected' => $statusData['fire_detected'],
                    'status' => $statusData['status'],
                    'alert_message' => $statusData['alert_message'],
                    'created_at' => now()->subMinutes(20 - ($i * 5)),
                ]);
            }
        }
    }
}

