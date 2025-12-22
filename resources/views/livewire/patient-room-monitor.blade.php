<div wire:poll.5s="loadRoomData">
    <div class="row">
        <!-- Room List Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-door-open me-2"></i>Daftar Ruang</h5>
                </div>
                <div class="list-group list-group-flush">
                    @forelse($rooms as $room)
                        <button 
                            wire:click="selectRoom({{ $room->id }})"
                            class="list-group-item list-group-item-action room-list-item {{ $selectedRoomId == $room->id ? 'active' : '' }}"
                            type="button"
                        >
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $room->room_number }}</strong>
                                    @if($room->patient_name)
                                        <br><small>{{ $room->patient_name }}</small>
                                    @endif
                                </div>
                                @if($room->latestSensorReading)
                                    @if($room->latestSensorReading->status == 'danger')
                                        <span class="badge bg-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @elseif($room->latestSensorReading->status == 'warning')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </button>
                    @empty
                        <div class="list-group-item text-center text-muted">
                            Tidak ada ruang tersedia
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            @if($selectedRoomId && $latestReading)
                @php
                    $room = $rooms->firstWhere('id', $selectedRoomId);
                @endphp
                
                <!-- Alert Messages -->
                @if($latestReading->alert_message)
                    <div class="alert alert-{{ $latestReading->status == 'danger' ? 'danger' : 'warning' }} alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="fas fa-{{ $latestReading->fire_detected ? 'fire' : 'exclamation-triangle' }} me-2"></i>
                            {{ $latestReading->fire_detected ? 'KEBAKARAN TERDETEKSI!' : 'PERINGATAN!' }}
                        </strong>
                        <br>
                        {{ $latestReading->alert_message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Sensor Cards -->
                <div class="row mb-4">
                    <!-- Temperature Card -->
                    <div class="col-md-4 mb-3">
                        <div class="card sensor-card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-subtitle mb-0 text-muted">
                                        <i class="fas fa-thermometer-half text-danger me-2"></i>
                                        Suhu Ruangan
                                    </h6>
                                    @if($latestReading->temperature > 60)
                                        <span class="badge bg-danger">BAHAYA</span>
                                    @elseif($latestReading->temperature > 40)
                                        <span class="badge bg-warning text-dark">PERINGATAN</span>
                                    @else
                                        <span class="badge bg-success">NORMAL</span>
                                    @endif
                                </div>
                                <h2 class="card-title mb-0">
                                    {{ number_format($latestReading->temperature, 1) }}°C
                                </h2>
                                <small class="text-muted">
                                    Terakhir diperbarui: {{ $latestReading->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Smoke Density Card -->
                    <div class="col-md-4 mb-3">
                        <div class="card sensor-card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-subtitle mb-0 text-muted">
                                        <i class="fas fa-smog text-secondary me-2"></i>
                                        Kepekatan Asap
                                    </h6>
                                    @if($latestReading->smoke_density > 500)
                                        <span class="badge bg-danger">BAHAYA</span>
                                    @elseif($latestReading->smoke_density > 200)
                                        <span class="badge bg-warning text-dark">PERINGATAN</span>
                                    @else
                                        <span class="badge bg-success">NORMAL</span>
                                    @endif
                                </div>
                                <h2 class="card-title mb-0">
                                    {{ number_format($latestReading->smoke_density, 1) }} ppm
                                </h2>
                                <small class="text-muted">
                                    Parts Per Million
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Fire Detection Card -->
                    <div class="col-md-4 mb-3">
                        <div class="card sensor-card h-100 shadow-sm {{ $latestReading->fire_detected ? 'border-danger border-2' : '' }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-subtitle mb-0 text-muted">
                                        <i class="fas fa-fire text-danger me-2"></i>
                                        Deteksi Kebakaran
                                    </h6>
                                    @if($latestReading->fire_detected)
                                        <span class="badge bg-danger">TERDETEKSI</span>
                                    @else
                                        <span class="badge bg-success">AMAN</span>
                                    @endif
                                </div>
                                <h2 class="card-title mb-0">
                                    @if($latestReading->fire_detected)
                                        <i class="fas fa-fire text-danger"></i> API TERDETEKSI
                                    @else
                                        <i class="fas fa-check-circle text-success"></i> TIDAK ADA API
                                    @endif
                                </h2>
                                <small class="text-muted">
                                    Berdasarkan analisis suhu dan asap
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-chart-line me-2"></i>
                                    Grafik Data Sensor - Ruang {{ $room->room_number }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="sensorChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Info -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Informasi Ruang
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Nomor Ruang:</strong> {{ $room->room_number }}</p>
                                        <p><strong>Nama Pasien:</strong> {{ $room->patient_name ?? 'Tidak ada pasien' }}</p>
                                        <p><strong>Status Ruang:</strong> 
                                            <span class="badge bg-{{ $room->status == 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($room->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Status Sistem:</strong> 
                                            <span class="status-badge status-{{ $latestReading->status }}">
                                                {{ strtoupper($latestReading->status) }}
                                            </span>
                                        </p>
                                        <p><strong>Waktu Pembacaan Terakhir:</strong><br>
                                            {{ $latestReading->created_at->format('d/m/Y H:i:s') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Silakan pilih ruang untuk melihat data sensor.
                </div>
            @endif
        </div>
    </div>

    <script>
        let sensorChart = null;

        document.addEventListener('livewire:init', () => {
            Livewire.on('roomSelected', () => {
                setTimeout(() => {
                    if (sensorChart) {
                        sensorChart.destroy();
                    }
                    initializeChart();
                }, 100);
            });

            Livewire.on('roomDataLoaded', () => {
                setTimeout(() => {
                    updateChart();
                }, 100);
            });
        });

        function initializeChart() {
            const ctx = document.getElementById('sensorChart');
            if (!ctx) return;

            const chartData = @json($chartData);
            
            sensorChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels || [],
                    datasets: [
                        {
                            label: 'Suhu (°C)',
                            data: chartData.temperatures || [],
                            borderColor: 'rgb(220, 53, 69)',
                            backgroundColor: 'rgba(220, 53, 69, 0.1)',
                            tension: 0.4,
                            yAxisID: 'y',
                        },
                        {
                            label: 'Kepekatan Asap (ppm)',
                            data: chartData.smokeDensities || [],
                            borderColor: 'rgb(108, 117, 125)',
                            backgroundColor: 'rgba(108, 117, 125, 0.1)',
                            tension: 0.4,
                            yAxisID: 'y1',
                        },
                        {
                            label: 'Deteksi Kebakaran',
                            data: chartData.fireDetections || [],
                            borderColor: 'rgb(255, 193, 7)',
                            backgroundColor: 'rgba(255, 193, 7, 0.1)',
                            tension: 0.4,
                            yAxisID: 'y2',
                            stepped: true,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        if (context.datasetIndex === 2) {
                                            label += context.parsed.y === 1 ? 'Terdeteksi' : 'Tidak Terdeteksi';
                                        } else {
                                            label += context.parsed.y;
                                        }
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: {
                                display: true,
                                text: 'Suhu (°C)',
                                color: 'rgb(220, 53, 69)'
                            },
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            title: {
                                display: true,
                                text: 'Kepekatan Asap (ppm)',
                                color: 'rgb(108, 117, 125)'
                            },
                            grid: {
                                drawOnChartArea: false,
                            },
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            min: 0,
                            max: 1,
                        },
                    }
                }
            });
        }

        function updateChart() {
            if (!sensorChart || !document.getElementById('sensorChart')) {
                initializeChart();
                return;
            }

            const chartData = @json($chartData);
            sensorChart.data.labels = chartData.labels || [];
            sensorChart.data.datasets[0].data = chartData.temperatures || [];
            sensorChart.data.datasets[1].data = chartData.smokeDensities || [];
            sensorChart.data.datasets[2].data = chartData.fireDetections || [];
            sensorChart.update('none');
        }

        // Initialize chart on page load
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                if (document.getElementById('sensorChart')) {
                    initializeChart();
                }
            }, 500);
        });

        // Handle Livewire updates
        document.addEventListener('livewire:update', function() {
            setTimeout(() => {
                if (document.getElementById('sensorChart') && @js($selectedRoomId)) {
                    if (!sensorChart) {
                        initializeChart();
                    } else {
                        updateChart();
                    }
                }
            }, 100);
        });
    </script>
</div>

