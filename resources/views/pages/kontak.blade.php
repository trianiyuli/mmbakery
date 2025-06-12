@extends('layouts.app')

@section('title', 'Kontak - MM Bakery')

@section('content')
<div class="bg-purple-50">
    <!-- Hero Section -->
    <section class="relative h-[50vh] sm:h-[60vh] md:h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/kontak/foto2.jpg') }}" 
                 alt="Hubungi Kami" 
                 class="w-full h-full object-cover transition-transform duration-10000 hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
            <div class="text-center max-w-3xl px-4">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 animate-fade-in-up">HUBUNGI KAMI</h1>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 mb-6 sm:mb-8 leading-relaxed px-2">
                    Jika Anda memiliki pertanyaan atau saran tentang produk kami jangan ragu menghubungi kami.<br class="hidden sm:block">
                    MM Bakery berkomitmen memberikan pelayanan terbaik untuk Anda
                </p>
                <a href="#contact-info" class="inline-block px-6 sm:px-8 py-2.5 sm:py-3 bg-purple-600 hover:bg-purple-700 text-white text-sm sm:text-base font-medium rounded-full transition duration-300 transform hover:scale-105">
                    Lihat Informasi Kontak
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section id="contact-info" class="py-10 sm:py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Contact Form -->
                    <div class="w-full md:w-1/2 p-6 sm:p-8 md:p-10 bg-gradient-to-br from-purple-50 to-white">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">Kirim Saran</h2>
                        <form id="contactForm" onsubmit="sendEmail(event)" class="space-y-4 sm:space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Anda</label>
                                <input type="text" id="name" name="name" required class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Saran Anda</label>
                                <textarea id="message" name="message" rows="4" required class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white text-sm sm:text-base font-medium py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg transition duration-300 transform hover:scale-[1.02] cursor-pointer">
                                Kirim Saran via Gmail
                            </button>
                        </form>

                        <script>
                            function sendEmail(e) {
                                e.preventDefault();
                                
                                // Ambil nilai dari form dan decode karakter khusus
                                const name = document.getElementById('name').value;
                                const message = document.getElementById('message').value;
                                
                                // Format pesan dengan nama
                                const formattedMessage = `Nama: ${name}\n\n${message}`;
                                
                                // Buat URL Gmail dengan parameter yang benar
                                const gmailComposeUrl = 'https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1' + 
                                    '&to=contact@mmbakerymadiun.com' + 
                                    '&subject=' + encodeURIComponent('Saran Pengguna - MM Bakery') + 
                                    '&body=' + encodeURIComponent(formattedMessage);
                                
                                // Buka Gmail di tab baru
                                window.open(gmailComposeUrl);
                                
                                // Reset form
                                document.getElementById('contactForm').reset();
                            }
                        </script>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="w-full md:w-1/2 p-6 sm:p-8 md:p-10 bg-white">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 sm:mb-8">Hubungi Kami</h2>
                        
                        <div class="space-y-4 sm:space-y-6">
                            <!-- Alamat -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-purple-100 p-2 sm:p-3 rounded-full">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 sm:ml-4">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">Alamat</h3>
                                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mayor+Jend.+Di+Panjaitan+No.79,+Banjarejo,+Kec.+Taman,+Kota+Madiun,+Jawa+Timur+63137" 
                                       target="_blank" 
                                       class="text-sm sm:text-base text-gray-600 hover:text-purple-600 transition mt-1 block">
                                        Jl. Mayor Jend. Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137
                                    </a>
                                </div>
                            </div>
                            
                            <!-- WhatsApp -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-green-100 p-2 sm:p-3 rounded-full">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 sm:ml-4">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">WhatsApp</h3>
                                    <a href="https://wa.me/6281259176660" 
                                       target="_blank" 
                                       class="text-sm sm:text-base text-gray-600 hover:text-green-600 transition mt-1 block">
                                        +62 812-5917-6660
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Instagram -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-pink-100 p-2 sm:p-3 rounded-full">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16a8 8 0 100-16 8 8 0 000 16z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 sm:ml-4">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">Instagram</h3>
                                    <a href="https://www.instagram.com/mmmadiun1/" 
                                       target="_blank" 
                                       class="text-sm sm:text-base text-gray-600 hover:text-pink-600 transition mt-1 block">
                                        @mmmadiun1
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-blue-100 p-2 sm:p-3 rounded-full">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 sm:ml-4">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">Email</h3>
                                    <a href="mailto:contact@mmbakerymadiun.com" 
                                       class="text-sm sm:text-base text-gray-600 hover:text-blue-600 transition mt-1 block">
                                        contact@mmbakerymadiun.com
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 sm:mt-10 pt-4 sm:pt-6 border-t border-gray-200">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">Jam Operasional</h3>
                            <ul class="space-y-2 text-sm sm:text-base text-gray-600">
                                <li class="flex justify-between">
                                    <span>Senin - Minggu</span>
                                    <span class="font-medium">06.00 - 20.00 WIB</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps Section -->
    <section class="pb-10 sm:pb-16 md:pb-20 px-4">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="aspect-w-16 aspect-h-9 h-[300px] sm:h-[400px] md:h-96">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid" 
                            class="w-full h-full" 
                            allowfullscreen="" 
                            loading="lazy">
                    </iframe>
                </div>
                <div class="p-4 sm:p-6 text-center">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">MM Bakery Pusat Madiun</h3>
                    <p class="text-sm sm:text-base text-gray-600">Jl. Mayor Jend. Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mayor+Jend.+Di+Panjaitan+No.79,+Banjarejo,+Kec.+Taman,+Kota+Madiun,+Jawa+Timur+63137" 
                       target="_blank" 
                       class="inline-block mt-3 sm:mt-4 px-4 sm:px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm sm:text-base rounded-lg transition">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection