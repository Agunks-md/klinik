@extends('layouts.admin')

@section('title', 'Data Pasien | Smart Clinic')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data Pasien</h3>
            <p class="text-muted mb-0">
                Daftar seluruh pasien yang terdaftar pada sistem Smart Clinic
            </p>
        </div>

        <a href="{{ route('admin.pasien.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pasien
        </a>
    </div>

    {{-- STAT CARDS (SEPERTI DASHBOARD) --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <small class="text-muted">Total Pasien</small>
                <h3 class="fw-bold mb-0">{{ $pasien->count() }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <small class="text-muted">Pasien Hari Ini</small>
                <h3 class="fw-bold text-success mb-0">
                    {{ $pasien->where('created_at', '>=', now()->startOfDay())->count() }}
                </h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <small class="text-muted">Total Akun Aktif</small>
                <h3 class="fw-bold text-primary mb-0">
                    {{ $pasien->count() }}
                </h3>
            </div>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            {{-- SEARCH --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text"
                           class="form-control rounded-pill"
                           placeholder="🔍 Cari nama pasien...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Pasien</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center" width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pasien as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">
                                    {{ $item->name }}
                                </td>
                                <td class="text-muted">
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->created_at->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pasien.show', $item->id) }}"
                                       class="btn btn-sm btn-outline-primary rounded-circle">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.pasien.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus pasien ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-circle">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    <i class="bi bi-people fs-3 d-block mb-2"></i>
                                    Belum ada data pasien
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
    