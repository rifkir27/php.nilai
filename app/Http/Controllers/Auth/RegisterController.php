<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Tampilkan form pendaftaran
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $user = $this->create($request->all());

        // Login pengguna setelah pendaftaran
        auth()->login($user);

        // Redirect ke halaman yang diinginkan, misalnya ke halaman login
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
