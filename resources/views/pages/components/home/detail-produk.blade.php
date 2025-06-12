<!-- Modal Detail Produk Unggulan -->
<!-- Modal Detail Produk Unggulan -->
<div id="featuredDetailModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <div id="featuredDetailModalOverlay" class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity duration-300"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white text-gray-800 rounded-xl max-w-lg w-full mx-4 max-h-[90vh] overflow-hidden transform transition-all duration-500 scale-95 opacity-0 shadow-2xl relative"
            id="featuredDetailModalContent">
            <!-- Close Button -->
            <button onclick="closeFeaturedDetailModal()" class="absolute top-4 right-4 z-10 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 hover:text-yellow-900 p-2 rounded-full transition-all duration-300 shadow-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Product Image with Gold Particles -->
            <div class="relative h-64 overflow-hidden">
                <img id="featuredDetailImage" src="" class="w-full h-full object-cover" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent"></div>
                
                <!-- Floating Gold Particles -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute top-1/4 left-1/4 w-3 h-3 rounded-full bg-yellow-400 opacity-70 animate-[particle-float_8s_infinite]"></div>
                    <div class="absolute top-1/3 right-1/3 w-2 h-2 rounded-full bg-amber-300 opacity-80 animate-[particle-float_6s_infinite_reverse]"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-3 h-3 rounded-full bg-yellow-500 opacity-60 animate-[particle-float_7s_infinite]"></div>
                    <div class="absolute bottom-1/3 left-1/3 w-2 h-2 rounded-full bg-amber-400 opacity-90 animate-[particle-float_5s_infinite_reverse]"></div>
                </div>
                
                <!-- Category & Featured Badge -->
                <div class="absolute bottom-4 left-4 flex gap-2">
                    <span id="featuredDetailCategory" class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg"></span>
                    <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-medium shadow-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Unggulan
                    </span>
                </div>
            </div>
            
            <!-- Product Content with Gold Accent -->
            <div id="featuredDetailContent" class="p-6 space-y-4 border-t-4 border-yellow-400 overflow-y-auto" style="max-height: calc(90vh - 16rem)">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 id="featuredDetailTitle" class="text-2xl font-bold text-gray-800"></h3>
                        <p class="text-yellow-600 text-sm font-medium mt-1">
                            Produk terbaik pilihan pelanggan!
                        </p>
                    </div>
                    <span id="featuredDetailPrice" class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-amber-600"></span>
                </div>
                
                <!-- Description -->
                <div>
                    <p class="font-semibold text-gray-700 mb-1">Detail Produk</p>
                    <p id="featuredDetailDescription" class="text-gray-600 leading-relaxed text-sm"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Fungsi untuk menampilkan modal detail produk unggulan
    function showFeaturedDetailModal(product) {
        // Panggil fungsi untuk mengubah z-index navbar
        toggleNavbarZIndex(true);

        // Set basic product info
        document.getElementById('featuredDetailTitle').textContent = product.nama;
        document.getElementById('featuredDetailPrice').textContent = `Rp ${product.harga.toLocaleString('id-ID')}`;
        document.getElementById('featuredDetailCategory').textContent = product.kategori;
        document.getElementById('featuredDetailDescription').textContent = product.deskripsi || 'Tidak ada deskripsi';
        document.getElementById('featuredDetailImage').src = "{{ asset('storage/') }}/" + product.gambar;

        const modal = document.getElementById('featuredDetailModal');
        
        // Scroll ke atas sebelum menampilkan modal
        window.scrollTo(0, 0);
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('featuredDetailModalContent').classList.remove('scale-95', 'opacity-0');
            document.getElementById('featuredDetailModalContent').classList.add('scale-100', 'opacity-100');
        }, 10);
        
        // Lock scroll
        document.body.style.overflow = 'hidden';
    }
    
    // Fungsi untuk menutup modal detail produk unggulan
    function closeFeaturedDetailModal() {
        const modalContent = document.getElementById('featuredDetailModalContent');
        
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            document.getElementById('featuredDetailModal').classList.add('hidden');
            // Unlock scroll
            document.body.style.overflow = 'auto';
            // Kembalikan z-index navbar
            toggleNavbarZIndex(false);
        }, 300);
    }

    // Fungsi untuk setup modal
    function setupFeaturedModalCloseOnOutsideClick() {
        document.getElementById('featuredDetailModalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeFeaturedDetailModal();
            }
        });
    }

    // Panggil fungsi setup saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        setupFeaturedModalCloseOnOutsideClick();
    });
</script>