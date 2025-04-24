@extends('layouts.app')

@section('title', 'Kontak - MM Bakery')

@section('content')
<div class="bg-purple-50">
    <!-- Hero Section -->
    <section class="relative h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/kontak/foto2.jpg') }}" 
                 alt="Hubungi Kami" 
                 class="w-full h-full object-cover transition-transform duration-10000 hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
            <div class="text-center max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in-up">HUBUNGI KAMI</h1>
                <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed">
                    Jika Anda memiliki pertanyaan atau saran tentang produk kami jangan ragu menghubungi kami.<br>
                    MM Bakery berkomitmen memberikan pelayanan terbaik untuk Anda
                </p>
                <a href="#contact-info" class="inline-block px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-full transition duration-300 transform hover:scale-105">
                    Lihat Informasi Kontak
                </a>
            </div>
        </div>
        
        <!-- <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#contact-info" class="block w-10 h-10 rounded-full border-2 border-white flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div> -->
    </section>

    <!-- Contact Info Section -->
    <section id="contact-info" class="py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <!-- Contact Form -->
                    <div class="md:w-1/2 p-8 md:p-10 bg-gradient-to-br from-purple-50 to-white">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
                        <form class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Anda</label>
                                <input type="text" id="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 transform hover:scale-[1.02]">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="md:w-1/2 p-8 md:p-10 bg-white">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8">Hubungi Kami</h2>
                        
                        <div class="space-y-6">
                            <!-- Alamat -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-purple-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">Alamat</h3>
                                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mayor+Jend.+Di+Panjaitan+No.79,+Banjarejo,+Kec.+Taman,+Kota+Madiun,+Jawa+Timur+63137" 
                                       target="_blank" 
                                       class="text-gray-600 hover:text-purple-600 transition mt-1 block">
                                        Jl. Mayor Jend. Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137
                                    </a>
                                </div>
                            </div>
                            
                            <!-- WhatsApp -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-green-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">WhatsApp</h3>
                                    <a href="https://wa.me/6281259176660" 
                                       target="_blank" 
                                       class="text-gray-600 hover:text-green-600 transition mt-1 block">
                                        +62 812-5917-6660
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Instagram -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-pink-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16a8 8 0 100-16 8 8 0 000 16z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">Instagram</h3>
                                    <a href="https://www.instagram.com/mmmadiun1/" 
                                       target="_blank" 
                                       class="text-gray-600 hover:text-pink-600 transition mt-1 block">
                                        @mmmadiun1
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-blue-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                                    <a href="mailto:contact@mmbakerymadiun.com" 
                                       class="text-gray-600 hover:text-blue-600 transition mt-1 block">
                                        contact@mmbakerymadiun.com
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Jam Operasional</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex justify-between">
                                    <span>Senin - Jumat</span>
                                    <span class="font-medium">06.00 - 20.00 WIB</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Sabtu</span>
                                    <span class="font-medium">06.00 - 21.00 WIB</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Minggu & Libur</span>
                                    <span class="font-medium">07.00 - 20.00 WIB</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps Section -->
    <section class="pb-16 md:pb-20 px-4">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="aspect-w-16 aspect-h-9 h-96">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid" 
                            class="w-full h-full" 
                            allowfullscreen="" 
                            loading="lazy">
                    </iframe>
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">MM Bakery Pusat Madiun</h3>
                    <p class="text-gray-600">Jl. Mayor Jend. Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mayor+Jend.+Di+Panjaitan+No.79,+Banjarejo,+Kec.+Taman,+Kota+Madiun,+Jawa+Timur+63137" 
                       target="_blank" 
                       class="inline-block mt-4 px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection