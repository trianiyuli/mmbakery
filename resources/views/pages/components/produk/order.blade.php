<!-- Order Summary Modal -->
<div id="orderModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div id="orderModalOverlay" class="fixed inset-0 bg-black/50 transition-opacity duration-300"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0 shadow-xl"
            id="orderModalContent">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">Ringkasan Pesanan</h3>
                    <button onclick="closeOrderModal()" class="text-gray-500 hover:text-gray-700 cursor-pointer transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nama Pemesan:</label>
                    <input type="text" id="customerName" placeholder="Masukkan nama Anda" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                </div>
                
                <div id="orderSummary" class="mb-6 space-y-3"></div>
                
                <div class="mb-6">
                    <p class="font-semibold mb-2">Metode Pengiriman:</p>
                    <div class="flex gap-4 mb-4">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="deliveryMethod" value="delivery" class="text-purple-600 focus:ring-purple-500" onchange="toggleDeliveryFields()">
                            <span>Delivery</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="deliveryMethod" value="pickup" class="text-purple-600 focus:ring-purple-500" onchange="toggleDeliveryFields()">
                            <span>Pickup</span>
                        </label>
                    </div>
                    
                    <div id="addressField" class="hidden mb-4">
                        <label class="block font-semibold mb-1">Alamat Pengiriman:</label>
                        <input type="text" id="deliveryAddress" placeholder="Masukkan alamat lengkap" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                    </div>
                    
                    <div id="pickupField" class="hidden mb-4">
                        <label class="block font-semibold mb-1">Pilih Cabang:</label>
                        <select id="pickupLocation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                            <option value="">Pilih Cabang</option>
                            <option>MM Bakery Pusat Madiun</option>
                            <option>MM Bakery Cab. Bagi</option>
                            <option>MM Bakery Cab. Pagotan</option>
                        </select>
                    </div>
                </div>
                
                <button onclick="confirmOrder()" 
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-md transition-all duration-300 cursor-pointer flex items-center justify-center gap-2 shadow-md hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                    </svg>
                    Pesan via WhatsApp
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Tampilkan ringkasan pesanan dengan animasi 33333333333333333333333333333333
    function showOrderSummary() {
        // Panggil fungsi untuk mengubah z-index navbar
        toggleNavbarZIndex(true);

        const summary = document.getElementById('orderSummary');
        summary.innerHTML = '';
        let total = 0;
        
        for (let id in quantities) {
            const product = productsData.find(p => p.id == id);
            const qty = quantities[id];
            const subtotal = qty * product.harga;
            
            summary.innerHTML += `
                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                    <div>
                        <p class="font-medium">${product.nama}</p>
                        <p class="text-sm text-gray-500">${qty} x Rp ${product.harga.toLocaleString('id-ID')}</p>
                    </div>
                    <span class="font-semibold">Rp ${subtotal.toLocaleString('id-ID')}</span>
                </div>
            `;
            total += subtotal;
        }
        
        summary.innerHTML += `
            <div class="flex justify-between font-bold text-lg mt-4 pt-2 border-t border-gray-200">
                <span>Total</span>
                <span class="text-purple-600">Rp ${total.toLocaleString('id-ID')}</span>
            </div>
        `;
        
        const modal = document.getElementById('orderModal');
        const modalContent = document.getElementById('orderModalContent');
        
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
    
    // Tutup modal pesanan dengan animasi 44444444444444444444444444444444
    function closeOrderModal() {
        const modal = document.getElementById('orderModal');
        const modalContent = document.getElementById('orderModalContent');
        
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
    
    // Toggle field delivery/pickup 555555555555555555555555555555
    function toggleDeliveryFields() {
        const method = document.querySelector('input[name="deliveryMethod"]:checked').value;
        document.getElementById('addressField').classList.toggle('hidden', method !== 'delivery');
        document.getElementById('pickupField').classList.toggle('hidden', method !== 'pickup');
    }
    
    // Konfirmasi pesanan dan buka WhatsApp 66666666666666666666666666666
    function confirmOrder() {
        const customerName = document.getElementById('customerName').value.trim();
        if (!customerName) {
            alert("Silakan masukkan nama Anda.");
            return;
        }
        
        const deliveryOption = document.querySelector('input[name="deliveryMethod"]:checked');
        if (!deliveryOption) {
            alert("Silakan pilih metode pengiriman (Delivery atau Pickup).");
            return;
        }
        
        let deliveryInfo = '';
        let deliveryType = deliveryOption.value;
        
        if (deliveryType === 'delivery') {
            const address = document.getElementById('deliveryAddress').value.trim();
            if (!address) {
                alert("Alamat pengiriman harus diisi.");
                return;
            }
            deliveryInfo = `Metode: Delivery\nAlamat: ${address}`;
        } else if (deliveryType === 'pickup') {
            const cabang = document.getElementById('pickupLocation').value;
            if (!cabang) {
                alert("Silakan pilih cabang untuk pickup.");
                return;
            }
            deliveryInfo = `Metode: Pickup\nCabang: ${cabang}`;
        }
        
        let message = `*Pesanan MM Bakery*\n\n`;
        message += `Nama Pemesan: ${customerName}\n\n`;
        
        let total = 0;
        for (let id in quantities) {
            const product = productsData.find(p => p.id == id);
            const qty = quantities[id];
            const subtotal = qty * product.harga;
            message += `- ${product.nama} ${qty}x Rp${product.harga.toLocaleString('id-ID')} = Rp${subtotal.toLocaleString('id-ID')}\n`;
            total += subtotal;
        }
        
        message += `\nTotal: *Rp${total.toLocaleString('id-ID')}*\n\n`;
        message += deliveryInfo;
        
        const encodedMsg = encodeURIComponent(message);
        const waNumber = "62895373408844";
        const waUrl = `https://wa.me/${waNumber}?text=${encodedMsg}`;
        
        window.open(waUrl, '_blank');
        closeOrderModal();
    }
</script>