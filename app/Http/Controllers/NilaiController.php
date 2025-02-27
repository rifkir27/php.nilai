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
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
    return view('nilai.create', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'nilai_harian' => 'required|numeric',
            'ulangan_1' => 'required|numeric',
            'ulangan_2' => 'required|numeric',
            'nilai_akhir' => 'required|numeric',
        ]);
    
        Nilai::create($request->all());
    
        return redirect()->route('nilai.index');
    }

    /**
     * Display the specified resource.
     */
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
    $nilai = Nilai::findOrFail($id);
    $siswas = Siswa::all();
    return view('nilai.edit', compact('nilai', 'siswas'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'siswa_id' => 'required',
        'nilai_harian' => 'required|numeric',
        'ulangan_1' => 'required|numeric',
        'ulangan_2' => 'required|numeric',
        'nilai_akhir' => 'required|numeric',
    ]);

    $nilai = Nilai::findOrFail($id);
    $nilai->update($request->all());

    return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
