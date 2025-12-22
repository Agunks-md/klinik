<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'patient_name',
        'status',
    ];

    /**
     * Get all sensor readings for this room
     */
    public function sensorReadings(): HasMany
    {
        return $this->hasMany(SensorReading::class);
    }

    /**
     * Get the latest sensor reading for this room
     */
    public function latestSensorReading()
    {
        return $this->hasOne(SensorReading::class)->latestOfMany();
    }
}

