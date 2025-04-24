@extends('layouts.app')

@section('title', 'Outlet - MM Bakery')

@section('content')
<div class="bg-purple-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Outlet Kami</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto mt-4 mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan outlet MM Bakery terdekat dan nikmati roti segar kami</p>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Map Section -->
            <div class="lg:w-2/3">
                <div class="relative rounded-xl overflow-hidden shadow-xl h-full">
                    <div class="aspect-w-16 aspect-h-9 lg:aspect-none h-[400px] lg:h-full">
                        <iframe id="mapIframe" 
                                class="w-full h-full" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid" 
                                allowfullscreen="" 
                                loading="lazy">
                        </iframe>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/30 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span id="currentLocation" class="font-medium">MM Bakery Pusat Madiun</span>
                    </div>
                </div>
            </div>

            <!-- Outlet List Section -->
            <div class="lg:w-1/3 space-y-6">
                @php
                    $locations = [
                        [
                            'name' => 'MM Bakery Pusat Madiun',
                            'jam' => '06.00 - 20.00',
                            'address' => 'Jl. Mayor Jendral Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137',
                            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid',
                            'image' => 'outletpusat.jpg'
                        ],
                        [
                            'name' => 'MM Bakery Cab. Bagi',
                            'jam' => '06.00 - 20.00',
                            'address' => 'Jalan Raya Kajang RT.23/RW.4 Candi, Candi, Bagi, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151',
                            'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126537.66097439079!2d111.4476729!3d-7.6506498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c0ead5238d47%3A0xaaf4c3699d322c94!2sMM%20Bakery%20Bagi!5e0!3m2!1sid!2sid!4v1744786322883!5m2!1sid!2sid',
                            'image' => 'cabang1.jpg'
                        ],
                        [
                            'name' => 'MM Bakery Cab. Pagotan',
                            'jam' => '06.00 - 20.00',
                            'address' => 'Jl. Raya Pagotan, RT.30/RW.8, Gilingan, Uteran, Kec. Geger, Kabupaten Madiun, Jawa Timur 63171',
                            'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126537.66097439079!2d111.4476729!3d-7.6506498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bcee197354d9%3A0x8073d5bdab21d30f!2sToko%20Roti%20MM%20Bakery%20Cab.%20Pagotan!5e0!3m2!1sid!2sid!4v1744786348630!5m2!1sid!2sid',
                            'image' => 'cabang2.jpg'
                        ],
                    ];
                @endphp

                @foreach ($locations as $index => $loc)
                <div onclick="changeMap('{{ $loc['map'] }}', '{{ $loc['name'] }}')" 
                    class="outlet-card bg-white rounded-xl shadow-md overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg hover:-translate-y-1 border-l-4 border-purple-600 group">
                    <div class="flex h-full">
                        <!-- Outlet Image -->
                        <div class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('images/foto_outlet/'.$loc['image']) }}" 
                                alt="{{ $loc['name'] }}" 
                                class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Outlet Info -->
                        <div class="p-4 w-2/3 flex flex-col">
                            <h3 class="text-lg font-bold text-gray-800 group-hover:text-purple-700">{{ $loc['name'] }}</h3>
                            <div class="flex items-center mt-1 text-sm text-purple-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $loc['jam'] }}
                            </div>
                            <div class="mt-2 text-sm text-gray-600 overflow-y-auto max-h-20 pr-2">
                                {{ $loc['address'] }}
                            </div>
                            <div class="mt-auto pt-2 flex justify-end">
                                <button class="text-xs px-3 py-1 bg-purple-100 text-purple-700 rounded-full group-hover:bg-purple-600 group-hover:text-white transition">
                                    Lihat Peta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-16 bg-white rounded-xl shadow-md p-8 max-w-4xl mx-auto">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Jam Operasional</h3>
                <div class="w-16 h-1 bg-purple-600 mx-auto mb-6"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-lg font-medium text-purple-700 mb-2">Senin - Jumat</div>
                    <div class="text-gray-600">06.00 - 20.00 WIB</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-medium text-purple-700 mb-2">Sabtu</div>
                    <div class="text-gray-600">06.00 - 21.00 WIB</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-medium text-purple-700 mb-2">Minggu & Libur</div>
                    <div class="text-gray-600">07.00 - 20.00 WIB</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Change map location
    function changeMap(url, locationName) {
        document.getElementById('mapIframe').src = url;
        document.getElementById('currentLocation').textContent = locationName;
        
        // Add active state to clicked card
        const cards = document.querySelectorAll('.outlet-card');
        cards.forEach(card => {
            card.classList.remove('ring-2', 'ring-purple-500');
        });
        event.currentTarget.classList.add('ring-2', 'ring-purple-500');
    }

    // Initialize first card as active
    document.addEventListener('DOMContentLoaded', function() {
        const firstCard = document.querySelector('.outlet-card');
        if (firstCard) {
            firstCard.classList.add('ring-2', 'ring-purple-500');
        }
    });
</script>
@endsection