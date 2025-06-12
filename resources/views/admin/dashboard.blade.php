@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<style>
    .backdrop-blur {
        backdrop-filter: blur(2px);
    }
</style>
<div class="container mx-auto px-4 lg:px-8 py-6 lg:py-8">
    <!-- Include Modal Tambah User -->
    @include('admin.components.add-user')
    
    <!-- Include Modal Tambah Produk -->
    @include('admin.components.products.add-product')

    <!-- Statistik dan Akses Cepat -->
    <div class="grid gap-3 sm:gap-6 lg:gap-8 mb-6 sm:mb-8">
        <!-- Total dan Akses Cepat dalam Satu Baris -->
        <div class="grid grid-cols-4 gap-3 sm:gap-6">
            <!-- Total Pengguna -->
            <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 flex flex-col items-center justify-center text-center border border-gray-200 hover:border-blue-200 transition-colors duration-300">
                <div class="bg-blue-50 p-2 sm:p-3 rounded-lg mb-2 sm:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-[10px] sm:text-xs font-medium text-gray-500 mb-0.5">Total User</h3>
                <p class="text-base sm:text-xl font-bold text-gray-900">{{ $totalUsers }}</p>
            </div>

            <!-- Total Produk -->
            <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 flex flex-col items-center justify-center text-center border border-gray-200 hover:border-blue-200 transition-colors duration-300">
                <div class="bg-blue-50 p-2 sm:p-3 rounded-lg mb-2 sm:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-[10px] sm:text-xs font-medium text-gray-500 mb-0.5">Total Produk</h3>
                <p class="text-base sm:text-xl font-bold text-gray-900">{{ $totalProducts }}</p>
            </div>

            <!-- Akses Cepat ke Pengguna -->
            <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 flex flex-col items-center justify-between text-center border border-gray-200 hover:border-blue-200 transition-colors duration-300 group cursor-pointer" onclick="openAddUserModal()">
                <div class="flex flex-col items-center">
                    <div class="bg-blue-50 p-2 sm:p-3 rounded-lg mb-2 sm:mb-3 group-hover:bg-blue-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <h3 class="text-[10px] sm:text-xs font-medium text-gray-900 mb-0.5">Tambah User</h3>
                </div>
                <a href="{{ route('admin.users') }}" class="w-full mt-2 px-2 sm:px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-[10px] sm:text-xs font-medium rounded-lg transition duration-300 flex items-center justify-center">
                    Kelola
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- Akses Cepat ke Produk -->
            <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 flex flex-col items-center justify-between text-center border border-gray-200 hover:border-blue-200 transition-colors duration-300 group cursor-pointer" onclick="openAddProductModal()">
                <div class="flex flex-col items-center">
                    <div class="bg-blue-50 p-2 sm:p-3 rounded-lg mb-2 sm:mb-3 group-hover:bg-blue-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <h3 class="text-[10px] sm:text-xs font-medium text-gray-900 mb-0.5">Tambah Produk</h3>
                </div>
                <a href="{{ route('admin.products') }}" class="w-full mt-2 px-2 sm:px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-[10px] sm:text-xs font-medium rounded-lg transition duration-300 flex items-center justify-center">
                    Kelola
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Produk Unggulan -->
    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-5 lg:p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4 sm:mb-5">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">Produk Unggulan</h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Daftar produk yang direkomendasikan</p>
            </div>
            <a href="{{ route('admin.products') }}" class="inline-flex items-center text-xs sm:text-sm text-blue-600 hover:text-blue-700 font-medium">
                Lihat semua
                <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        @if($featuredProducts->isEmpty())
            <div class="text-center py-6 sm:py-8">
                <div class="bg-blue-50 rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center mx-auto mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Belum Ada Produk Unggulan</h3>
                <p class="text-xs sm:text-sm text-gray-500 mb-3 sm:mb-4">Tambahkan produk unggulan untuk ditampilkan di sini</p>
                <a href="{{ route('admin.products') }}" class="inline-flex items-center justify-center px-3 sm:px-4 py-1.5 sm:py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium rounded-lg transition duration-300">
                    Tambah Produk Unggulan
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:border-blue-200 transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" 
                             class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                        <div class="absolute top-1.5 right-1.5">
                            <span class="bg-blue-100 text-blue-600 text-[10px] font-medium px-1.5 py-0.5 rounded-full">
                                Unggulan
                            </span>
                        </div>
                    </div>
                    <div class="p-2 sm:p-3">
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-900 mb-0.5 line-clamp-1">{{ $product->nama }}</h3>
                        <p class="text-[10px] sm:text-xs text-gray-500 mb-1.5 line-clamp-2">{{ $product->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            <span class="text-[10px] font-medium text-gray-500 bg-gray-100 px-1.5 py-0.5 rounded-full">
                                {{ ucfirst(str_replace('-', ' ', $product->kategori)) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
    // Function to open add user modal
    function openAddUserModal() {
        const modal = document.getElementById('add-user-modal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Function to open add product modal
    function openAddProductModal() {
        const modal = document.getElementById('addModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    function closeAddUserModal() {
        const modal = document.getElementById('add-user-modal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Handle click outside modals to close
    document.addEventListener('DOMContentLoaded', function() {
        // User modal
        const userModal = document.getElementById('add-user-modal');
        if (userModal) {
            userModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeAddUserModal();
                }
            });
        }
        
        // Product modal
        const productModal = document.getElementById('addModal');
        if (productModal) {
            productModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeAddModal();
                }
            });
        }

        function closeAddModal() {
            const modal = document.getElementById('addModal');
            modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
            modal.querySelector('div').classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
        
        // Auto close notification if exists
        const notification = document.getElementById('success-notification');
        if (notification) {
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    });
</script>
@endsection