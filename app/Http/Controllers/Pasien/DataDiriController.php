<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function edit()
    {
        return view('pasien.data-diri', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);



        return back()->with('success', 'Data diri berhasil diperbarui');
    }
}
