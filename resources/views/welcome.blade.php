<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Smart Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0b1220;
            color: #e5e7eb;
        }

        /* NAVBAR */
        .navbar {
            background-color: #0f172a;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
        }

        /* JARAK KARENA NAVBAR FIXED */
        .page-content {
            padding-top: 80px;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e3a8a, #020617);
            padding: 100px 20px;
            text-align: center;
        }

        .hero h1 {
            font-weight: 700;
            color: #ffffff;
        }

        .hero p {
            color: #cbd5f5;
            max-width: 600px;
            margin: 0 auto;
        }

        /* FEATURE */
        .feature-card {
            background: #020617;
            border-radius: 16px;
            border: 1px solid #1e293b;
            padding: 24px;
            height: 100%;
        }

        footer {
            background: #020617;
            color: #94a3b8;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="/">🏥 Smart Clinic</a>

        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                Daftar
            </a>
        </div>
    </div>
</nav>

<div class="page-content">

    <!-- HERO -->
    <section class="hero">
        <h1 class="mb-3">Smart Clinic Digital</h1>
        <p class="fs-5">
            Sistem Klinik Digital Terintegrasi <b>IoT</b><br>
            Monitoring Pasien Secara Real-Time
        </p>
    </section>

    <!-- FITUR -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Fitur Unggulan</h2>
                <p class="text-secondary">Teknologi modern untuk klinik masa depan</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="fs-1 mb-3">👨‍⚕️</div>
                        <h5 class="fw-bold">Dashboard Pasien</h5>
                        <p class="text-secondary">
                            Akses data kesehatan & konsultasi digital kapan saja.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="fs-1 mb-3">🩺</div>
                        <h5 class="fw-bold">Tenaga Medis</h5>
                        <p class="text-secondary">
                            Monitoring pasien dan diagnosa berbasis data.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="fs-1 mb-3">📡</div>
                        <h5 class="fw-bold">IoT Monitoring</h5>
                        <p class="text-secondary">
                            Sensor suhu, asap & api untuk keamanan klinik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-4 text-center">
        <div class="container">
            <small>
                © {{ date('Y') }} Smart Clinic IoT • Laravel System
            </small>
        </div>
    </footer>

</div>

</body>
</html>
