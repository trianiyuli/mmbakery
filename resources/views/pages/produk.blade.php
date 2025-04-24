@extends('layouts.app')

@section('title', 'Produk - MM Bakery')

@section('content')
<div class="bg-purple-50 min-h-screen py-12">
    <section id="produk" class="container mx-auto px-4">
        <!-- Heading Section -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Produk Kami</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto"></div>
            <p class="mt-4 text-gray-600">Temukan berbagai macam produk roti dan kue berkualitas kami</p>
        </div>

        <!-- Tab Kategori -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button class="kategori-btn active px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('all')">Semua</button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('roti')">Roti Manis</button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('donat')">Donat</button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('cake')">Cake</button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('pizza')">Pizza</button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300" onclick="filterProduk('tart')">Tart</button>
        </div>

        <!-- Daftar Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $produkList = [
                    ['Rainbow Roll Cake', 30000, 'produk1.jpg', 'cake'],
                    ['Lapis Surabaya', 65000, 'produk2.jpg', 'cake'],
                    ['Donat Mesis', 4000, 'produk3.jpg', 'donat'],
                    ['Pizza Keju', 5000, 'pizza.jpg', 'pizza'],
                    ['Tart Coklat', 95000, 'tart.jpg', 'tart'],
                    ['Pisang Coklat', 4000, 'rotimanis.jpg', 'roti']
                ];
            @endphp

            @foreach($produkList as $produk)
            <div class="produk-item" data-category="{{ $produk[3] }}">
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <!-- Produk Image -->
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('images/produk/'.$produk[2]) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" 
                             alt="{{ $produk[0] }}">
                    </div>
                    
                    <!-- Produk Body -->
                    <div class="p-6 text-center">
                        <h5 class="text-xl font-bold text-gray-800 mb-2">{{ $produk[0] }}</h5>
                        <p class="text-lg font-semibold text-purple-600 mb-4">Rp {{ number_format($produk[1], 0, ',', '.') }}</p>
                        <button class="btn-buy px-6 py-2 rounded-full font-medium transition-all duration-300">
                            Beli Sekarang
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<!-- Custom Style untuk komponen tertentu -->
<style>
    /* Kategori Button */
    .kategori-btn {
        background-color: #E9D5FF;
        color: #6B21A8;
    }
    
    .kategori-btn.active, .kategori-btn:hover {
        background-color: #6B21A8;
        color: white;
        transform: scale(1.05);
    }
    
    /* Beli Button */
    .btn-buy {
        background-color: #6B21A8;
        color: white;
    }
    
    .btn-buy:hover {
        background-color: #7E22CE;
        transform: translateY(-2px);
    }
</style>

<!-- Script Filter Kategori -->
<script>
    function filterProduk(category) {
        let items = document.querySelectorAll('.produk-item');
        let buttons = document.querySelectorAll('.kategori-btn');

        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });

        buttons.forEach(btn => btn.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }
</script>
@endsection