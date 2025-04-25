<footer class="text-center py-3 bg-light">
    <p>&copy; {{ date('Y') }} MM Bakery. All rights reserved.</p>
</footer>

// pages/home.blade.php
@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <section id="beranda" class="container">
        <h1 class="text-center">Selamat Datang di MM Bakery</h1>
    </section>
@endsection