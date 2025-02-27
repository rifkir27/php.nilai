<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total siswa
        $totalSiswa = Siswa::count();
        $totalGuru = User::where('role', 'guru')->count();

        // Statistik nilai
        $rataRataNilai = Nilai::avg('nilai_akhir') ?? 0;
        $nilaiTertinggi = Nilai::max('nilai_akhir') ?? 0;
        $nilaiTerendah = Nilai::min('nilai_akhir') ?? 0;

        // Statistik per mata pelajaran
        $statistikMapel = DB::table('nilais')
            ->select('mata_pelajaran', 
                DB::raw('AVG(nilai_akhir) as rata_rata'),
                DB::raw('MAX(nilai_akhir) as tertinggi'),
                DB::raw('MIN(nilai_akhir) as terendah'))
            ->groupBy('mata_pelajaran')
            ->get();

        // Data untuk grafik distribusi nilai
        $distribusiNilai = [
            Nilai::where('nilai_akhir', '>=', 85)->count(), // A
            Nilai::whereBetween('nilai_akhir', [70, 84.99])->count(), // B
            Nilai::whereBetween('nilai_akhir', [55, 69.99])->count(), // C
            Nilai::whereBetween('nilai_akhir', [40, 54.99])->count(), // D
            Nilai::where('nilai_akhir', '<', 40)->count(), // E
        ];

        return view('dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'rataRataNilai',
            'nilaiTertinggi',
            'nilaiTerendah',
            'statistikMapel',
            'distribusiNilai'
        ));
    }
} 