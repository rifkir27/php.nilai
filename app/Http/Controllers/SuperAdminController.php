<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\SiswaAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $gurus = User::where('role', 'guru')->get();
        $siswas = Siswa::with('siswaAuth')->get();
        return view('super_admin.index', compact('gurus', 'siswas'));
    }

    public function createGuru()
    {
        return view('super_admin.guru.create');
    }

    public function storeGuru(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'nip' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru'
        ]);

        return redirect()->route('super_admin.index')
            ->with('success', 'Akun guru berhasil dibuat');
    }

    public function createSiswa()
    {
        return view('super_admin.siswa.create');
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'required|numeric|between:1,6'
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas
        ]);

        // Buat akun login siswa
        SiswaAuth::create([
            'siswa_id' => $siswa->id,
            'username' => $request->nis,
            'password' => Hash::make($request->nis) // Password default adalah NIS
        ]);

        return redirect()->route('super_admin.index')
            ->with('success', 'Akun siswa berhasil dibuat');
    }
} 