<?php

namespace Database\Seeders;

use App\Models\SiswaAuth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaAuthSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua siswa yang belum punya akun
        $siswa = \App\Models\Siswa::whereNotExists(function ($query) {
            $query->select('*')
                  ->from('siswa_auth')
                  ->whereColumn('siswa_auth.siswa_id', 'siswas.id');
        })->get();

        foreach ($siswa as $s) {
            SiswaAuth::create([
                'siswa_id' => $s->id,
                'username' => strtolower(str_replace(' ', '', $s->nis)), // NIS sebagai username
                'password' => Hash::make($s->nis), // NIS sebagai password default
            ]);
        }
    }
} 