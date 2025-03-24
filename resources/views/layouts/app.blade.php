<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Bakery</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <style>
        body { 
            background-color: #f5e6f7; 
            scroll-behavior: smooth; 
        }
        .navbar { 
            background-color: #c49dd8; 
            position: fixed; 
            width: 100%; 
            top: 0; 
            z-index: 1000; 
            transition: background 0.3s ease-in-out; 
            padding: 10px 0;
        }
        .nav-link { 
            color: black !important; 
            font-size: 18px; /* Perkecil font */
            font-weight: bold; /* Tebalkan font */
            padding: 15px 30px; /* Tambah jarak antar item */
            position: relative;
            transition: color 0.3s ease-in-out; 
        }
        .nav-link:hover, .nav-link.active { 
            color:rgb(122, 49, 141) !important; 
        }
        .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 3px;
            background-color: rgb(122, 49, 141);
            position: absolute;
            bottom: -5px;
            left: 0;
        }
        .content { 
            padding-top: 120px; /* Tambahkan padding agar konten tidak tertutup navbar */
        }
        footer { 
            background: #c49dd8; 
            color: white; 
            text-align: center; 
            padding: 10px; 
            margin-top: 30px; 
        }
        .logo { 
            height: 65px; /* Perbesar logo */
        }
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-nav {
            margin-left: auto; /* Geser menu ke kanan */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <!-- Logo di kiri -->
        <!-- <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/carousel/logo.png') }}" class="logo" alt="MM Bakery">
        </a> -->
        
        <!-- Navigasi di kanan -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produk') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('outlet') }}">Outlet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
        </div>
        
        <!-- Tombol toggle untuk mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Konten Dinamis dengan Efek AOS -->
<div class="content" data-aos="fade-up">
    @yield('content')
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 MM Bakery. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi dalam milidetik (1 detik)
        easing: "ease-in-out", // Efek transisi
        once: true, // Animasi hanya muncul sekali
    });

    // Tambahkan class 'active' ke link yang sedang aktif
    document.addEventListener("DOMContentLoaded", function() {
        let links = document.querySelectorAll(".nav-link");
        let currentUrl = window.location.href;
        links.forEach(link => {
            if (link.href === currentUrl) {
                link.classList.add("active");
            }
        });
    });
</script>

</body>
</html>