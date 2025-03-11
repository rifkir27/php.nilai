<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('super_admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->isSuperAdmin()) {
                $request->session()->regenerate();
                return redirect()->route('super_admin.index');
            }
            
            Auth::logout();
            return back()->with('error', 'Akses ditolak. Anda bukan Super Admin.');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('super_admin.login');
    }
} 