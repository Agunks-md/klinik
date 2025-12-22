@extends('layouts.app')

@section('title', 'Dashboard Pemantauan')

@section('content')
    <div class="mb-4">
        <h2 class="mb-0">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard Pemantauan Ruang Pasien
        </h2>
        <p class="text-muted">Sistem Pemantauan Real-time Menggunakan IoT</p>
    </div>

    @livewire('patient-room-monitor')
@endsection

