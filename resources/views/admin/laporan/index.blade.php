@extends('layouts.admin')

@section('title', 'Laporan | Smart Clinic')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Laporan Sistem</h3>
        <p class="text-muted mb-0">
            Ringkasan dan laporan data operasional Smart Clinic
        </p>
    </div>

    <button class="btn btn-outline-primary rounded-pill px-4">
        <i class="bi bi-printer me-1"></i> Cetak Laporan
    </button>
</div>

{{-- STAT CARD --}}
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Total Pasien</small>
            <h3 class="fw-bold mb-0">120</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Total Dokter</small>
            <h3 class="fw-bold mb-0">8</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Konsultasi</small>
            <h3 class="fw-bold mb-0">256</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <small class="text-muted">Sensor Aktif</small>
            <h3 class="fw-bold mb-0">6</h3>
        </div>
    </div>

</div>

{{-- TABLE LAPORAN --}}
<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">

        <h5 class="fw-semibold mb-3">Laporan Data Sistem</h5>

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Jenis Laporan</th>
                        <th>Keterangan</th>
                        <th>Terakhir Update</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="fw-semibold">Laporan Data Pasien</td>
                        <td>Data pasien yang terdaftar</td>
                        <td>Hari ini</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-pill">
                                Lihat
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="fw-semibold">Laporan Data Dokter</td>
                        <td>Data dokter dan spesialis</td>
                        <td>Hari ini</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-pill">
                                Lihat
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td class="fw-semibold">Laporan Monitoring IoT</td>
                        <td>Rekap data sensor IoT</td>
                        <td>Hari ini</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-pill">
                                Lihat
                            </button>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>

{{-- PENJELASAN LAPORAN --}}
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-semibold mb-3">Penjelasan Menu Laporan</h5>

    <p class="text-muted mb-2">
        Menu <b>Laporan</b> digunakan untuk menampilkan ringkasan data
        operasional yang ada pada sistem Smart Clinic.
    </p>

    <ul class="text-muted mb-0">
        <li>
            <b>Laporan Data Pasien</b> berisi informasi jumlah dan
            identitas pasien yang terdaftar di sistem.
        </li>
        <li>
            <b>Laporan Data Dokter</b> berisi data dokter, spesialis,
            dan status keaktifan dokter.
        </li>
        <li>
            <b>Laporan Monitoring IoT</b> berisi rekap data sensor
            suhu, asap, dan api sebagai monitoring keamanan klinik.
        </li>
        <li>
            Laporan dapat digunakan sebagai bahan evaluasi,
            dokumentasi, dan pengambilan keputusan oleh pimpinan klinik.
        </li>
    </ul>
</div>

@endsection
