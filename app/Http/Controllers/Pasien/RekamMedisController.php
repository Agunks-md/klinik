<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public function index()
    {
        return view('pasien.rekam-medis', [
            'user' => Auth::user()
        ]);
    }
}
