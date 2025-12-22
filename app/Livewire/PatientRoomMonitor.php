<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\SensorReading;
use Illuminate\Support\Facades\DB;

class PatientRoomMonitor extends Component
{
    public $selectedRoomId = null;
    public $rooms = [];
    public $latestReading = null;
    public $chartData = [
        'temperatures' => [],
        'smokeDensities' => [],
        'fireDetections' => [],
        'labels' => [],
    ];

    public function mount()
    {
        $this->rooms = Room::with('latestSensorReading')->get();
        if ($this->rooms->count() > 0) {
            $this->selectedRoomId = $this->rooms->first()->id;
            $this->loadRoomData();
        }
    }

    public function selectRoom($roomId)
    {
        $this->selectedRoomId = $roomId;
        $this->loadRoomData();
        $this->dispatch('roomSelected');
    }

    public function loadRoomData()
    {
        if (!$this->selectedRoomId) {
            return;
        }

        // Get latest reading
        $this->latestReading = SensorReading::where('room_id', $this->selectedRoomId)
            ->latest()
            ->first();

        // Get last 20 readings for chart
        $readings = SensorReading::where('room_id', $this->selectedRoomId)
            ->orderBy('created_at', 'asc')
            ->limit(20)
            ->get();

        $this->chartData = [
            'temperatures' => $readings->pluck('temperature')->toArray(),
            'smokeDensities' => $readings->pluck('smoke_density')->toArray(),
            'fireDetections' => $readings->pluck('fire_detected')->map(fn($val) => $val ? 1 : 0)->toArray(),
            'labels' => $readings->map(fn($reading) => $reading->created_at->format('H:i:s'))->toArray(),
        ];

        // Refresh rooms data
        $this->rooms = Room::with('latestSensorReading')->get();
        
        // Dispatch event to update chart
        $this->dispatch('roomDataLoaded');
    }

    public function render()
    {
        return view('livewire.patient-room-monitor');
    }
}

