<div id="detailModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <div id="detailModalOverlay" class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity duration-300"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white text-gray-800 rounded-xl max-w-xl w-full mx-4 max-h-[90vh] overflow-hidden transform transition-all duration-500 scale-95 opacity-0 shadow-2xl relative"
            id="detailModalContent">
            <!-- Close Button -->
            <button onclick="closeDetailModal()" class="absolute top-4 right-4 z-10 bg-purple-100 hover:bg-purple-200 text-purple-800 hover:text-purple-900 p-2 rounded-full transition-all duration-300 shadow-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Product Image with Unggulan Badge -->
            <div class="relative h-64 overflow-hidden">
                <img id="detailImage" src="" class="w-full h-full object-cover" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent"></div>
                <div class="absolute bottom-4 left-4 flex gap-2">
                    <span id="detailCategory" class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg"></span>
                    <!-- Unggulan Badge (will be shown conditionally) -->
                    <span id="detailUnggulan" class="hidden bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-medium shadow-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Unggulan
                    </span>
                </div>
            </div>
            
            <!-- Product Content with Special Border for Unggulan -->
            <div id="detailContent" class="p-6 space-y-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 id="detailTitle" class="text-2xl font-bold text-gray-800"></h3>
                        <!-- Special Tagline for Unggulan -->
                        <p id="detailTagline" class="hidden text-yellow-600 text-sm font-medium mt-1">
                            Produk terbaik pilihan pelanggan!
                        </p>
                    </div>
                    <span id="detailPrice" class="text-xl font-bold text-purple-600"></span>
                </div>
                
                <!-- Description -->
                <div>
                    <p class="font-semibold text-gray-700 mb-2">Detail Produk</p>
                    <p id="detailDescription" class="text-gray-600 leading-relaxed"></p>
                </div>

                <!-- Action Buttons -->
                <div class="pt-4">
                    <!-- Beli Button (will be shown/hidden based on quantities state) -->
                    <button id="detailBuyBtn" class="btn-buy-detail w-full px-5 py-3 rounded-full text-sm transition-all duration-300 cursor-pointer shadow-sm hover:shadow-md flex items-center justify-center gap-2"
                            onclick="buyProductFromDetail()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                        Masukkan Keranjang
                    </button>
                    
                    <!-- Quantity Controls (hidden by default) -->
                    <div id="detailQtyControls" class="qty-controls-detail hidden flex items-center justify-center mt-4">
                        <button class="decrease-btn-detail bg-purple-100 hover:bg-purple-200 text-purple-800 font-bold py-2 px-4 rounded-l-full cursor-pointer transition-colors duration-200"
                                onclick="changeQuantityFromDetail(-1)">
                            -
                        </button>
                        <input type="number" min="1" value="1" 
                               id="detailQuantityInput"
                               class="quantity-input-detail w-16 text-center border-t border-b border-purple-200 py-2 focus:outline-none focus:ring-1 focus:ring-purple-500"
                               onchange="updateQuantityFromDetail(this.value)">
                        <button class="increase-btn-detail bg-purple-100 hover:bg-purple-200 text-purple-800 font-bold py-2 px-4 rounded-r-full cursor-pointer transition-colors duration-200"
                                onclick="changeQuantityFromDetail(1)">
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentDetailProductId = null;

    // Tampilkan modal detail produk dengan animasi
    function showDetailModal(product) {
        // Panggil fungsi untuk mengubah z-index navbar
        toggleNavbarZIndex(true);

        // Set basic product info
        document.getElementById('detailTitle').textContent = product.nama;
        document.getElementById('detailPrice').textContent = `Rp ${product.harga.toLocaleString('id-ID')}`;
        document.getElementById('detailCategory').textContent = product.kategori;
        document.getElementById('detailDescription').textContent = product.deskripsi || 'Tidak ada deskripsi';
        document.getElementById('detailImage').src = "{{ asset('storage/') }}/" + product.gambar;
        
        // Handle unggulan status
        const unggulanBadge = document.getElementById('detailUnggulan');
        const unggulanTagline = document.getElementById('detailTagline');
        const modalContent = document.getElementById('detailModalContent');
        
        if (product.unggulan) {
            // Show unggulan badge and tagline
            unggulanBadge.classList.remove('hidden');
            unggulanTagline.classList.remove('hidden');
            
            // Add special styling to modal
            modalContent.classList.add('border-t-4', 'border-yellow-400');
        } else {
            // Hide unggulan elements
            unggulanBadge.classList.add('hidden');
            unggulanTagline.classList.add('hidden');
            
            // Remove special styling
            modalContent.classList.remove('border-t-4', 'border-yellow-400');
        }

        // Set current product ID
        currentDetailProductId = product.id;

        // Update button style based on unggulan status
        const buyBtn = document.getElementById('detailBuyBtn');
        if (product.unggulan) {
            buyBtn.classList.add('bg-yellow-500', 'hover:bg-yellow-600', 'text-white');
            buyBtn.classList.remove('bg-purple-600', 'hover:bg-purple-700');
        } else {
            buyBtn.classList.add('bg-purple-600', 'hover:bg-purple-700', 'text-white');
            buyBtn.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
        }

        // Update button state based on quantities
        updateDetailButtonState(product.id);

        const modal = document.getElementById('detailModal');
        
        // Scroll ke atas sebelum menampilkan modal
        window.scrollTo(0, 0);
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        // Lock scroll
        document.body.style.overflow = 'hidden';
    }

    // Update button state in detail modal
    function updateDetailButtonState(productId) {
        const buyBtn = document.getElementById('detailBuyBtn');
        const qtyControls = document.getElementById('detailQtyControls');
        const quantityInput = document.getElementById('detailQuantityInput');

        if (quantities.hasOwnProperty(productId)) {
            // Product is in cart, show quantity controls
            buyBtn.classList.add('hidden');
            qtyControls.classList.remove('hidden');
            quantityInput.value = quantities[productId];
        } else {
            // Product not in cart, show buy button
            buyBtn.classList.remove('hidden');
            qtyControls.classList.add('hidden');
            quantityInput.value = 1;
        }
    }
    
    // Tutup modal detail dengan animasi
    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('detailModalContent');
        
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            // Unlock scroll
            document.body.style.overflow = 'auto';
            // Kembalikan z-index navbar
            toggleNavbarZIndex(false);
        }, 300);
    }

    // Fungsi untuk menambahkan produk ke keranjang dari modal detail
    function buyProductFromDetail() {
        if (!currentDetailProductId) return;

        quantities[currentDetailProductId] = 1;
        
        // Update UI in modal
        updateDetailButtonState(currentDetailProductId);
        
        // Update UI in product card if visible
        const productCard = document.querySelector(`.produk-item[data-id="${currentDetailProductId}"]`);
        if (productCard) {
            productCard.querySelector('.btn-buy').classList.add('hidden');
            productCard.querySelector('.qty-controls').classList.remove('hidden');
            productCard.querySelector('.quantity-input').value = 1;
        }
        
        updateConfirmButton();
    }

    // Fungsi untuk mengubah quantity dari modal detail
    function changeQuantityFromDetail(delta) {
        if (!currentDetailProductId) return;

        const input = document.getElementById('detailQuantityInput');
        let val = parseInt(input.value) + delta;
        
        // Jika decrease dan quantity menjadi 0
        if (val <= 0) {
            // Hapus dari quantities
            delete quantities[currentDetailProductId];
            
            // Update UI in modal
            updateDetailButtonState(currentDetailProductId);
            
            // Update UI in product card if visible
            const productCard = document.querySelector(`.produk-item[data-id="${currentDetailProductId}"]`);
            if (productCard) {
                productCard.querySelector('.btn-buy').classList.remove('hidden');
                productCard.querySelector('.qty-controls').classList.add('hidden');
            }
        } else {
            // Update quantity biasa
            input.value = val;
            quantities[currentDetailProductId] = val;
            
            // Update UI in product card if visible
            const productCard = document.querySelector(`.produk-item[data-id="${currentDetailProductId}"]`);
            if (productCard) {
                productCard.querySelector('.quantity-input').value = val;
            }
        }
        
        updateConfirmButton();
    }

    // Fungsi untuk update quantity langsung dari input di modal detail
    function updateQuantityFromDetail(val) {
        if (!currentDetailProductId) return;

        val = parseInt(val);
        const input = document.getElementById('detailQuantityInput');
        
        if (val <= 0) {
            // Hapus dari quantities
            delete quantities[currentDetailProductId];
            
            // Update UI in modal
            updateDetailButtonState(currentDetailProductId);
            
            // Update UI in product card if visible
            const productCard = document.querySelector(`.produk-item[data-id="${currentDetailProductId}"]`);
            if (productCard) {
                productCard.querySelector('.btn-buy').classList.remove('hidden');
                productCard.querySelector('.qty-controls').classList.add('hidden');
            }
        } else {
            // Update quantity biasa
            input.value = val;
            quantities[currentDetailProductId] = val;
            
            // Update UI in product card if visible
            const productCard = document.querySelector(`.produk-item[data-id="${currentDetailProductId}"]`);
            if (productCard) {
                productCard.querySelector('.quantity-input').value = val;
            }
        }
        
        updateConfirmButton();
    }
</script>