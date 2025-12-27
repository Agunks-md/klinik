@extends('layouts.admin')

@section('title', 'Monitoring IoT | Smart Clinic')

@section('content')

{{-- HEADER --}}
<div class="mb-4">
    <h3 class="fw-bold">Monitoring IoT</h3>
    <p class="text-muted mb-0">
        Pemantauan kondisi kamar klinik berbasis sensor IoT
    </p>
</div>

<div class="row g-4">

    {{-- ================= KAMAR 1 (LIVE SENSOR) ================= --}}
    @php
        $status1 = $kamar1->status ?? 'normal';

        $label1 = match($status1) {
            'danger' => 'DARURAT',
            'warning' => 'WASPADA',
            default => 'AMAN',
        };

        $class1 = match($status1) {
            'danger' => 'danger',
            'warning' => 'warning',
            default => 'success',
        };
    @endphp

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-header bg-primary text-white fw-semibold rounded-top-4">
                Kamar 1
            </div>

            <div class="card-body text-center py-4">
                <div class="display-4 fw-bold text-{{ $class1 }} mb-2">
                    {{ $kamar1?->temperature ?? '0' }}°C
                </div>

                <div class="mb-2">
                    Status Sensor:
                    <span class="badge bg-{{ $class1 }}">
                        {{ $label1 }}
                    </span>
                </div>

                @if($status1 === 'warning')
                    <div class="alert alert-warning small">
                        ⚠️ Suhu ruangan tidak normal.<br>
                        Silakan hubungi petugas.
                    </div>
                @elseif($status1 === 'danger')
                    <div class="alert alert-danger small">
                        🚨 DARURAT! Api atau suhu ekstrem terdeteksi.<br>
                        Segera hubungi petugas dan lakukan evakuasi.
                    </div>
                @else
                    <div class="text-success small">
                        ✔ Kondisi ruangan aman dan normal.
                    </div>
                @endif
                <div class="text-muted small mt-2">
                    Status Pasien: Istirahat
                </div>
            </div>
        </div>
    </div>

    {{-- ================= KAMAR 2 (DUMMY SENSOR) ================= --}}
    @php
        $status2 = 'normal'; // dummy
    @endphp

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-header bg-primary text-white fw-semibold rounded-top-4">
                Kamar 2 
            </div>

            <div class="card-body text-center py-4">
                <div class="display-4 fw-bold text-success mb-2">
                    {{ $kamar2['temperature'] }}°C
                </div>

                <div class="mb-2">
                    Status Sensor:
                    <span class="badge bg-success">
                        AMAN
                    </span>
                </div>

                <div class="text-success small">
                    ✔ Kondisi ruangan aman.
                </div>

                <div class="text-muted small mt-2">
                    Status Pasien: Istirahat
                </div>
            </div>
        </div>
    </div>

    {{-- ================= KAMAR 3 (DUMMY SENSOR) ================= --}}
    @php
        $status3 = 'normal'; // dummy
    @endphp

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-header bg-primary text-white fw-semibold rounded-top-4">
                Kamar 3
            </div>

            <div class="card-body text-center py-4">
                <div class="display-4 fw-bold text-success mb-2">
                    {{ $kamar3['temperature'] }}°C
                </div>

                <div class="mb-2">
                    Status Sensor:
                    <span class="badge bg-success">
                        AMAN
                    </span>
                </div>

                <div class="text-success small">
                    ✔ Kondisi ruangan aman.
                </div>

                <div class="text-muted small mt-2">
                    Status Pasien: Kosong
                </div>
            </div>
        </div>
    </div>

</div>

{{-- AUTO REFRESH --}}
<script>
    setTimeout(() => {
        location.reload();
    }, 3000);
</script>

@endsection
