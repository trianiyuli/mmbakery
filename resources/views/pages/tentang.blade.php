@extends('layouts.app')

@section('title', 'Tentang Kami - MM Bakery')

@section('content')
<div class="bg-purple-50 py-12">
    <!-- Tentang Kami Section -->
    <section id="tentang" class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Gambar -->
            <div class="w-full lg:w-1/2">
                <div class="relative rounded-xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/carousel/tentang.jpg') }}" 
                         class="w-full h-auto object-cover" 
                         alt="Tentang MM Bakery">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/20 via-purple-900/10 to-transparent"></div>
                </div>
            </div>

            <!-- Teks -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Tentang Kami</h2>
                <div class="w-20 h-1 bg-purple-600 mb-6"></div>
                
                <div class="space-y-4 text-gray-700">
                    <p class="text-justify">
                        Pada tahun 2008, dengan pengalaman dan kecintaan mendalam terhadap dunia roti dan kue, MM Bakery lahir di Madiun.
                        Nama "MM" sendiri terinspirasi dari Maimunah, sosok ibu yang penuh kasih dan menjadi pilar utama di balik perjalanan sang pemilik.
                    </p>
                    <p class="text-justify">
                        Seiring berjalannya waktu, MM Bakery terus berkembang dan kini telah memiliki 6 outlet berkat dukungan serta kepercayaan dari pelanggan setia.
                        Kami berkomitmen untuk selalu menghadirkan kualitas terbaik dan pelayanan istimewa.
                    </p>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-purple-600">
                        <div class="text-2xl font-bold text-purple-600">2008</div>
                        <div class="text-sm text-gray-600">Tahun Berdiri</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-purple-600">
                        <div class="text-2xl font-bold text-purple-600">6+</div>
                        <div class="text-sm text-gray-600">Outlet</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi dan Misi Section -->
    <section id="visi-misi" class="max-w-6xl mx-auto px-4 mt-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Visi & Misi MM Bakery</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Visi Card -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-t-4 border-purple-600 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-purple-800">Visi MM GROUP</h3>
                </div>
                <p class="text-gray-700">
                    Menyediakan produk roti yang berkualitas tinggi dengan harga yang terjangkau serta mampu bersaing memberikan pelayanan prima terhadap konsumen.
                </p>
            </div>

            <!-- Misi Card -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-t-4 border-purple-600 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-purple-800">Misi MM GROUP</h3>
                </div>
                <ul class="space-y-3 text-gray-700 list-disc pl-5">
                    <li>Menciptakan tenaga kerja yang ahli dan kompeten serta memiliki IMTAQ dan IPTEK yang kuat.</li>
                    <li>Memberikan pelayanan prima/extra demi kepuasan konsumen.</li>
                    <li>Menjadi perusahaan yang mumpuni di bidangnya.</li>
                    <li>Memperluas lapangan kerja untuk masyarakat sekitar.</li>
                    <li>Menggunakan bahan berkualitas terbaik dengan proses produksi higienis untuk menjaga kesehatan konsumen.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sertifikasi Halal Section -->
    <section id="sertifikasi-halal" class="max-w-4xl mx-auto px-4 mt-16 bg-white rounded-xl shadow-lg p-8">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-auto flex-shrink-0">
                <img src="{{ asset('images/sertifikasi-halal.png') }}" 
                     alt="Sertifikasi Halal" 
                     class="w-32 h-32 object-contain">
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Sertifikasi Halal</h2>
                <div class="w-20 h-1 bg-purple-600 mb-4"></div>
                <p class="text-gray-700">
                    MM Bakery telah bersertifikat Halal dan menggunakan bahan-bahan berkualitas tinggi tanpa pengawet buatan, sehingga aman dan sehat untuk dikonsumsi oleh semua kalangan.
                </p>
                <div class="mt-4 flex items-center text-sm text-purple-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Bahan berkualitas tinggi
                </div>
                <div class="mt-1 flex items-center text-sm text-purple-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Tanpa pengawet buatan
                </div>
                <div class="mt-1 flex items-center text-sm text-purple-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Proses produksi higienis
                </div>
            </div>
        </div>
    </section>
</div>
@endsection