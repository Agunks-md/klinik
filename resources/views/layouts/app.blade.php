<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pemantauan Ruang Pasien IoT') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @if(class_exists('\Livewire\Livewire'))
        @livewireStyles
    @else
        <script>
            console.error('Livewire belum terinstall! Jalankan: composer install');
        </script>
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --success-color: #28a745;
            --info-color: #17a2b8;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .sensor-card {
            transition: transform 0.2s;
        }
        
        .sensor-card:hover {
            transform: translateY(-5px);
        }
        
        .status-badge {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }
        
        .status-normal {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-danger {
            background-color: #f8d7da;
            color: #721c24;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 1rem;
        }
        
        .room-list-item {
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .room-list-item:hover {
            background-color: #e9ecef;
        }
        
        .room-list-item.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-hospital me-2"></i>
                Pemantauan Ruang Pasien IoT
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    @if(class_exists('\Livewire\Livewire'))
        @livewireScripts
    @else
        <script>
            console.error('Livewire belum terinstall! Jalankan: composer install');
            document.body.innerHTML += '<div style="padding:20px;background:#dc3545;color:white;text-align:center;"><h2>⚠️ ERROR: Livewire Belum Terinstall!</h2><p>Silakan jalankan perintah berikut di terminal:</p><code style="background:#000;padding:10px;display:block;margin:10px 0;">composer install</code><p>Kemudian refresh halaman ini.</p></div>';
        </script>
    @endif
</body>
</html>

