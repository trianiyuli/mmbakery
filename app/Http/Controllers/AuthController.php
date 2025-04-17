<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('username', 'password');
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Session::put('is_admin', true);
            Session::put('user_id', $user->id);
            Session::put('role', $user->role); // bisa digunakan untuk hak akses
            return redirect()->route('admin.dashboard');
        }
    
        return back()->with('error', 'Email atau password salah.');

        // Contoh autentikasi manual (bisa pakai Auth::attempt jika pakai sistem auth Laravel)
        // if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin123') {
        //     Session::put('is_admin', true);
        //     return redirect()->route('admin.dashboard');
        // }

        // return back()->with('error', 'Username atau password salah.');
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
