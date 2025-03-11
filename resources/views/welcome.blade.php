<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #e3f2fd; /* Warna latar belakang biru muda */
            color: #0d47a1; /* Warna teks biru tua */
        }
        .container {
            margin-top: 100px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff; /* Warna latar belakang putih untuk kontainer */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek kedalaman */
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .btn {
            margin: 10px;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px; /* Sudut tombol yang membulat */
            transition: background-color 0.3s; /* Transisi untuk efek hover */
        }
        .btn-primary {
            background-color: #1976d2; /* Warna biru untuk tombol login */
            color: white;
        }
        .btn-primary:hover {
            background-color: #1565c0; /* Warna biru lebih gelap saat hover */
        }
        .btn-success {
            background-color: #43a047; /* Warna hijau untuk tombol daftar */
            color: white;
        }
        .btn-success:hover {
            background-color: #388e3c; /* Warna hijau lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Aplikasi Penilaian Siswa</h1>
        <div class="mt-4">
            <a href="{{ route('login.form') }}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="{{ route('register') }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Daftar</a>
        </div>
    </div>
</body>
</html>