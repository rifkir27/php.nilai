<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('nilai')->get(); // Ambil semua data siswa beserta nilai yang terkait
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create'); // Tampilkan form untuk menambah siswa
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'kelas' => 'required|string|max:10',
            'nis' => 'required|string|max:20|unique:siswas,nis', // Validasi NIS harus unik
            'nilai_harian' => 'required|numeric', // Validasi nilai harian
            'ulangan_harian_1' => 'required|numeric', // Validasi ulangan harian 1
            'ulangan_harian_2' => 'required|numeric', // Validasi ulangan harian 2
            'nilai_akhir_semester' => 'required|numeric', // Validasi nilai akhir semester
        ]);

        // Simpan siswa ke tabel siswa
        $siswa = Siswa::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'nis' => $request->nis, // Menyimpan NIS
        ]);

        // Debugging untuk memastikan siswa disimpan
        dd($siswa);

        // Simpan nilai ke tabel nilai
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

        return redirect()->route('siswa.index')->with('success', 'Siswa dan nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Temukan siswa berdasarkan ID
        return view('siswa.edit', compact('siswa')); // Tampilkan form edit dengan data siswa
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $id, // Validasi NIS, kecuali untuk siswa yang sama
            'kelas' => 'required|string|max:50', // Validasi kelas
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan', // Validasi jenis kelamin
            'siswa_nama' => 'required|string|exists:siswa,nama', // Validasi nama siswa
        ]);

        // Temukan siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);
        
        // Update data siswa
        $siswa->update($request->only(['nama', 'nis', 'kelas', 'jenis_kelamin']));

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}