<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('pasien.konsultasi');
    }
}

