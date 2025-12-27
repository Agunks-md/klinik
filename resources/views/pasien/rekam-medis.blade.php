<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekam Medis | Smart Clinic</title>

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
            background: #020617;
            border-right: 1px solid #1e293b;
            position: fixed;
            left: 0;
            top: 0;
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 20px;
            font-weight: 700;
            color: #38bdf8;
            margin-bottom: 4px;
        }

        .subtitle {
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 24px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            text-decoration: none;
            color: #cbd5f5;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #1e293b;
            color: #38bdf8;
        }

        .logout {
            margin-top: auto;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            background: #ef4444;
            color: #fff;
            font-weight: 600;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 260px;
            padding: 40px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #94a3b8;
        }

        .card {
            background-color: #020617;
            border: 1px solid #1e293b;
            border-radius: 18px;
        }

        /* ===== TIMELINE ===== */
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #1e293b;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 24px;
        }

        .timeline-dot {
            position: absolute;
            left: -30px;
            top: 6px;
            width: 14px;
            height: 14px;
            background-color: #38bdf8;
            border-radius: 50%;
        }

        .rekam-title {
            font-weight: 600;
            color: #38bdf8;
        }

        .rekam-meta {
            font-size: 13px;
            color: #94a3b8;
        }

        .rekam-desc {
            font-size: 14px;
            color: #cbd5f5;
        }
    </style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h4>🏥 Smart Clinic</h4>
    <span> </span>

    <div class="menu">
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
    </div>

   <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button class="btn btn-danger w-100 btn-sm">Logout</button>
    </form>
</div>

<!-- ===== MAIN ===== -->
<div class="main">

    <div class="mb-4">
        <div class="page-title">📄 Rekam Medis Pasien</div>
        <div class="page-subtitle">
            Riwayat pemeriksaan dan layanan medis Anda
        </div>
    </div>

    <div class="card p-4">
        <h5 class="fw-semibold mb-4">📜 Riwayat Medis</h5>

        <div class="timeline">

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="rekam-title">🩺 Konsultasi Umum</div>
                <div class="rekam-meta">20 Desember 2025 • dr. Andi</div>
                <div class="rekam-desc">
                    Demam tinggi disertai batuk dan nyeri tenggorokan.
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="rekam-title">🧪 Pemeriksaan Laboratorium</div>
                <div class="rekam-meta">18 Desember 2025</div>
                <div class="rekam-desc">
                    Hasil pemeriksaan normal, disarankan menjaga pola makan.
                </div>
            </div>

        </div>

        <div class="alert alert-info mt-4">
            💡 Rekam medis akan terus bertambah otomatis.
        </div>
    </div>

</div>

</body>
</html>
