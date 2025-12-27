<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien | Smart Clinic</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #020617, #0f172a);
            color: #e5e7eb;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            height: 100vh;
            background-color: #020617;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid #1e293b;
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h4 {
            color: #38bdf8;
            font-weight: 700;
            margin-bottom: 0;
        }

        .sidebar span {
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 24px;
            display: block;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #cbd5f5;
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #1e293b;
            color: #38bdf8;
        }

        .logout {
            margin-top: auto;
        }

        .logout button {
            width: 100%;
            border-radius: 12px;
            background: #ef4444;
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 12px;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 260px;
            padding: 40px;
        }

        .topbar {
            margin-bottom: 30px;
        }

        .card {
            background-color: #020617;
            border: 1px solid #1e293b;
            border-radius: 18px;
        }

        .text-muted {
            color: #94a3b8 !important;
        }
    </style>
</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h4>🏥 Smart Clinic</h4>
    <span> </span>

    <a href="{{ route('pasien.dashboard') }}"
       class="{{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
         Dashboard
    </a>

    <a href="{{ route('pasien.data-diri') }}"
       class="{{ request()->routeIs('pasien.data-diri*') ? 'active' : '' }}">
         Data Diri
    </a>

    <a href="{{ route('pasien.konsultasi') }}"
       class="{{ request()->routeIs('pasien.konsultasi*') ? 'active' : '' }}">
         Konsultasi
    </a>

    <a href="{{ route('pasien.rekam-medis') }}"
       class="{{ request()->routeIs('pasien.rekam-medis*') ? 'active' : '' }}">
         Rekam Medis
    </a>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button class="btn btn-danger w-100 btn-sm">Logout</button>
    </form>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <h4 class="fw-bold mb-1">👋 Halo, {{ Auth::user()->name }}</h4>
        <span class="text-muted">
            Selamat datang di Dashboard Pasien Smart Clinic
        </span>
    </div>

    <!-- CONTENT -->
    <div class="card p-4">
        <h5 class="fw-bold text-info mb-3">📌 Tentang Dashboard Pasien</h5>

        <p class="text-muted mb-3">
            Dashboard Pasien Smart Clinic membantu Anda mengelola layanan kesehatan
            secara digital, aman, dan terintegrasi.
        </p>

        <ul class="text-muted">
            <li><b>Data Diri</b> – Kelola identitas & kontak pasien</li>
            <li><b>Konsultasi</b> – Konsultasi medis dengan dokter</li>
            <li><b>Monitoring IoT</b> – Pantau kondisi ruangan pasien</li>
            <li><b>Rekam Medis</b> – Riwayat pemeriksaan & layanan</li>
        </ul>

        <p class="text-muted mt-3">
            Semua fitur dirancang sederhana, cepat, dan mudah digunakan.
        </p>
    </div>

</div>

</body>
</html>
