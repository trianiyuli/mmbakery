<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'nama' => 'Roti Manis Coklat',
            'harga' => 8000,
            'gambar' => 'roti-coklat.jpg',
            'kategori' => 'roti-manis',
            'unggulan' => true,
            'deskripsi' => 'Roti manis isi coklat lembut dan enak.',
        ]);

        Product::create([
            'nama' => 'Donat Gula',
            'harga' => 5000,
            'gambar' => 'donat-gula.jpg',
            'kategori' => 'donat',
            'unggulan' => true,
            'deskripsi' => 'Donat klasik dengan taburan gula halus.',
        ]);

        Product::create([
            'nama' => 'Cake Coklat',
            'harga' => 15000,
            'gambar' => 'cake-coklat.jpg',
            'kategori' => 'cake',
            'unggulan' => false,
            'deskripsi' => 'Cake coklat lembut dengan topping coklat leleh.',
        ]);
    }
}
