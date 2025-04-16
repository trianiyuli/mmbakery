@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Cabang MM Bakery</h1>
    <p class="text-center">Kunjungi outlet kami di lokasi berikut:</p>

    <div class="row">
        <!-- Kolom untuk Map -->
        <div class="col-md-6">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>

        <!-- Kolom untuk daftar outlet -->
        <div class="col-md-6">
            @forelse ($outlets as $outlet)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $outlet['name'] }}</h5>
                        <p class="card-text">{{ $outlet['address'] }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada outlet yang terdaftar.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Tambahkan CSS dan JS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('map').setView([-6.200000, 106.816666], 10); // Pusat peta (Jakarta)

        // Tambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Ambil data outlet dari Laravel
        var outlets = @json($outlets);

        if (Array.isArray(outlets) && outlets.length > 0) {
            outlets.forEach(function(outlet) {
                let lat = parseFloat(outlet.lat);
                let lng = parseFloat(outlet.lng);

                if (!isNaN(lat) && !isNaN(lng)) {
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup(`<b>${outlet.name}</b><br>${outlet.address}`);
                } else {
                    console.warn("Data outlet tidak valid:", outlet);
                }
            });
        } else {
            console.warn("Tidak ada outlet yang tersedia.");
        }
    });
</script>

@endsection
