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
        $totalSiswa = Siswa::count();
        $rataRataNilai = Nilai::avg('nilai_akhir');

        // Mengambil statistik per mata pelajaran
        $statistik = Nilai::select('mata_pelajaran')
            ->selectRaw('AVG(nilai_akhir) as rata_rata, MAX(nilai_akhir) as tertinggi, MIN(nilai_akhir) as terendah')
            ->groupBy('mata_pelajaran')
            ->get();

        return view('dashboard', compact('totalSiswa', 'rataRataNilai', 'statistik'));
    }
} 