<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kelas
        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('kelas', $request->kelas);
        }

        // Filter berdasarkan jenis kelamin
        if ($request->has('jenis_kelamin') && $request->jenis_kelamin != '') {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Ambil opsi kelas untuk dropdown
        $kelasOptions = Siswa::distinct()->pluck('kelas')->sort();

        // Pagination
        $siswa = $query->orderBy('nama')->paginate(10);

        return view('siswa.index', compact('siswa', 'kelasOptions'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis',
            'kelas' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        try {
            $siswa = new Siswa();
            $siswa->nama = $request->nama;
            $siswa->nis = $request->nis;
            $siswa->kelas = $request->kelas;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            // Set nilai default 0 untuk field nilai
            $siswa->nilai_harian = 0;
            $siswa->ulangan_1 = 0;
            $siswa->ulangan_2 = 0;
            $siswa->nilai_akhir = 0;
            $siswa->rata_rata = 0;
            $siswa->save();

            return redirect()->route('siswa.index')
                ->with('success', 'Siswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $id,
            'kelas' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nilai_harian' => 'nullable|numeric|min:0|max:100',
            'ulangan_1' => 'nullable|numeric|min:0|max:100',
            'ulangan_2' => 'nullable|numeric|min:0|max:100',
        ]);

        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->nama = $request->nama;
            $siswa->nis = $request->nis;
            $siswa->kelas = $request->kelas;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            
            // Update nilai
            $siswa->nilai_harian = $request->nilai_harian ?? 0;
            $siswa->ulangan_1 = $request->ulangan_1 ?? 0;
            $siswa->ulangan_2 = $request->ulangan_2 ?? 0;
            
            // Hitung nilai akhir (30% NH + 35% UH1 + 35% UH2)
            $siswa->nilai_akhir = ($siswa->nilai_harian * 0.3) + 
                                 ($siswa->ulangan_1 * 0.35) + 
                                 ($siswa->ulangan_2 * 0.35);
            
            // Hitung rata-rata
            $siswa->rata_rata = ($siswa->nilai_harian + 
                                $siswa->ulangan_1 + 
                                $siswa->ulangan_2) / 3;
            
            $siswa->save();

            return redirect()->route('siswa.index')
                ->with('success', 'Data siswa berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
