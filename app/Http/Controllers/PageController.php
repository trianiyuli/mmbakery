<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Product;

class PageController extends Controller
{
    public function home() {
        $featuredProducts = Product::where('unggulan', true)
                                  ->orderBy('created_at', 'desc')
                                  ->take(3)
                                  ->get();
        
        return view('pages.home', compact('featuredProducts'));
    }

    public function produk() {
        $products = Product::all();
        return view('pages.produk', ['products' => $products]);
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
