<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
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
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Session::put('is_admin', true);
            Session::put('user_id', $user->id);
            Session::put('role', $user->role);
            return redirect()->route('admin.dashboard');
        }
    
        return back()->with('error', 'Email atau password salah.');
    }

    public function index()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return response()
        ->view('admin.dashboard')
        ->header('Cache-Control','no-cache, no-store, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','0');
    }
    public function products()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return response()
        ->view('admin.products')
        ->header('Cache-Control','no-cache, no-store, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','0');
    }
    public function users()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return response()
        ->view('admin.users')
        ->header('Cache-Control','no-cache, no-store, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','0');
    }
    public function settings()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return response()
        ->view('admin.settings')
        ->header('Cache-Control','no-cache, no-store, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','0');
    }
    public function reports()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return response()
        ->view('admin.reports')
        ->header('Cache-Control','no-cache, no-store, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','0');
    }

    public function logout()
    {
        Session::forget('is_admin');
        return redirect()->route('login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
