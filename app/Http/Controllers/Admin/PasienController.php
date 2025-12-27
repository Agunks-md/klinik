<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = User::where('role', 'pasien')->latest()->get();
        return view('admin.pasien.index', compact('pasien'));
    }

    public function show($id)
    {
        $pasien = User::findOrFail($id);
        return view('admin.pasien.show', compact('pasien'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}
