@extends('layouts.app')

@section('title', 'MM Bakery - Roti Segar Berkualitas')

@section('content')
    @include('pages.components.home.detail-produk')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animation for modal entrance */
        @keyframes modal-entrance {
            0% { transform: scale(0.95); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Animation for modal exit */
        @keyframes modal-exit {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0; }
        }
    </style>

    <!-- Hero Carousel with Improved Animations -->
    <section id="beranda" class="relative w-full h-[60vh] sm:h-[80vh] lg:h-screen overflow-hidden" x-data="{ current: 0, images: [
        { src: '{{ asset('images/carousel/image2.png') }}', title: 'Selamat Datang di MM Bakery', desc: 'Kami menyediakan berbagai macam roti segar dengan bahan berkualitas tinggi dan cita rasa terbaik.'},
        { src: '{{ asset('images/carousel/image1.png') }}', title: 'Roti Segar Setiap Hari', desc: 'Dibuat dengan bahan pilihan dan dipanggang dengan sempurna.'},
        { src: '{{ asset('images/carousel/image3.jpg') }}', title: 'Nikmati Kelezatan Kami', desc: 'Tersedia berbagai varian roti untuk setiap selera.'}
    ] }" x-init="setInterval(() => current = (current + 1) % images.length, 5000)">
        <template x-for="(image, index) in images" :key="index">
            <div x-show="current === index" class="absolute inset-0 transition-opacity duration-1000 ease-in-out" 
                 x-transition:enter="opacity-0 scale-110" 
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-90">
                <img :src="image.src" class="w-full h-full object-cover transform transition-transform duration-10000" :class="current === index ? 'scale-100' : 'scale-110'" :alt="image.title">
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/30 to-transparent flex flex-col justify-center items-center text-center px-4 sm:px-6">
                    <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="600">
                        <h2 class="text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-4 text-white" x-text="image.title"></h2>
                        <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white/90 mb-4 sm:mb-8 leading-relaxed max-w-3xl mx-auto px-4" x-text="image.desc"></p>
                    </div>
                </div>
            </div>
        </template>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 sm:bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="(_, index) in images" :key="index">
                <button @click="current = index" 
                        class="w-1.5 sm:w-2 h-1.5 sm:h-2 rounded-full transition-all duration-300" 
                        :class="current === index ? 'bg-white w-4 sm:w-6' : 'bg-white/50'"
                        aria-label="Go to slide">
                </button>
            </template>
        </div>
    </section>

    <!-- Produk Unggulan -->
    <section id="produk" class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12 md:py-16">
        <div class="text-center mb-6 sm:mb-12" data-aos="fade-up" data-aos-duration="500">
            <div class="flex items-center gap-2 mb-3 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 sm:h-6 w-5 sm:w-6 text-yellow-400 drop-shadow-glow" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                </svg>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800">Produk Unggulan Kami</h2>
            </div>
            <div class="w-12 sm:w-16 h-1 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto mb-3 sm:mb-4"></div>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto px-4">Temukan kelezatan roti segar kami yang dibuat dengan bahan pilihan dan penuh cinta.</p>
        </div>
        
        @if($featuredProducts->count() > 0)
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 justify-items-center">
            @foreach($featuredProducts as $product)
            <div class="relative bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-50 border-2 border-yellow-400/50 rounded-xl shadow-lg p-3 sm:p-4 flex flex-col items-center w-full max-w-[280px] sm:max-w-xs transition-transform hover:scale-105 hover:shadow-2xl group cursor-pointer" 
                 data-aos="fade-up" 
                 data-aos-duration="400"
                 data-aos-delay="{{ $loop->index * 50 }}">
                <span class="absolute -top-2 sm:-top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-yellow-400 to-amber-500 text-white text-xs font-bold px-2 py-0.5 sm:px-3 sm:py-1 rounded-full shadow-lg border border-yellow-300 z-10 flex items-center gap-1 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                    </svg>
                    Unggulan
                </span>
                
                <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama }}" 
                     class="h-20 sm:h-24 w-20 sm:w-24 rounded-full object-cover border-4 border-yellow-400/30 shadow-lg mb-2 group-hover:border-yellow-400 transition-all duration-300">
                
                <div class="text-sm sm:text-base font-bold text-gray-800 text-center mb-1">{{ $product->nama }}</div>
                <div class="text-xs sm:text-sm text-yellow-600 mb-1">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
                
                <button onclick="showFeaturedDetailModal({{ json_encode($product) }})" 
                        class="mt-3 px-3 py-1.5 sm:px-4 sm:py-2 bg-gradient-to-r from-yellow-400 to-amber-500 text-white text-xs sm:text-sm rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:from-yellow-500 hover:to-amber-600 transform hover:scale-105 cursor-pointer w-full sm:w-auto">
                    Detail Produk
                </button>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-6 sm:py-8 bg-gradient-to-br from-yellow-50 to-amber-50 rounded-xl mx-4" 
             data-aos="fade-up" 
             data-aos-duration="400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 sm:h-12 w-10 sm:w-12 mx-auto text-yellow-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-base sm:text-lg font-medium text-gray-700 mb-2">Belum ada produk unggulan</h3>
            <p class="text-sm sm:text-base text-gray-500 mb-4 px-4">Kami sedang menyiapkan produk terbaik untuk Anda</p>
            <a href="{{ route('produk') }}" class="inline-block px-4 py-2 bg-gradient-to-r from-yellow-500 to-amber-500 text-white rounded-full hover:from-yellow-600 hover:to-amber-600 transition transform hover:scale-105">
                Lihat Semua Produk
            </a>
        </div>
        @endif
        
        <div class="text-center mt-6 sm:mt-8" 
             data-aos="fade-up" 
             data-aos-duration="400">
            <a href="{{ route('produk') }}" class="inline-flex items-center px-4 sm:px-6 py-2 bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-500 hover:to-amber-600 text-white text-sm sm:text-base font-medium rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl relative overflow-hidden group cursor-pointer">
                <span class="relative z-10">Lihat Semua Produk</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-2 relative z-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Tentang Kami with Enhanced Visuals -->
    <section id="tentang" class="bg-purple-50 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-8 items-center">
            <div class="order-2 md:order-1" data-aos="fade-right" data-aos-duration="500">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h2>
                <div class="w-16 sm:w-20 h-1 bg-purple-600 mb-4"></div>
                
                <div class="space-y-3 text-gray-700">
                    <p class="text-sm sm:text-base text-justify">
                        Pada tahun 2008, dengan pengalaman dan kecintaan mendalam terhadap dunia roti dan kue, MM Bakery lahir di Madiun.
                        Nama "MM" sendiri terinspirasi dari Maimunah, sosok ibu yang penuh kasih dan menjadi pilar utama di balik perjalanan sang pemilik.
                    </p>
                    <p class="text-sm sm:text-base text-justify">
                        Seiring berjalannya waktu, MM Bakery terus berkembang dan kini telah memiliki 6 outlet berkat dukungan serta kepercayaan dari pelanggan setia.
                        Kami berkomitmen untuk selalu menghadirkan kualitas terbaik dan pelayanan istimewa.
                    </p>
                </div>
                
                <div class="mt-6 flex items-center space-x-4 sm:space-x-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <p class="text-xs sm:text-sm font-medium text-gray-500">Didirikan</p>
                            <p class="text-base sm:text-lg font-semibold text-gray-800">2008</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <p class="text-xs sm:text-sm font-medium text-gray-500">Outlet</p>
                            <p class="text-base sm:text-lg font-semibold text-gray-800">6+</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="order-1 md:order-2 relative" data-aos="fade-left" data-aos-duration="500">
                <div class="relative rounded-xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/carousel/tentang.jpg') }}" class="w-full h-auto" alt="Tentang MM Bakery">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/40 via-purple-900/20 to-transparent"></div>
                </div>
                <div class="absolute -bottom-4 sm:-bottom-6 -left-4 sm:-left-6 w-24 sm:w-32 h-24 sm:h-32 bg-purple-100 rounded-xl -z-10"></div>
                <div class="absolute -top-4 sm:-top-6 -right-4 sm:-right-6 w-20 sm:w-24 h-20 sm:h-24 bg-purple-200 rounded-xl -z-10"></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-purple-700 to-pink-700 py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4">Siap Menikmati Roti Segar Kami?</h2>
            <p class="text-base sm:text-lg text-purple-100 mb-6">Kunjungi outlet terdekat atau hubungi kami untuk pemesanan khusus</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('outlet') }}" class="px-6 py-2.5 bg-white text-purple-700 font-medium rounded-full hover:bg-gray-100 transition duration-300 transform hover:scale-105 shadow-lg cursor-pointer text-sm sm:text-base">
                    Cari Outlet Terdekat
                </a>
                <a href="{{ route('kontak') }}" class="px-6 py-2.5 border-2 border-white text-white font-medium rounded-full hover:bg-purple-600/20 transition duration-300 transform hover:scale-105 cursor-pointer text-sm sm:text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Fungsi untuk mengubah z-index navbar
        function toggleNavbarZIndex(showModal) {
            const navbar = document.querySelector('nav');
            if (showModal) {
                navbar.classList.remove('z-50');
            } else {
                navbar.classList.add('z-50');
            }
        }
        AOS.init({
            duration: 200,
            easing: 'ease-out',
            once: true,
            offset: 1,
            delay: 0,
            anchorPlacement: 'top-bottom'
        });
    </script>

    <script>
        // Fungsi untuk mengatur ulang AOS saat resize window
        window.addEventListener('resize', () => {
            AOS.refresh();
        });

        // Fungsi untuk memastikan AOS bekerja dengan baik setelah semua konten dimuat
        window.addEventListener('load', () => {
            AOS.refresh();
        });
    </script>
@endsection