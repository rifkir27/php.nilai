<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Temukan siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->update($request->all());

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }
} 