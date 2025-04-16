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
        @endforeach
    </div>
</section>

<!-- CSS Custom -->
<style>
    /* Pengaturan ukuran gambar slide */
    .image-container {
        height: 250px; 
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        border-radius: 10px;
        padding: 10px;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    /* Efek saat hover */
    .img-hover:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease-in-out;
    }

    .img-hover:hover .image-container img {
        transform: scale(1.05);
    }
</style>

<!-- Tentang Kami -->

<section id="tentang" class="container my-5 pb-5" data-aos="fade-up"> 
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold">Tentang Kami</h2>
            <p class="text-justify" style="text-align: justify;">
                Pada tahun 2008, dengan pengalaman dan kecintaan mendalam terhadap dunia roti dan kue, MM Bakery lahir di Madiun. 
                Nama "MM" sendiri terinspirasi dari Maimunah, sosok ibu yang penuh kasih dan menjadi pilar utama di balik perjalanan sang pemilik. 
                Bagi beliau, seorang ibu adalah sumber kekuatan yang melahirkan keajaiban dalam setiap aspek kehidupan.
            </p>
            <p class="text-justify" style="text-align: justify;">
                Seiring berjalannya waktu, MM Bakery terus berkembang dan kini telah memiliki 6 outlet berkat dukungan serta kepercayaan dari pelanggan setia. 
                Kami berkomitmen untuk selalu menghadirkan kualitas terbaik dan pelayanan istimewa, agar setiap gigitan dari produk kami membawa kebahagiaan bagi Anda.
            </p>
        </div>
        <div class="col-md-6" data-aos="fade-left">
            <img src="{{ asset('images/carousel/tentang.jpg') }}" class="img-fluid rounded shadow" alt="Tentang MM Bakery">
        </div>
    </div>
</section>

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi dalam milidetik
        easing: 'ease-in-out', // Efek transisi
        once: true // Animasi hanya terjadi sekali saat di-scroll
    });
</script>

<!-- Outlet -->
<section id="outlet" class="container text-center my-5">
    <h2 class="fw-bold">Outlet Kami</h2>
    <p>Temukan outlet kami di berbagai lokasi strategis.</p>

    <div class="row justify-content-center mt-4">

<!-- Outlet Pusat -->
<div class="col-md-4 mb-4">
    <div class="card glassmorphism p-3 fade-in">
        <strong>Outlet Pusat</strong>
        <p>Jl. Mayor Jendral Di Panjaitan No.79, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137</p>
        <img src="{{ asset('images/foto_outlet/outletpusat.jpg') }} "class="rounded w-100" alt="Outlet Pusat">
        <a href="https://maps.app.goo.gl/7DtW4KQfvSSU2S6N6" target="_blank" class="btn btn-primary mt-2">Lihat di Google Maps</a>
    </div>
</div>

<!-- Outlet Cabang 1 -->
<div class="col-md-4 mb-4">
    <div class="card glassmorphism p-3 fade-in">
        <strong>Outlet Cabang 1</strong>
        <p>Jalan Raya Kajang RT.23/RW.4 Candi, Candi, Bagi, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151</p>
        <img src="{{ asset('images/foto_outlet/cabang1.jpg') }}"class="rounded w-100" alt="Outlet Cabang 1">
        <a href="https://maps.app.goo.gl/W7ab3HqBv6M9o85Q9" target="_blank" class="btn btn-primary mt-2">Lihat di Google Maps</a>
    </div>
</div>

<!-- Outlet Cabang 2 -->
<div class="col-md-4 mb-4">
    <div class="card glassmorphism p-3 fade-in">
        <strong>Outlet Cabang 2</strong>
        <p>Jl. Raya Pagotan, RT.30/RW.8, Gilingan, Uteran, Kec. Geger, Kabupaten Madiun, Jawa Timur 63171</p>
        <img src="{{ asset('images/foto_outlet/cabang1.jpg') }} "class="rounded w-100" alt="Outlet Cabang 2">
        <a href="https://maps.app.goo.gl/bjDdFzdCz7L4nE8V7" target="_blank" class="btn btn-primary mt-2">Lihat di Google Maps</a>
    </div>
</div>
</section>







<!-- Kontak -->
<section id="kontak" class="container text-center my-5">
    <h2 class="fw-bold">Hubungi Kami</h2>

    <div class="d-flex flex-column align-items-center">
        <div class="d-flex justify-content-center gap-4">
            <!-- WhatsApp -->
            <a href="https://wa.me/6281259176660" target="_blank" class="contact-icon text-success">
                <i class="bi bi-whatsapp fs-3"></i>
            </a>

            <!-- Email -->
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@mmbakerymadiun.com" 
             target="_blank" class="contact-icon text-primary">
                <i class="bi bi-envelope-fill fs-3"></i>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/mmmadiun1?igsh=bG8yNDA5eW5ocmNy" target="_blank" class="contact-icon text-danger">
                <i class="bi bi-instagram fs-3"></i>
            </a>
        </div>

        <p class="mt-2">
            <a href="https://wa.me/6281259176660" target="_blank" class="text-decoration-none text-dark"> 0812-5917-6660</a> |
            <a href="mailto:contact@mmbakerymadiun.com" target="_blank" class="text-decoration-none text-dark"> @mmbakerymadiun.com</a> |
            <a href="https://www.instagram.com/mmmadiun1?igsh=bG8yNDA5eW5ocmNy" target="_blank" class="text-decoration-none text-dark">@mmmadiun1</a>
        </p>
    </div>
</section>

<!-- CSS Custom -->
<style>
 .contact-icon {
    font-size: 2rem;
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
}

.contact-icon:hover {
    transform: scale(1.2);
}

.text-primary {
    color: #007bff !important; /* Warna biru khas Gmail */
}

/* Pusatkan ikon dan teks di bawahnya */
.d-flex.flex-column {
    gap: 10px;
}

.d-flex.justify-content-center {
    align-items: center;
}

.outlet-container {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.outlet-card {
    flex: 1;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 350px; /* Sesuaikan sesuai kebutuhan */
}

.outlet-map iframe {
    width: 100%;
    height: 250px; /* Tetapkan tinggi yang sama untuk semua */
    border-radius: 10px;
}

/* Efek hover pada kartu outlet */
.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px); /* Kartu sedikit naik */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Efek hover pada ikon kontak */
.contact-icon {
    font-size: 2rem;
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
}

.contact-icon:hover {
    transform: scale(1.2);
    filter: brightness(1.2);
}

/* Tambahan efek smooth hover pada bagian outlet */
.outlet-card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.outlet-card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}


</style>
