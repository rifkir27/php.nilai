<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaNilaiController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('siswa')->user()->siswa;
        return view('siswa.nilai.index', compact('siswa'));
    }
} 