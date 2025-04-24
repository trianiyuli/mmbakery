<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Bakery</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">

    <!-- Tailwind & AOS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .company-name {
            font-family: 'Brush Script MT', cursive;
        }
        nav a {
            color: #611cb7;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        nav a:hover {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl text-[#611cb7] font-bold company-name">MM Bakery</a>

        <!-- Desktop Navigation -->
        <ul class="hidden md:flex space-x-6 items-center">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('produk') }}">Produk</a></li>
            <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
            <li><a href="{{ route('outlet') }}">Outlet</a></li>
            <li><a href="{{ route('kontak') }}">Kontak</a></li>
        </ul>

        <!-- Hamburger Button -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-[#611cb7] text-2xl focus:outline-none">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden" x-show="open" x-transition>
        <ul class="bg-white space-y-2 px-4 pb-4">
            <li><a href="{{ route('home') }}" class="block">Beranda</a></li>
            <li><a href="{{ route('produk') }}" class="block">Produk</a></li>
            <li><a href="{{ route('tentang') }}" class="block">Tentang Kami</a></li>
            <li><a href="{{ route('outlet') }}" class="block">Outlet</a></li>
            <li><a href="{{ route('kontak') }}" class="block">Kontak</a></li>
        </ul>
    </div>
</nav>

<!-- Konten Dinamis -->
<div class="pt-24 flex-1" data-aos="fade-up">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-[#611cb7] text-white text-center py-4">
    <p>&copy; 2025 MM Bakery. All rights reserved.</p>
</footer>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
    });
</script>

</body>
</html>
