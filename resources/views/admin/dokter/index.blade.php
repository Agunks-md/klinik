@extends('layouts.admin')

@section('title', 'Data Dokter | Smart Clinic')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Data Dokter</h3>
        <p class="text-muted mb-0">Manajemen data dokter Smart Clinic</p>
    </div>

    <a href="#" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-circle me-1"></i> Tambah Dokter
    </a>
</div>

{{-- STAT CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Total Dokter</small>
            <h3 class="fw-bold mb-0">8</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Dokter Aktif</small>
            <h3 class="fw-bold text-success mb-0">6</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Dokter Nonaktif</small>
            <h3 class="fw-bold text-secondary mb-0">2</h3>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">

        {{-- SEARCH --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control rounded-pill"
                       placeholder="🔍 Cari nama dokter...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>No. HP</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="fw-semibold">Dr. Nisa</td>
                        <td>Penyakit Dalam</td>
                        <td>0812xxxxxxx</td>
                        <td>
                            <span class="badge rounded-pill bg-success">
                                Aktif
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-circle">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-warning rounded-circle">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="fw-semibold">Dr. Andi</td>
                        <td>Anak</td>
                        <td>0821xxxxxxx</td>
                        <td>
                            <span class="badge rounded-pill bg-secondary">
                                Nonaktif
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-circle">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-warning rounded-circle">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-end mt-3">
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                        <span class="page-link">‹</span>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                        <span class="page-link">2</span>
                    </li>
                    <li class="page-item">
                        <span class="page-link">›</span>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>

@endsection
