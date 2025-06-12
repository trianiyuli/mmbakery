@extends('layouts.admin')

@section('title', 'Products')
@section('page_title', 'Products Overview')

@section('content')
<style>
    .backdrop-blur {
        backdrop-filter: blur(2px);
    }
    /* Glow effect for star */
    .drop-shadow-glow {
        filter: drop-shadow(0 0 6px #facc15);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    /* Responsive table styles */
    @media (max-width: 768px) {
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .table-responsive table {
            width: 100%;
            min-width: 500px;
        }
    }
    /* Horizontal scroll for featured products on mobile */
    @media (max-width: 640px) {
        .featured-products-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding-bottom: 0.75rem;
        }
        .featured-products-container::-webkit-scrollbar {
            display: none;
        }
        .featured-products-grid {
            display: flex !important;
            gap: 0.75rem !important;
            padding: 0.25rem;
            width: fit-content;
        }
        .featured-card {
            width: 250px !important;
            flex-shrink: 0 !important;
        }
    }
</style>
<div class="container mx-auto px-4 lg:px-8 py-6">
    <!-- === SECTION PRODUK UNGGULAN (HIGHLIGHT) === -->
    <div id="featuredProductsSection" class="mb-6">
        <div class="flex items-center gap-2 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-yellow-500 drop-shadow-glow flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
            </svg>
            <h2 class="text-lg sm:text-xl font-bold text-gray-900 tracking-wide whitespace-nowrap">Produk Unggulan</h2>
            <div class="flex-1 border-b border-gray-200 ml-2 hidden sm:block"></div>
        </div>
        <div class="featured-products-container">
            <div class="featured-products-grid w-full sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php $featured = $products->where('unggulan', true)->take(3); @endphp
                @forelse($featured as $product)
                    <div class="featured-card relative bg-white border border-gray-200 hover:border-blue-200 rounded-lg shadow-sm hover:shadow-md p-4 flex flex-col items-center transition-all duration-300">
                        <span class="absolute -top-2 left-1/2 -translate-x-1/2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full shadow-sm border border-yellow-200 z-10 whitespace-nowrap">Unggulan</span>
                        <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama }}" class="h-20 w-20 sm:h-24 sm:w-24 rounded-full object-cover border-2 border-blue-100 hover:border-yellow-100 shadow-sm mb-3 transition-all">
                        <div class="text-base sm:text-lg font-bold text-gray-900 text-center mb-1.5 line-clamp-2">{{ $product->nama }}</div>
                        <div class="text-sm text-blue-600 mb-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
                        <div class="flex items-center gap-2 mt-auto">
                            <button class="toggle-featured-btn cursor-pointer" data-id="{{ $product->id }}" title="Hapus dari unggulan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-yellow-500 drop-shadow-glow" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                                </svg>
                            </button>
                            <button onclick="openDetailModal({{ $product->id }})" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-full shadow-sm transition cursor-pointer whitespace-nowrap">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500 col-span-full text-center py-8 text-sm">Belum ada produk unggulan.</div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- === END SECTION PRODUK UNGGULAN (HIGHLIGHT) === -->

    <!-- Filter and Add Product Button -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
        <!-- Category Filter and Search Container -->
        <div class="flex-1 flex flex-col sm:flex-row gap-4">
            <!-- Category Filter -->
            <div class="overflow-x-auto -mx-2 px-2">
                <div class="flex gap-2 min-w-max">
                    <a href="{{ route('admin.products') }}" 
                       class="px-4 py-2 rounded-md text-sm whitespace-nowrap {{ !request('category') || request('category') === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach(['roti-manis', 'donat', 'cake', 'pizza', 'tart'] as $category)
                        <a href="{{ route('admin.products', ['category' => $category]) }}" 
                           class="px-4 py-2 rounded-md text-sm whitespace-nowrap {{ request('category') === $category ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ ucfirst(str_replace('-', ' ', $category)) }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Search Box with Button -->
            <div class="flex-1 flex">
                <div class="relative flex-1">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Cari produk..." 
                           class="w-full px-4 py-2 bg-white border border-r-0 border-gray-300 rounded-l-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 text-sm" 
                           value="{{ request('search') }}">
                    <button id="searchButton"
                            class="absolute right-0 top-0 h-full px-4 bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-r-md border border-gray-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Add Product Button -->
        <button onclick="openAddModal()" 
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition cursor-pointer text-sm font-medium whitespace-nowrap">
            Tambah Produk
        </button>
    </div>

    <!-- Products Table -->
    <div id="productsTable" class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 table-responsive">
        @include('admin.partials.products_table', ['products' => $products])
    </div>

    <!-- Pagination -->
    <div id="productsPagination" class="mt-4">
        {{ $products->links('admin.partials.products_pagination', ['products' => $products]) }}
    </div>
</div>

<!-- Include Modals -->
@include('admin.components.products.add-product')
@include('admin.components.products.edit-product')
@include('admin.components.products.delete-product')
@include('admin.components.products.detail-product')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Search functionality
    function performSearch() {
        const searchValue = document.getElementById('searchInput').value;
        const category = new URLSearchParams(window.location.search).get('category') || 'all';
        window.location.href = `/admin/products?search=${searchValue}&category=${category}`;
    }

    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    document.getElementById('searchButton').addEventListener('click', function() {
        performSearch();
    });

    // AJAX pagination
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#productsPagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                fetchPage(this.href);
            });
        });
    });

    function fetchPage(url) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // Update table
                document.getElementById('productsTable').innerHTML = 
                    doc.querySelector('#productsTable').innerHTML;
                
                // Update pagination
                document.getElementById('productsPagination').innerHTML = 
                    doc.querySelector('#productsPagination').innerHTML;
                
                // Re-attach event listeners
                document.querySelectorAll('#productsPagination a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        fetchPage(this.href);
                    });
                });
            });
    }

    // === TOGGLE UNGGULAN JS (HIGHLIGHT) ===
    function refreshProductsPage() {
        // Reload seluruh halaman (atau bisa AJAX partial jika ingin lebih advance)
        window.location.reload();
    }

    function toggleFeatured(productId) {
        fetch(`/admin/products/${productId}/toggle-featured`, {
            method: 'PATCH',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(async response => {
            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status unggulan berhasil diupdate.',
                        showConfirmButton: true,
                        timer: 1000,
                        timerProgressBar: true
                    }).then(() => {
                        refreshProductsPage();
                    });
                }
            } else if (response.status === 422) {
                const data = await response.json();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message || 'Maksimal hanya 3 produk unggulan.',
                    showConfirmButton: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan server.'
                });
            }
        })
        .catch(() => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Tidak dapat terhubung ke server.'
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Section unggulan
        document.querySelectorAll('.toggle-featured-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                toggleFeatured(id);
            });
        });
        // Tabel produk
        document.querySelectorAll('.toggle-featured-btn-table').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                toggleFeatured(id);
            });
        });
    });
    // === END TOGGLE UNGGULAN JS (HIGHLIGHT) ===
</script>
@endsection