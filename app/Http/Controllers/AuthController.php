<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Contoh autentikasi manual (bisa pakai Auth::attempt jika pakai sistem auth Laravel)
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin123') {
            Session::put('is_admin', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function dashboard()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('is_admin');
        return redirect()->route('login');
    }
}
