@extends('layouts.app')

@section('title', 'MM Bakery - Roti Segar Berkualitas')

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Hero Carousel with Improved Animations -->
    <section id="beranda" class="relative w-full h-screen overflow-hidden" x-data="{ current: 0, images: [
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
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/30 to-transparent flex flex-col justify-center items-center text-center px-6">
                    <div class="max-w-4xl" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="text-4xl md:text-6xl font-bold mb-4 text-white" x-text="image.title"></h2>
                        <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed" x-text="image.desc"></p>
                        <!-- <a :href="index === 0 ? '#produk' : index === 1 ? '#tentang' : '#outlet'" 
                           class="inline-block px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-full transition duration-300 transform hover:scale-105"
                           data-aos="fade-up" data-aos-delay="300">
                            <span x-text="image.cta"></span>
                            <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>
            </div>
        </template>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="(_, index) in images" :key="index">
                <button @click="current = index" 
                        class="w-3 h-3 rounded-full transition-all duration-300" 
                        :class="current === index ? 'bg-white w-8' : 'bg-white/50'"
                        aria-label="Go to slide">
                </button>
            </template>
        </div>
    </section>

    <!-- Produk Unggulan with Floating Animation -->
    <section id="produk" class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Produk Unggulan Kami</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan kelezatan roti segar kami yang dibuat dengan bahan pilihan dan penuh cinta.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([['Roti Pisang Keju', 'unggulan1.jpg', 'Rp 25.000'], ['Coklat Pisang', 'unggulan2.jpg', 'Rp 28.000'], ['Srikaya Pandan', 'unggulan3.jpg', 'Rp 22.000']] as $produk)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 hover:shadow-xl"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-64 bg-gray-50 flex justify-center items-center p-6">
                    <img src="{{ asset('images/produk/'.$produk[1]) }}" alt="{{ $produk[0] }}" class="h-full w-full object-contain hover:scale-105 transition duration-500">
                </div>
                <div class="p-6 text-center">
                    <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk[0] }}</h5>
                    <p class="text-lg font-bold text-purple-600 mb-4">{{ $produk[2] }}</p>
                    <button class="px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-medium hover:bg-purple-200 transition">
                        Detail Produk
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('produk') }}" class="inline-block px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-full transition duration-300">
                Lihat Semua Produk
            </a>
        </div>
    </section>

    <!-- Tentang Kami with Enhanced Visuals -->
    <section id="tentang" class="bg-purple-50 py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1" data-aos="fade-right">
                <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Kami</h2>
                <div class="w-20 h-1 bg-purple-600 mb-6"></div>
                
                <div class="space-y-4 text-gray-700">
                    <p class="text-justify">
                        Pada tahun 2008, dengan pengalaman dan kecintaan mendalam terhadap dunia roti dan kue, MM Bakery lahir di Madiun.
                        Nama "MM" sendiri terinspirasi dari Maimunah, sosok ibu yang penuh kasih dan menjadi pilar utama di balik perjalanan sang pemilik.
                    </p>
                    <p class="text-justify">
                        Seiring berjalannya waktu, MM Bakery terus berkembang dan kini telah memiliki 6 outlet berkat dukungan serta kepercayaan dari pelanggan setia.
                        Kami berkomitmen untuk selalu menghadirkan kualitas terbaik dan pelayanan istimewa.
                    </p>
                </div>
                
                <div class="mt-8 flex items-center space-x-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Didirikan</p>
                            <p class="text-lg font-semibold text-gray-800">2008</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Outlet</p>
                            <p class="text-lg font-semibold text-gray-800">6+</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="order-1 md:order-2 relative" data-aos="fade-left">
                <div class="relative rounded-xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/carousel/tentang.jpg') }}" class="w-full h-auto" alt="Tentang MM Bakery">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/40 via-purple-900/20 to-transparent"></div>
                </div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-purple-100 rounded-xl -z-10"></div>
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-purple-200 rounded-xl -z-10"></div>
            </div>
        </div>
    </section>

    <!-- Outlet with Interactive Cards -->
    <section id="outlet" class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Outlet Kami</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan outlet MM Bakery terdekat di kota Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['Outlet Pusat', 'Jl. Mayor Jendral Di Panjaitan No.79, Banjarejo, Taman, Kota Madiun, Jawa Timur 63137', 'outletpusat.jpg', 'https://maps.app.goo.gl/7DtW4KQfvSSU2S6N6'],
                ['Outlet Cabang 1', 'Jalan Raya Kajang RT.23/RW.4 Candi, Kabupaten Madiun, Jawa Timur 63151', 'cabang1.jpg', 'https://maps.app.goo.gl/W7ab3HqBv6M9o85Q9'],
                ['Outlet Cabang 2', 'Jl. Raya Pagotan, RT.30/RW.8, Gilingan, Uteran, Geger, Kabupaten Madiun, Jawa Timur 63171', 'cabang2.jpg', '#']
            ] as $outlet)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition duration-300"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/foto_outlet/'.$outlet[2]) }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" alt="{{ $outlet[0] }}">
                </div>
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-800">{{ $outlet[0] }}</h3>
                            <!-- <p class="mt-1 text-sm text-gray-600">{{ $outlet[1] }}</p> -->
                        </div>
                    </div>
                    <a href="{{ $outlet[3] }}" target="_blank" class="mt-6 inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-full transition duration-300 w-full justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        Lihat di Google Maps
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-purple-700 py-16 md:py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Menikmati Roti Segar Kami?</h2>
            <p class="text-lg text-purple-100 mb-8">Kunjungi outlet terdekat atau hubungi kami untuk pemesanan khusus</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('outlet') }}" class="px-8 py-3 bg-white text-purple-700 font-medium rounded-full hover:bg-gray-100 transition duration-300">
                    Cari Outlet Terdekat
                </a>
                <a href="{{ route('kontak') }}" class="px-8 py-3 border-2 border-white text-white font-medium rounded-full hover:bg-purple-600 transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>
@endsection