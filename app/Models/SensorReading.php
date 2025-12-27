<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'temperature',
        'smoke_density',
        'fire_detected',
        'alert_message',
        'status',
    ];

    protected $casts = [
        'temperature' => 'decimal:2',
        'smoke_density' => 'decimal:2',
        'fire_detected' => 'boolean',
    ];

    public static function determineStatus($temperature, $smokeDensity): array
    {
        if ($temperature > 60 || $smokeDensity > 500) {
            return [
                'fire_detected' => true,
                'status' => 'danger',
                'alert_message' => "Kebakaran terdeteksi! Suhu {$temperature}°C, Asap {$smokeDensity} ppm"
            ];
        }

        if ($temperature > 40 || $smokeDensity > 200) {
            return [
                'fire_detected' => false,
                'status' => 'warning',
                'alert_message' => "Peringatan! Suhu {$temperature}°C, Asap {$smokeDensity} ppm"
            ];
        }

        return [
            'fire_detected' => false,
            'status' => 'normal',
            'alert_message' => null
        ];
    }
}
