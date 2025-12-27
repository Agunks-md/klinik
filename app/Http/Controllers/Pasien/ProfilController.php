<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // tampilkan form data diri
    public function edit()
    {
        return view('pasien.data-diri', [
            'user' => Auth::user()
        ]);
    }

    // simpan update data diri
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Data diri berhasil diperbarui');
    }
}
