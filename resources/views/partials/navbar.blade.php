<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="logo.png" alt="MM Bakery"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('outlets') }}">Outlet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>