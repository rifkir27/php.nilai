@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Statistik Utama -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <h2>{{ $totalSiswa }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <h2>{{ $totalGuru }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata Nilai</h5>
                    <h2>{{ number_format($rataRataNilai, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Grafik Distribusi Nilai -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Distribusi Nilai</h5>
                </div>
                <div class="card-body">
                    <canvas id="nilaiChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Statistik per Mata Pelajaran -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Statistik per Mata Pelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Rata-rata</th>
                                    <th>Tertinggi</th>
                                    <th>Terendah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistikMapel as $mapel)
                                <tr>
                                    <td>{{ $mapel->mata_pelajaran }}</td>
                                    <td>{{ number_format($mapel->rata_rata, 2) }}</td>
                                    <td>{{ number_format($mapel->tertinggi, 2) }}</td>
                                    <td>{{ number_format($mapel->terendah, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('nilaiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['A (85-100)', 'B (70-84)', 'C (55-69)', 'D (40-54)', 'E (<40)'],
            datasets: [{
                label: 'Jumlah Siswa',
                data: {{ json_encode($distribusiNilai) }},
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endpush
@endsection
