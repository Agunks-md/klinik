<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konsultasi Pasien | Smart Clinic</title>

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
            padding: 24px;
            border-right: 1px solid #1e293b;
        }

        .sidebar h4 {
            color: #38bdf8;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .sidebar span {
            font-size: 13px;
            color: #94a3b8;
        }

        .sidebar a {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 12px 14px;
            margin-top: 10px;
            border-radius: 12px;
            text-decoration: none;
            color: #cbd5f5;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #1e293b;
            color: #38bdf8;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 260px;
            padding: 40px;
        }

        .card {
            background-color: #020617;
            border: 1px solid #1e293b;
            border-radius: 18px;
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        .badge-category {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #38bdf8;
            font-size: 14px;
        }

        .keluhan-card {
            background-color: #020617;
            border: 1px solid #1e293b;
            border-radius: 14px;
            padding: 22px;
            height: 100%;
            transition: 0.2s;
            cursor: pointer;
        }

        .keluhan-card:hover {
            border-color: #38bdf8;
            transform: translateY(-4px);
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

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">🩺 Konsultasi Pasien</h3>
        <p class="text-muted">
            Layanan konsultasi medis digital bersama dokter Smart Clinic
        </p>
    </div>

    <!-- INFO USER -->
    <div class="card p-4 mb-4">
        <h5 class="fw-semibold">👋 Halo, {{ auth()->user()->name }}</h5>
        <p class="text-muted mb-0">
            Silakan pilih kategori keluhan untuk memulai konsultasi
        </p>
    </div>

    <!-- KATEGORI -->
    <div class="mb-3">
        <span class="badge badge-category px-3 py-2">Kategori Keluhan</span>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>🤒 Keluhan Umum</h5>
                    <p class="text-muted mb-0">Demam, batuk, flu, pusing</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>❤️ Penyakit Dalam</h5>
                    <p class="text-muted mb-0">Darah tinggi, maag, diabetes</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>🧠 Kesehatan Mental</h5>
                    <p class="text-muted mb-0">Stres, cemas, insomnia</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>🩹 Luka & Cedera</h5>
                    <p class="text-muted mb-0">Luka ringan, nyeri otot</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>👶 Kesehatan Anak</h5>
                    <p class="text-muted mb-0">Demam anak, imunisasi</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none text-light">
                <div class="keluhan-card">
                    <h5>🧪 Hasil Pemeriksaan</h5>
                    <p class="text-muted mb-0">Diskusi hasil lab</p>
                </div>
            </a>
        </div>

    </div>

    <div class="alert alert-info mt-4">
        💬 Fitur chat langsung dengan dokter akan segera tersedia.
    </div>

</div>

</body>
</html>
