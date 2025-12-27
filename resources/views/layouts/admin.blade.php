<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Smart Clinic')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg,#0b1220,#0f172a);
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }

        .sidebar h4 {
            color: #fff;
            margin-bottom: 24px;
        }

        .sidebar a {
            display: block;
            padding: 12px 16px;
            color: #cbd5f5;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 6px;
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.1);
            color: #fff;
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 28px;
        }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">
    <h4>🏥 Smart Clinic</h4>

    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('admin.pasien.index') }}"
       class="{{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
        Data Pasien
    </a>

    <a href="{{ route('admin.dokter') }}"
       class="{{ request()->routeIs('admin.dokter*') ? 'active' : '' }}">
        Data Dokter
    </a>

    <a href="{{ route('admin.monitoring') }}"
   class="{{ request()->routeIs('admin.monitoring') ? 'active' : '' }}">
   Monitoring IoT
</a>

    <a href="{{ route('admin.laporan') }}"
   class="{{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
   Laporan
</a>


    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button class="btn btn-outline-light w-100 btn-sm">
            Logout
        </button>
    </form>
</div>

{{-- CONTENT --}}
<div class="content">
    @yield('content')
</div>

</body>
</html>
