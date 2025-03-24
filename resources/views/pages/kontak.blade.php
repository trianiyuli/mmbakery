@extends('layouts.app')

@section('content')
<!-- Bagian Header -->
<div class="header-section position-relative">
    <div class="header-image-container">
        <img src="{{ asset('images/kontak/foto2.jpg') }}" class="img-fluid w-100 header-image" alt="Hubungi Kami">
    </div>
    <div class="overlay"></div>
    <div class="header-text text-center">
        <h1 class="font-weight-bold">HUBUNGI KAMI</h1>
        <p>Jika Anda memiliki pertanyaan atau saran tentang produk kami jangan ragu menghubungi kami. <br> 
            MM Bakery berkomitmen memberikan pelayanan terbaik untuk Anda</p>
    </div>
</div>

<!-- Bagian Informasi Kontak -->
<section class="contact-section">
    <div class="contact-info">
        <h2>Hubungi Kami Pada Kontak Informasi Dibawah</h2>

        <!-- Alamat dengan Google Maps -->
        <div class="icon">
            <img src="{{ asset('images/kontak/store-buyer.png') }}" alt="Store">
            <p>
                <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mayor+Jend.+Di+Panjaitan+No.79,+Banjarejo,+Kec.+Taman,+Kota+Madiun,+Jawa+Timur+63137" target="_blank">
                    Jl. Mayor Jend. Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137
                </a>
            </p>
        </div>

        <!-- Telepon dengan WhatsApp -->
        <div class="icon">
            <img src="{{ asset('images/kontak/whatsapp (1).png') }}" alt="Whatsapp">
            <p>
                <a href="https://wa.me/6281259176660" target="_blank">+62 812-5917-6660</a>
            </p>
        </div>

        <!-- Instagram -->
        <div class="icon">
            <img src="{{ asset('images/kontak/instagram (1).png') }}" alt="Instagram">
            <p>
                <a href="https://www.instagram.com/mmmadiun1/" target="_blank">@mmmadiun1</a>
            </p>
        </div>

        <!-- Email -->
        <div class="icon">
            <img src="{{ asset('images/kontak/clip-mail.png') }}" alt="Email">
            <p>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@mmbakerymadiun.com" target="_blank">
                    @mmbakerymadiun.com</a>
            </p>
        </div>
    </div>
</section>

<!-- Tambahkan CSS -->
<style>
    /* Styling untuk Header */
    .header-section {
        position: relative;
        width: 100%;
        height: 80vh;
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
        width: 100%;
        height: 100%;
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
        background: rgba(0, 0, 0, 0.5);
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

    /* Animasi header */
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .header-image-container {
        animation: floating 6s infinite ease-in-out;
    }

    /* Styling untuk kontak */

    /untuk whatsaap/
    .whatsapp-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #25D366; /* Warna khas WhatsApp */
    font-size: 20px;
    font-weight: bold;
    transition: color 0.3s ease;
    }

    .whatsapp-link:hover {
    color: #128C7E;
    }

    .whatsapp-icon {
    font-size: 40px; /* Ukuran ikon WhatsApp lebih besar */
    margin-right: 20px;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5e6f7;
    }

    .contact-section {
        background-color: #d3c1dbbd;
        padding: 50px;
        display: flex;
        text-align: center;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: rgb(0, 0, 0);
        border-radius: 20px;
        max-width: 900px;
        margin: 50px auto;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .contact-info {
        width: 60%;
        text-align: justify;
    }

    .contact-info h2 {
        font-size: 32px;
        font-weight: bold;
        text-align: center;
    }

    .contact-info p {
        font-size: 18px;
        margin: 10px 0;
    }

    .contact-info .icon {
        display: flex;
        align-items: center;
        margin: 15px 0;
    }

    .contact-info .icon img {
        width: 40px;
        height: 40px;
        margin-right: 15px;
    }

    /* Styling untuk link agar lebih menarik */
    .contact-info a {
        text-decoration: none;
        color: #000000;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .contact-info a:hover {
        color: #8a2be2;
    }

    .icon {
    display: flex;
    align-items: center;
    gap: 15px; /* Jarak antara ikon dan teks */
    margin-bottom: 15px; /* Jarak antara setiap baris */
}

    .icon i {
    font-size: 35px; /* Ukuran ikon */
    }

    .icon p {
    margin: 0; /* Reset margin */
    font-size: 18px; /* Ukuran teks */
    }

    /* Untuk layar kecil (mobile) */
    @media (max-width: 768px) {
    .icon {
        flex-direction: column;
        align-items: flex-start;
    }

    .icon i {
        font-size: 30px; /* Sedikit lebih kecil di mobile */
    }
}

</style>

@endsection