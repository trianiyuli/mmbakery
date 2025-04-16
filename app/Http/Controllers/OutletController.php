<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    //
    public function index()
    {
        // $outlets = Outlet::all();
        
        // if ($outlets->isEmpty()) {
        //     return view('pages.outlet', ['outlets' => []]); // Pastikan tidak null
        // }
    
        // return view('pages.outlet', compact('outlets'));
        $outlets = Outlet::all()->map(function ($outlet) {
            return [
                'name' => $outlet->name,
                'address' => $outlet->address,
                'lat' => (float) $outlet->lat, // Pastikan float
                'lng' => (float) $outlet->lng  // Pastikan float
            ];
        });
        
        return view('pages.outlet', compact('outlets'));
    }
    public function test() {
        
    }
}
