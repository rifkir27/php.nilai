@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Siswa</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalSiswa }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Rata-rata Nilai</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($rataRataNilai, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghapus bagian Statistik per Mata Pelajaran -->
    <!-- <h3>Statistik per Mata Pelajaran</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Rata-rata</th>
                <th>Tertinggi</th>
                <th>Terendah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistik as $data)
                <tr>
                    <td>{{ $data->mata_pelajaran }}</td>
                    <td>{{ number_format($data->rata_rata, 2) }}</td>
                    <td>{{ $data->tertinggi }}</td>
                    <td>{{ $data->terendah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> -->
</div>
@endsection
