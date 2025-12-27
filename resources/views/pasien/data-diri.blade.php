<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Diri Pasien | Smart Clinic</title>

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

        /* SIDEBAR */
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
        }

        .sidebar a {
            display: block;
            padding: 12px 16px;
            margin-bottom: 8px;
            color: #cbd5f5;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #1e293b;
            color: #38bdf8;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            padding: 40px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .card {
            background-color: #020617;
            border: 1px solid #1e293b;
            border-radius: 16px;
        }

        .form-control {
            background-color: #020617;
            border: 1px solid #334155;
            color: #e5e7eb;
        }

        .form-control:focus {
            background-color: #020617;
            color: #fff;
            border-color: #38bdf8;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #38bdf8;
            border: none;
            color: #020617;
            font-weight: 600;
        }

        .btn-secondary {
            background-color: #334155;
            border: none;
        }

        .alert-success {
            background-color: #052e1c;
            border: 1px solid #22c55e;
            color: #86efac;
        }

        .form-text {
            color: #94a3b8;
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

<!-- MAIN -->
<div class="main">

    <div class="mb-4">
        <div class="page-title">📋 Data Diri Pasien</div>
        <div class="page-subtitle">
            Kelola informasi akun dan identitas pasien Anda
        </div>
    </div>

    <div class="card p-4 col-md-6">

        @if(session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pasien.data-diri.update') }}">
            @csrf

            <!-- NAMA -->
            <div class="mb-3">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $user->name) }}">
                <div class="form-text">
                    Nama sesuai identitas resmi (KTP / KK)
                </div>
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Alamat Email Aktif</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $user->email) }}">
                <div class="form-text">
                    Digunakan untuk login dan pemberitahuan sistem
                </div>
            </div>

            <!-- NO HP -->
            <div class="mb-4">
                <label class="form-label">Nomor Handphone (WhatsApp Aktif)</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone', $user->phone) }}">
                <div class="form-text">
                    Digunakan untuk notifikasi & konfirmasi layanan
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary px-4">💾 Simpan Perubahan</button>
                <a href="/dashboard-pasien" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>

</div>

</body>
</html>
