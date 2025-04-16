@extends('layouts.app')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        /* Carousel styling */
        .carousel-item {
            height: 100vh; /* Memenuhi tinggi layar */
            position: relative;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Gambar proporsional dan memenuhi area */
            border-radius: 0; /* Hilangkan border-radius agar memenuhi layar */
        }
        .carousel-caption {
            position: absolute;
            top: 0; /* Menempel di bagian bawah */
            left: 0;
            width: 100%; /* Selebar gambar */
            height: 100%;
            /* background: rgba(0, 0, 0, 0.3); */
            background: linear-gradient(
                to bottom, 
                rgba(0, 0, 0, 0.7), /* Warna lebih gelap di atas */
                rgba(0, 0, 0, 0.3), /* Warna lebih transparan di tengah */
                rgba(0, 0, 0, 0));   /* Transparan sepenuhnya di bawah */
            padding: 20px;
            padding-top: 40px;
            text-align: center;
            border-radius: 0; /* Hilangkan border-radius agar menyatu dengan gambar */
        }

        .carousel-caption h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .carousel-caption p {
            font-size: 1.2rem;
        }

        /* Responsif: Ubah ukuran teks untuk layar kecil */
        @media (max-width: 768px) {

            .carousel-caption {
                padding: 10px;
            }
            .carousel-caption h2 {
                font-size: 1.5rem;
            }
            .carousel-caption p {
                font-size: 1rem;
            }
        }
        @media (max-width: 480px) {
            .carousel-caption h2 {
                font-size: 1.2rem;
            }
            .carousel-caption p {
                font-size: 0.9rem;
            }
        }
        #beranda{
            margin-top: 0 auto;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">

    <section id="beranda">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel/image2.png') }}" class="d-block w-100" alt="Roti 1">
                    <div class="carousel-caption">
                        <h2>Selamat Datang di MM Bakery</h2>
                        <p>Kami menyediakan berbagai macam roti segar dengan bahan berkualitas tinggi dan cita rasa terbaik.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/image1.png') }}" class="d-block w-100" alt="Roti 2">
                    <div class="carousel-caption">
                        <h2>Roti Segar Setiap Hari</h2>
                        <p>Dibuat dengan bahan pilihan dan dipanggang dengan sempurna.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/image3.jpg') }}" class="d-block w-100" alt="Roti 3">
                    <div class="carousel-caption">
                        <h2>Nikmati Kelezatan Kami</h2>
                        <p>Tersedia berbagai varian roti untuk setiap selera.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <span>halo</span>
    </section>
@endsection