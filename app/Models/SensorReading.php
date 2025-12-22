<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the room that owns the sensor reading
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Determine status based on sensor values
     */
    public static function determineStatus($temperature, $smokeDensity): array
    {
        $fireDetected = false;
        $status = 'normal';
        $alertMessage = null;

        // Fire detection: temperature > 60°C or smoke density > 500 ppm
        if ($temperature > 60 || $smokeDensity > 500) {
            $fireDetected = true;
            $status = 'danger';
            $alertMessage = 'Kebakaran terdeteksi! Suhu: ' . $temperature . '°C, Asap: ' . $smokeDensity . ' ppm';
        }
        // Warning: temperature > 40°C or smoke density > 200 ppm
        elseif ($temperature > 40 || $smokeDensity > 200) {
            $status = 'warning';
            $alertMessage = 'Peringatan: Kondisi tidak normal terdeteksi. Suhu: ' . $temperature . '°C, Asap: ' . $smokeDensity . ' ppm';
        }

        return [
            'fire_detected' => $fireDetected,
            'status' => $status,
            'alert_message' => $alertMessage,
        ];
    }
}

