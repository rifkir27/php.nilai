@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Data Nilai Siswa</h5>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="150">Nama</td>
                            <td width="20">:</td>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $siswa->kelas }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nilai Harian</th>
                        <th>Ulangan 1</th>
                        <th>Ulangan 2</th>
                        <th>Nilai Akhir</th>
                        <th>Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ number_format($siswa->nilai_harian, 2) }}</td>
                        <td>{{ number_format($siswa->ulangan_1, 2) }}</td>
                        <td>{{ number_format($siswa->ulangan_2, 2) }}</td>
                        <td>{{ number_format($siswa->nilai_akhir, 2) }}</td>
                        <td>{{ number_format($siswa->rata_rata, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 