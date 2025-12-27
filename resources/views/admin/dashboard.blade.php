<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Smart Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #0f172a;
            color: #cbd5f5;
        }

        .sidebar h4 {
            color: #fff;
        }

        .sidebar a {
            display: block;
            padding: 12px 16px;
            color: #cbd5f5;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 6px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #1e293b;
            color: #fff;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 24px;
        }

        .card-stat {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,.06);
        }

        .card-stat h3 {
            margin: 0;
            font-weight: 700;
        }

        .badge-status {
            background: #0f766e;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar p-4">
        <h4 class="fw-bold mb-4">🏥 Smart Clinic</h4>

        <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('admin.pasien.index') }}"
   class="{{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
   Data Pasien
</a>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.dokter') ? 'active' : '' }}"
       href="{{ route('admin.dokter') }}">
        <i class="bi bi-person-badge me-2"></i> Data Dokter
    </a>
</li>

        <a href="#">Monitoring IoT</a>
        <a href="#">Laporan</a>

        <hr class="border-secondary">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-light w-100">
                Logout
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Dashboard Admin</h3>
                <p class="text-muted mb-0">Selamat datang, {{ auth()->user()->name }}</p>
            </div>

            <span class="badge badge-status px-3 py-2 text-white">
                Sistem Aktif
            </span>
        </div>

        <!-- STAT CARDS -->
        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="card card-stat p-4">
                    <small class="text-muted">Total Pasien</small>
                    <h3>120</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stat p-4">
                    <small class="text-muted">Dokter</small>
                    <h3>8</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stat p-4">
                    <small class="text-muted">Konsultasi Hari Ini</small>
                    <h3>14</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stat p-4">
                    <small class="text-muted">Sensor Aktif</small>
                    <h3>6</h3>
                </div>
            </div>

        </div>

        <!-- INFO -->
        <div class="card card-stat p-4">
            <h5 class="fw-semibold mb-2">Monitoring Sistem</h5>
            <p class="text-muted mb-0">
                Semua sensor IoT berjalan normal. Tidak ada peringatan darurat.
            </p>
        </div>

    </main>
</div>

</body>
</html>
