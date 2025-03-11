<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/', function () {
    return view('welcome'); // Rute untuk halaman utama

});




Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');



Route::resource('siswa', SiswaController::class); // Rute untuk CRUD siswa
Route::resource('nilai', NilaiController::class); // Rute untuk CRUD nilai

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

Route::get('/home', function () {
    return view('home'); // Mengarahkan ke view home
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
