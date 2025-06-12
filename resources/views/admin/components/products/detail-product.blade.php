<div id="detailModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 p-2 sm:p-4 backdrop-blur overflow-y-auto">
    <div class="bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-2xl overflow-hidden transform transition-all duration-300 ease-out scale-95 opacity-0 my-4">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 sm:p-6">
            <h3 class="text-xl sm:text-2xl font-bold text-white" id="detailTitle">Detail Produk</h3>
        </div>
        
        <!-- Modal Content -->
        <div class="p-4 sm:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8">
                <!-- Product Image -->
                <div class="rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                    <img id="detailImage" src="" alt="Gambar Produk" class="w-full h-48 sm:h-64 object-cover">
                </div>
                
                <!-- Product Details -->
                <div class="space-y-3 sm:space-y-5">
                    <!-- Product Name -->
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-gray-900" id="detailName"></h4>
                        <div class="border-b border-gray-200 pt-2"></div>
                    </div>
                    
                    <!-- Price & Category -->
                    <div class="grid grid-cols-2 gap-2 sm:gap-4">
                        <div class="bg-blue-50 rounded-lg p-2 sm:p-3">
                            <p class="text-xs font-medium text-blue-600">Harga</p>
                            <p class="text-base sm:text-lg font-bold text-gray-900" id="detailPrice"></p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-2 sm:p-3">
                            <p class="text-xs font-medium text-blue-600">Kategori</p>
                            <p class="text-base sm:text-lg font-bold text-gray-900" id="detailCategory"></p>
                        </div>
                    </div>
                    
                    <!-- Featured Status -->
                    <div id="detailFeatured" class="flex items-center">
                        <span class="bg-blue-50 text-blue-600 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Produk Unggulan
                        </span>
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 mb-2">Deskripsi Produk</p>
                        <div class="bg-gray-50 rounded-lg p-3 sm:p-4">
                            <p class="text-sm sm:text-base text-gray-700" id="detailDescription"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="bg-gray-50 px-4 sm:px-6 py-3 sm:py-4 flex justify-end border-t border-gray-200">
            <button type="button" onclick="closeDetailModal()" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 cursor-pointer">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function openDetailModal(productId) {
        fetch(`/admin/products/${productId}`)
            .then(response => response.json())
            .then(product => {
                // Set content
                document.getElementById('detailTitle').textContent = 'Detail Produk';
                document.getElementById('detailName').textContent = product.nama;
                document.getElementById('detailPrice').textContent = `Rp ${product.harga.toLocaleString('id-ID')}`;
                document.getElementById('detailCategory').textContent = product.kategori.split('-').map(word => 
                    word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                
                // Handle featured product
                const featuredElement = document.getElementById('detailFeatured');
                if (product.unggulan) {
                    featuredElement.innerHTML = `
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-900">Produk Unggulan</span>
                    `;
                } else {
                    featuredElement.innerHTML = `
                        <span class="text-sm text-gray-500">Produk Biasa</span>
                    `;
                }
                
                // Handle description
                document.getElementById('detailDescription').textContent = 
                    product.deskripsi || 'Tidak ada deskripsi tersedia';
                
                // Set image
                const imageElement = document.getElementById('detailImage');
                imageElement.src = `/storage/${product.gambar}`;
                imageElement.alt = product.nama;
                
                // Show modal with animation
                const modal = document.getElementById('detailModal');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
                    modal.querySelector('div').classList.add('scale-100', 'opacity-100');
                }, 10);
                document.body.classList.add('overflow-hidden');
            });
    }

    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    // Handle click outside modal
    document.getElementById('detailModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeDetailModal();
        }
    });
</script>