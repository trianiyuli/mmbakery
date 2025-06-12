@extends('layouts.app')

@section('title', 'Produk - MM Bakery')

@section('content')
@include('pages.components.produk.detail-produk')
@include('pages.components.produk.order')
<div class="bg-gradient-to-b from-purple-50 to-white min-h-screen py-12">
    <section id="produk" class="container mx-auto px-4">
        <!-- Heading Section -->
        <div class="text-center mb-8 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-2">Produk Kami</h2>
            <div class="w-16 sm:w-24 h-1 bg-purple-500 mx-auto mb-4"></div>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto px-4">Temukan berbagai macam produk roti dan kue berkualitas kami yang dibuat dengan bahan premium dan penuh cinta</p>
        </div>

        <!-- Tab Kategori -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button class="kategori-btn active px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-purple-600 text-white" onclick="filterProduk('all')">
                Semua
            </button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-white hover:bg-purple-100 text-gray-800" onclick="filterProduk('roti-manis')">
                Roti Manis
            </button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-white hover:bg-purple-100 text-gray-800" onclick="filterProduk('donat')">
                Donat
            </button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-white hover:bg-purple-100 text-gray-800" onclick="filterProduk('cake')">
                Cake
            </button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-white hover:bg-purple-100 text-gray-800" onclick="filterProduk('pizza')">
                Pizza
            </button>
            <button class="kategori-btn px-6 py-2 rounded-full font-medium transition-all duration-300 shadow-sm cursor-pointer bg-white hover:bg-purple-100 text-gray-800" onclick="filterProduk('tart')">
                Tart
            </button>
        </div>

        <!-- Daftar Produk -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6 lg:gap-8">
            @foreach($products as $product)
            <div class="produk-item" data-category="{{ $product->kategori }}" data-id="{{ $product->id }}">
                <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group">
                    <!-- Produk Image -->
                    <div class="h-40 sm:h-48 md:h-56 lg:h-64 overflow-hidden relative">
                        <img src="{{ asset('storage/'.$product->gambar) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                             alt="{{ $product->nama }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <button onclick="showDetailModal({{ json_encode($product) }})" 
                                class="absolute top-1 right-1 sm:top-2 sm:right-2 bg-white/80 hover:bg-white text-purple-800 font-bold p-1 sm:py-1 sm:px-3 rounded-full transition-all duration-300 cursor-pointer shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        @if($product->unggulan)
                        <span class="absolute top-1 left-1 sm:top-2 sm:left-2 bg-yellow-400 text-yellow-900 text-[10px] sm:text-xs font-bold px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5 sm:h-3 sm:w-3 mr-0.5 sm:mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Unggulan
                        </span>
                        @endif
                    </div>
                    
                    <!-- Produk Body -->
                    <div class="p-3 sm:p-4 md:p-5 lg:p-6 text-center">
                        <h5 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2 line-clamp-2">{{ $product->nama }}</h5>
                        <p class="text-sm sm:text-base md:text-lg font-semibold text-purple-600 mb-2 sm:mb-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        
                        <!-- Beli Button -->
                        <button class="btn-buy w-full px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm transition-all duration-300 cursor-pointer shadow-sm hover:shadow-md flex items-center justify-center gap-1 sm:gap-2 mx-auto bg-purple-600 hover:bg-purple-700 text-white"
                                onclick="buyProduct({{ $product->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            <span class="whitespace-nowrap">Masukkan Keranjang</span>
                        </button>
                        
                        <!-- Quantity Controls (hidden by default) -->
                        <div class="qty-controls hidden items-center justify-center mt-2">
                            <button class="decrease-btn bg-purple-100 hover:bg-purple-200 text-purple-800 font-bold py-0.5 sm:py-1 px-2 sm:px-3 rounded-l-full cursor-pointer transition-colors duration-200"
                                    onclick="changeQuantity({{ $product->id }}, -1)">
                                -
                            </button>
                            <input type="number" min="1" value="1" 
                                   class="quantity-input w-8 sm:w-12 text-center text-sm border-t border-b border-purple-200 py-0.5 sm:py-1 focus:outline-none focus:ring-1 focus:ring-purple-500">
                            <button class="increase-btn bg-purple-100 hover:bg-purple-200 text-purple-800 font-bold py-0.5 sm:py-1 px-2 sm:px-3 rounded-r-full cursor-pointer transition-colors duration-200"
                                    onclick="changeQuantity({{ $product->id }}, 1)">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<!-- Floating Confirm Button -->
<style>
    @keyframes shake {
        0%, 100% { transform: translateX(0) scale(1); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-2px) scale(1.02); }
        20%, 40%, 60%, 80% { transform: translateX(2px) scale(1.02); }
    }

    @keyframes glowPulse {
        0%, 100% { box-shadow: 0 0 15px rgba(34, 197, 94, 0.4); }
        50% { box-shadow: 0 0 25px rgba(34, 197, 94, 0.6); }
    }

    @keyframes cartBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    .shake-animation {
        animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both,
                   glowPulse 1s ease-in-out both;
    }

    .cart-icon-animate {
        animation: cartBounce 0.5s ease-in-out both;
    }

    #confirmBtn {
        transition: all 0.3s ease;
        backface-visibility: hidden;
        transform: translateZ(0);
        -webkit-font-smoothing: subpixel-antialiased;
    }
</style>

<div class="sticky bottom-8 left-0 right-0 z-40 flex justify-center">
    <button id="confirmBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 hidden cursor-pointer flex items-center gap-2"
            onclick="showOrderSummary()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" id="cartIcon">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
        Konfirmasi Pesanan
        <span id="cartCount" class="bg-white text-green-600 text-xs font-bold px-2 py-1 rounded-full ml-1">0</span>
    </button>
</div>

<script>
    let quantities = {};
    let productsData = @json($products);

    // Fungsi untuk mengubah z-index navbar
    function toggleNavbarZIndex(showModal) {
        const navbar = document.querySelector('nav');
        if (showModal) {
            navbar.classList.remove('z-50');
            // navbar.classList.add('z-40');
        } else {
            // navbar.classList.remove('z-40');
            navbar.classList.add('z-50');
        }
    }
    
    // Filter produk berdasarkan kategori
    function filterProduk(category) {
        let items = document.querySelectorAll('.produk-item');
        let buttons = document.querySelectorAll('.kategori-btn');
        
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = "block";
                
                // Periksa apakah produk ini sudah dibeli
                const productId = parseInt(item.getAttribute('data-id'));
                if (quantities.hasOwnProperty(productId)) {
                    item.querySelector('.btn-buy').classList.add('hidden');
                    item.querySelector('.qty-controls').classList.remove('hidden');
                }
            } else {
                item.style.display = "none";
            }
        });
        
        // Update active button styling
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-purple-600', 'text-white');
            btn.classList.add('bg-white', 'hover:bg-purple-100', 'text-gray-800');
        });
        
        // Style the active button
        event.currentTarget.classList.add('active', 'bg-purple-600', 'text-white');
        event.currentTarget.classList.remove('bg-white', 'hover:bg-purple-100', 'text-gray-800');
    }
    
    // Fungsi ketika tombol beli diklik
    function buyProduct(id) {
        const productCard = document.querySelector(`.produk-item[data-id="${id}"]`);
        productCard.querySelector('.btn-buy').classList.add('hidden');
        productCard.querySelector('.qty-controls').classList.remove('hidden');
        
        quantities[id] = 1; // Mulai dari 1 bukan 0
        updateConfirmButton();
    }
    
    // Ubah quantity dengan tombol +/-
    function changeQuantity(id, delta) {
        const input = document.querySelector(`.produk-item[data-id="${id}"] .quantity-input`);
        let val = parseInt(input.value) + delta;
        
        // Jika decrease dan quantity menjadi 0
        if (val <= 0) {
            // Hapus dari quantities
            delete quantities[id];
            
            // Tampilkan tombol beli dan sembunyikan quantity controls
            const productCard = document.querySelector(`.produk-item[data-id="${id}"]`);
            productCard.querySelector('.btn-buy').classList.remove('hidden');
            productCard.querySelector('.qty-controls').classList.add('hidden');
        } else {
            // Update quantity biasa
            input.value = val;
            quantities[id] = val;
        }
        
        updateConfirmButton();
    }
    
    // Update quantity ketika input langsung diubah
    function updateQuantity(id, val) {
        val = parseInt(val);
        const productCard = document.querySelector(`.produk-item[data-id="${id}"]`);
        
        if (val <= 0) {
            // Hapus dari quantities
            delete quantities[id];
            
            // Tampilkan tombol beli dan sembunyikan quantity controls
            productCard.querySelector('.btn-buy').classList.remove('hidden');
            productCard.querySelector('.qty-controls').classList.add('hidden');
        } else {
            // Update quantity biasa
            productCard.querySelector('.quantity-input').value = val;
            quantities[id] = val;
        }
        
        updateConfirmButton();
    }
    
    // Fungsi untuk menambahkan animasi pada tombol konfirmasi
    function animateConfirmButton() {
        const confirmBtn = document.getElementById('confirmBtn');
        const cartIcon = document.getElementById('cartIcon');
        
        if (!confirmBtn.classList.contains('hidden')) {
            // Tambahkan kelas animasi
            confirmBtn.classList.add('shake-animation');
            cartIcon.classList.add('cart-icon-animate');
            
            // Hapus kelas animasi setelah animasi selesai
            setTimeout(() => {
                confirmBtn.classList.remove('shake-animation');
                cartIcon.classList.remove('cart-icon-animate');
            }, 500);
        }
    }

    // Jalankan animasi setiap 5 detik
    setInterval(animateConfirmButton, 5000);

    // Update fungsi updateConfirmButton yang sudah ada
    function updateConfirmButton() {
        const confirmBtn = document.getElementById('confirmBtn');
        const cartCount = document.getElementById('cartCount');
        const itemCount = Object.keys(quantities).length;
        
        if (itemCount > 0) {
            confirmBtn.classList.remove('hidden');
            cartCount.textContent = itemCount;
            // Tambahkan animasi saat pertama kali muncul
            confirmBtn.classList.add('shake-animation');
            setTimeout(() => {
                confirmBtn.classList.remove('shake-animation');
            }, 500);
        } else {
            confirmBtn.classList.add('hidden');
        }
    }
    
    // Fungsi untuk menutup modal saat klik di luar konten
    function setupModalCloseOnOutsideClick() {
        // Untuk modal detail
        document.getElementById('detailModalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });

        // Untuk modal order
        document.getElementById('orderModalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrderModal();
            }
        });
    }

    // Panggil fungsi setup saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        setupModalCloseOnOutsideClick();
    });
</script>
@endsection