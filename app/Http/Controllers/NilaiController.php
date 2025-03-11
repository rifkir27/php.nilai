<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = Nilai::all();
        return view('nilai.index', compact('nilai'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all(); // Ambil semua siswa dari tabel siswa
        return view('nilai.create', compact('siswa')); // Kirim data siswa ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all()); // Debugging untuk melihat data yang diterima
        // Validasi input
        request->validate([
            'siswa_nama' => 'required|string|exists:siswa,nama', // Validasi nama siswa
            'nilai_harian' => 'required|numeric', // Validasi nilai harian
            'ulangan_harian_1' => 'required|numeric', // Validasi ulangan harian 1
            'ulangan_harian_2' => 'required|numeric', // Validasi ulangan harian 2
            'nilai_akhir_semester' => 'required|numeric', // Validasi nilai akhir semester
        ]);

        // Cari siswa berdasarkan nama
        $siswa = Siswa::where('nama', $request->siswa_nama)->first();

        if (!$siswa) {
            return back()->withErrors(['siswa_nama' => 'Siswa tidak ditemukan.']);
        }

        // Simpan nilai
        Nilai::create([
            'siswa_id' => $siswa->id,
            'jenis' => 'harian',
            'nilai' => $request->nilai_harian,
        ]);

        Nilai::create([
            'siswa_id' => $siswa->id,
            'jenis' => 'ulangan_harian_1',
            'nilai' => $request->ulangan_harian_1,
        ]);

        Nilai::create([
            'siswa_id' => $siswa->id,
            'jenis' => 'ulangan_harian_2',
            'nilai' => $request->ulangan_harian_2,
        ]);

        Nilai::create([
            'siswa_id' => $siswa->id,
            'jenis' => 'akhir_semester',
            'nilai' => $request->nilai_akhir_semester,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Nilai berhasil ditambahkan.');
    }
    public function show($id)
    {
        $nilai = Nilai::with('siswa')->findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Temukan nilai berdasarkan ID
        $nilai = Nilai::find($id);

        // Cek apakah nilai ditemukan
        if (!$nilai) {
            return redirect()->route('nilai.index')->with('error', 'Data nilai tidak ditemukan.');
        }

        // Ambil semua siswa untuk ditampilkan di dropdown
        $siswas = Siswa::all();

        return view('nilai.edit', compact('nilai', 'siswas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id', // Pastikan siswa_id ada di tabel siswa
            'nilai' => 'required|numeric', // Pastikan nilai adalah angka
        ]);

        // Temukan nilai berdasarkan ID
        $nilai = Nilai::findOrFail($id);

        // Update data nilai
        $nilai->update($request->all());

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan nilai berdasarkan ID
        $nilai = Nilai::findOrFail($id);

        // Hapus data nilai
        $nilai->delete();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }
}
