@extends('layouts.app')

@section('title', 'Tentang Kami - MM Bakery')

@section('content')
<section id="tentang" class="container my-5" data-aos="fade-up">
    <div class="row align-items-center">
        <!-- Gambar di Kiri -->
        <div class="col-md-6 text-center" data-aos="zoom-in">
            <img src="{{ asset('images/carousel/tentang.jpg') }}" class="img-fluid rounded shadow-lg" alt="Tentang MM Bakery">
        </div>

       <!-- Teks di Kanan -->
       <div class="col-md-6" style="font-family: 'Montserrat', sans-serif;">
            <h2 class="fw-semibold mb-4 text-dark">Tentang Kami</h2>
            <p class="text-dark" style="text-align: justify; font-size: 0.95rem; line-height: 1.6;">
                Pada tahun 2008, dengan pengalaman dan kecintaan mendalam terhadap dunia roti dan kue, MM Bakery lahir di Madiun.
                Nama "MM" sendiri terinspirasi dari Maimunah, sosok ibu yang penuh kasih dan menjadi pilar utama di balik perjalanan sang pemilik.
            </p>
            <p class="text-dark" style="text-align: justify; font-size: 0.95rem; line-height: 1.6;">
                Seiring berjalannya waktu, MM Bakery terus berkembang dan kini telah memiliki 6 outlet berkat dukungan serta kepercayaan dari pelanggan setia.
                Kami berkomitmen untuk selalu menghadirkan kualitas terbaik dan pelayanan istimewa.
            </p>
        </div>
    </div>
</section>

<!-- Visi dan Misi -->
<section id="visi-misi" class="container my-5 py-4 bg-light rounded shadow position-relative overflow-hidden" data-aos="fade-up">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #f9f9f9, #e6d4f6); z-index: -1;"></div>
    <div class="text-center mb-4">
        <h2 class="fw-semibold text-dark">Visi & Misi MM Bakery</h2>
    </div>
    <div class="row align-items-stretch">
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-right">
            <div class="p-4 bg-white rounded shadow-sm w-100 transition-card">
                <h3 class="fw-semibold text-primary">Visi MM GROUP</h3>
                <p class="text-secondary" style="text-align: justify; font-size: 0.95rem; line-height: 1.6;">
                    Menyediakan produk roti yang berkualitas tinggi dengan harga yang terjangkau serta mampu bersaing memberikan pelayanan prima terhadap konsumen.
                </p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-left">
            <div class="p-4 bg-white rounded shadow-sm w-100 transition-card">
                <h3 class="fw-semibold text-primary">Misi MM GROUP</h3>
                <ul class="text-secondary" style="text-align: justify; font-size: 0.95rem; line-height: 1.6;">
                    <li>Menciptakan tenaga kerja yang ahli dan kompeten serta memiliki IMTAQ dan IPTEK yang kuat.</li>
                    <li>Memberikan pelayanan prima/extra demi kepuasan konsumen.</li>
                    <li>Menjadi perusahaan yang mumpuni di bidangnya.</li>
                    <li>Memperluas lapangan kerja untuk masyarakat sekitar.</li>
                    <li>Menggunakan bahan berkualitas terbaik dengan proses produksi higienis untuk menjaga kesehatan konsumen.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Sertifikasi Halal -->
<section id="sertifikasi-halal" class="container my-5 py-4 bg-light rounded shadow position-relative overflow-hidden" data-aos="fade-up">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #f9f9f9, #e6d4f6); z-index: -1;"></div>
    <div class="text-center mb-4">
        <h2 class="fw-semibold text-dark">Sertifikasi Halal</h2>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <img src="{{ asset('images/sertifikasi-halal.png') }}" alt="Sertifikasi Halal" class="me-3" style="width: 90px;">
        <p class="text-dark" style="text-align: justify; font-size: 0.95rem; line-height: 1.6; max-width: 600px;">
            MM Bakery telah bersertifikat Halal dan menggunakan bahan-bahan berkualitas tinggi tanpa pengawet buatan, sehingga aman dan sehat untuk dikonsumsi oleh semua kalangan.
        </p>
    </div>
</section>

<!-- CSS Responsif -->
<style>
    @media (max-width: 768px) {
        #tentang .row, #visi-misi .row, #sertifikasi-halal .row {
            flex-direction: column-reverse;
            text-align: center;
        }
        #tentang img, #visi-misi img, #sertifikasi-halal img {
            margin-bottom: 20px;
            width: 80%;
        }
        #visi-misi .p-4, #sertifikasi-halal .p-4 {
            padding: 1.5rem;
        }
    }
    
    #visi-misi, #sertifikasi-halal {
        padding: 2rem;
        border-left: 5px solid #b58edc;
    }
    
    .transition-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .transition-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    
    .text-primary {
        color: #8a4bb9;
    }
    .text-secondary {
        color: #5d3b6a;
    }
</style>
@endsection
