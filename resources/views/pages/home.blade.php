@extends('layouts.app')

@section('content')

<!-- Tampilan Awal
<section id="intro" class="text-center py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di MM Bakery</h1>
        <p class="lead">Menyediakan berbagai macam kue lezat dan berkualitas tinggi untuk setiap momen spesial Anda.</p>
        <p class="fst-italic"><strong>"Lezat, Berkualitas, dan Penuh Cinta"</strong></p>
    </div>
</section> -->

<!-- Banner Promo -->
<section id="beranda">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel/image1.png') }}" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Promo 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                    <h5>Diskon Spesial!</h5>
                    <p>Dapatkan promo menarik setiap minggu.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/image2.png') }}" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Promo 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                    <h5>Roti Fresh Setiap Hari</h5>
                    <p>Dibuat dengan bahan berkualitas terbaik.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/image3.jpg') }}" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Promo 3">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                    <h5>Promo Eksklusif</h5>
                    <p>Temukan varian baru favorit Anda.</p>
                </div>
            </div>
        </div>
        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Produk Unggulan Kami -->
<section id="produk" class="container my-5">
    <h2 class="text-center fw-bold">Produk Unggulan Kami</h2>
    <div class="row g-4">
        @foreach([['Roti Pisang Keju', 'unggulan1.jpg'], ['Coklat Pisang', 'unggulan2.jpg'], ['Srikaya Pandan', 'unggulan3.jpg']] as $produk)
        <div class="col-md-4">
            <div class="card shadow-sm border-0 img-hover">
                <div class="image-container">
                    <img src="{{ asset('images/produk/'.$produk[1]) }}" class="card-img-top" alt="{{ $produk[0] }}">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $produk[0] }}</h5>
                </div>
            </div>
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
