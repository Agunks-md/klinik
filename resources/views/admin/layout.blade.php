<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Smart Clinic')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #0a2a66;
        }
        .sidebar a {
            color: #cfd8ff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #0d6efd;
            color: #fff;
        }
        .content {
            margin-left: 250px;
        }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar position-fixed p-3">
    <h4 class="text-white mb-4">🏥 Admin Klinik</h4>

    <ul class="nav flex-column gap-1">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="...">Data Pasien</a>

<form method="POST" action="{{ route('logout') }}">
  @csrf
  <button>Logout</button>
</form>

        </li>
       <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.dokter') ? 'active' : '' }}"
       href="{{ route('admin.dokter') }}">
        <i class="bi bi-person-badge me-2"></i> Data Dokter
    </a>
</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-chat-dots"></i> Konsultasi
            </a>
        </li>
    </ul>
</div>

{{-- CONTENT --}}
<div class="content">
    {{-- NAVBAR --}}
    <nav class="navbar navbar-light bg-white shadow-sm px-4">
        <span class="navbar-brand">Panel Admin</span>

        <div class="dropdown">
            <a class="dropdown-toggle text-decoration-none" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-person-circle"></i> Admin
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <main class="p-4">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
