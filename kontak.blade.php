@extends('layouts.app')

@section('content')
<!-- Bagian Header -->
<div class="header-section position-relative">
    <div class="header-image-container">
        <img src="{{ asset('images/carousel/image3.jpg') }}" class="img-fluid w-100 header-image" alt="Hubungi Kami">
    </div>
    <div class="overlay"></div>
    <div class="header-text text-center">
        <h1 class="font-weight-bold">HUBUNGI KAMI</h1>
        <p>Jika Anda memiliki pertanyaan atau saran tentang produk kami jangan ragu menghubungi kami. <br> 
            MM Bakery berkomitmen memberikan pelayanan terbaik untuk Anda</p>
    </div>
</div>

<!-- Bagian Informasi Kontak -->
<div class="container text-center py-5">
    <div class="row justify-content-center mt-4">
        <!-- Instagram -->
        <div class="col-md-4">
            <a href="https://www.instagram.com/mmmadiun1?igsh=bG8yNDA5eW5ocmNy" target="_blank" class="text-decoration-none">
                <div class="card p-3 shadow contact-card">
                    <div class="text-center">
                        <img src="{{ asset('images/carousel/iconIG.png') }}" alt="Instagram" width="70">
                    </div>
                    <h5 class="mt-3 font-weight-bold">Instagram MM Bakery</h5>
                    <p>@mmmadiun1</p>
                </div>
            </a>
        </div>
        
        <!-- Nomor Telepon (WhatsApp) -->
        <div class="col-md-4">
            <a href="https://wa.me/6281259176660" target="_blank" class="text-decoration-none">
                <div class="card p-3 shadow contact-card">
                    <div class="text-center">
                        <img src="{{ asset('images/carousel/iconWA.png') }}" alt="WhatsApp" width="70">
                    </div>
                    <h5 class="mt-3 font-weight-bold">Nomor MM Bakery</h5>
                    <p>+62 812-5917-6660</p>
                </div>
            </a>
        </div>
        
        <!-- Email -->
        <div class="col-md-4">
            <a href="mailto:mmbakery@gmail.com?subject=Pertanyaan%20Tentang%20MM%20Bakery&body=Halo%20MM%20Bakery," class="text-decoration-none">
                <div class="card p-3 shadow contact-card">
                    <div class="text-center">
                        <img src="{{ asset('images/carousel/iconsEmail.png') }}" alt="Email" width="70">
                    </div>
                    <h5 class="mt-3 font-weight-bold">Email MM Bakery</h5>
                    <p>mmbakery@gmail.com</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Tambahkan CSS -->
<style>
    /* Styling untuk Header */
    .header-section {
        position: relative;
        width: 100%;
        height: 500px; /* Lebih besar */
        overflow: hidden;
    }

    .header-image-container {
        width: 100%;
        height: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-image {
        width: 110%;
        height: auto;
        transition: transform 5s ease-in-out;
    }

    .header-image:hover {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Efek transparan gelap */
    }

    .header-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        max-width: 80%;
        z-index: 2;
    }

    h1 {
        font-size: 3.5rem;
    }

    p {
        font-size: 1.3rem;
    }

    /* Efek Hover untuk Kartu Kontak */
    .contact-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-30px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Animasi agar gambar header sedikit bergerak */
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .header-image-container {
        animation: floating 6s infinite ease-in-out;

    }
</style>
@endsection

