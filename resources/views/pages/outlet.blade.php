@extends('layouts.app')

@section('content')
<style>
    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .jambuka {
        font-size: 0.875rem;
        font-weight: bold;
    }
    .card-map {
        border-top: 4px solid #611cb7 !important;     /* Ungu */
        border-right: 4px solid #ff9800 !important;   /* Oranye */
        border-bottom: 4px solid #4caf50 !important;  /* Hijau */
        border-left: 4px solid #2196f3 !important;    /* Biru */
    }
</style>
<div class="container py-4">
    <h3 class="text-center mb-3" style="color: #611cb7">Outlet</h3>
    <p class="text-center mb-4">Kunjungi outlet kami di lokasi berikut:</p>

    <div class="row">
        <!-- Map Section -->
        <div class="card card-map col-md-8 mb-3">
            <div class="ratio ratio-4x3 rounded shadow" id="map-frame">
                <iframe id="mapIframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Outlet Info Section -->
        <div class="col-md-4 d-flex flex-column gap-3">
            @php
                $locations = [
                    [
                        'name' => 'MM Bakery Pusat Madiun',
                        'jam' => '06.00 - 20.00',
                        'address' => 'Jl. Mayor Jendral Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137',
                        'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.301833137832!2d111.5300755!3d-7.650657600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1744786268263!5m2!1sid!2sid',
                    ],
                    [
                        'name' => 'MM Bakery Cab. Bagi',
                        'jam' => '06.00 - 20.00',
                        'address' => 'Jalan Raya Kajang RT.23/RW.4 Candi, Candi, Bagi, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151',
                        'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126537.66097439079!2d111.4476729!3d-7.6506498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c0ead5238d47%3A0xaaf4c3699d322c94!2sMM%20Bakery%20Bagi!5e0!3m2!1sid!2sid!4v1744786322883!5m2!1sid!2sid',
                    ],
                    [
                        'name' => 'MM Bakery Cab. Pagotan',
                        'jam' => '06.00 - 20.00',
                        'address' => 'Jl. Raya Pagotan, RT.30/RW.8, Gilingan, Uteran, Kec. Geger, Kabupaten Madiun, Jawa Timur 63171',
                        'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126537.66097439079!2d111.4476729!3d-7.6506498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bcee197354d9%3A0x8073d5bdab21d30f!2sToko%20Roti%20MM%20Bakery%20Cab.%20Pagotan!5e0!3m2!1sid!2sid!4v1744786348630!5m2!1sid!2sid',
                    ],
                ];
            @endphp

            @foreach ($locations as $loc)
                <div class="card shadow-sm border-0" onclick="changeMap('{{ $loc['map'] }}')" style="cursor: pointer;">
                    <div class="card-body card">
                        <h5 class="card-title" style="color: #611cb7;">{{ $loc['name'] }}</h5>
                        <p class="card-text jambuka">JAM BUKA : {{ $loc['jam'] }}</p>
                        <p class="card-text">{{ $loc['address'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function changeMap(url) {
        document.getElementById('mapIframe').src = url;
    }
</script>
@endsection
