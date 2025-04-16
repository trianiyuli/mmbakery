<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Bakery</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            scroll-behavior: smooth;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pastikan body mengambil tinggi penuh viewport */
        }
        .navbar {
            background-color: #ffffff;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: background 0.3s ease-in-out;
        }
        .nav-link {
            color: #611cb7 !important;
            transition: 0.1s;
        }
        .nav-link:hover {
            color: #611cb7 !important;
            font-weight: 800;
        }
        .content {
            margin-top: auto;
            padding-top: 74px; /* Tambahkan padding agar konten tidak tertutup navbar */
            flex: 1; /* Konten utama mengambil sisa ruang yang tersedia */
        }
        footer {
            background: #611cb7;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto; /* Footer akan selalu menempel di bagian bawah */
        }
        .logo {
            height: 40px;
        }
        .company-name {
            font-family: 'Brush Script MT', cursive;
            font-size: xx-large;
            color: #611cb7;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <!-- <img src="{{ asset('images/carousel/logo.png') }}" class="logo" alt="MM Bakery"> -->
            <span class="company-name">MM Bakery</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list" style="font-size: 1.5rem; color: #611cb7;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produk') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('outlet') }}">Outlet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
        </div>
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
</script>

</body>
</html>