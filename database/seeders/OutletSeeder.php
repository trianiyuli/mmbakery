<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    public function run()
    {
        Outlet::create([
            'name' => 'Outlet Kota X',
            'address' => 'Jalan A No.1, Kota X',
            'lat' => -6.200000,
            'lng' => 106.816666
        ]);

        Outlet::create([
            'name' => 'Outlet Kota Y',
            'address' => 'Jalan B No.2, Kota Y',
            'lat' => -7.250445,
            'lng' => 112.768845
        ]);
    }
}