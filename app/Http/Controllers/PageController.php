<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function produk() {
        return view('pages.produk');
    }

    public function tentang() {
        return view('pages.tentang');
    }

    public function outlet() {
        return view('pages.outlet');
    }

    public function kontak() {
        return view('pages.kontak');
    }
    public function test() {
        
    }
}
