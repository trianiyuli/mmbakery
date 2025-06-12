<div id="editModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 overflow-y-auto py-2 sm:py-4 backdrop-blur">
    <div class="bg-white rounded-lg p-4 sm:p-6 w-full max-w-2xl border border-gray-200 transform transition-all duration-300 ease-out scale-95 opacity-0 mx-2 sm:mx-4 my-4">
        <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 text-gray-900">Edit Produk</h3>
        <form id="editProductForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <!-- Left Column -->
                <div class="space-y-3 sm:space-y-4">
                    <div>
                        <label for="edit_nama" class="block text-xs sm:text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="edit_nama" name="nama" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="edit_harga" class="block text-xs sm:text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" id="edit_harga" name="harga" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="edit_kategori" class="block text-xs sm:text-sm font-medium text-gray-700">Kategori</label>
                        <select id="edit_kategori" name="kategori" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="roti-manis">Roti Manis</option>
                            <option value="donat">Donat</option>
                            <option value="cake">Cake</option>
                            <option value="pizza">Pizza</option>
                            <option value="tart">Tart</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="edit_unggulan" name="unggulan" class="h-3.5 w-3.5 sm:h-4 sm:w-4 bg-white border-gray-300 rounded text-blue-600 focus:ring-blue-500">
                        <label for="edit_unggulan" class="ml-2 block text-xs sm:text-sm text-gray-700">Produk Unggulan</label>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-3 sm:space-y-4">
                    <div>
                        <label for="edit_gambar" class="block text-xs sm:text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="edit_gambar" name="gambar" accept="image/*" class="mt-1 block w-full text-xs sm:text-sm text-gray-700 file:mr-3 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-3 sm:file:px-4 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                        <div id="currentImage" class="mt-2"></div>
                    </div>
                    <div>
                        <label for="edit_deskripsi" class="block text-xs sm:text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="edit_deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 sm:mt-6 flex justify-end space-x-2 sm:space-x-3">
                <button type="button" onclick="closeEditModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-3 sm:px-4 py-1.5 sm:py-2 border border-transparent rounded-md shadow-sm text-xs sm:text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(productId) {
        fetch(`/admin/products/${productId}`)
            .then(response => response.json())
            .then(product => {
                // Set form values
                document.getElementById('edit_nama').value = product.nama;
                document.getElementById('edit_harga').value = product.harga;
                document.getElementById('edit_kategori').value = product.kategori;
                document.getElementById('edit_unggulan').checked = product.unggulan;
                document.getElementById('edit_deskripsi').value = product.deskripsi || '';
                
                // Show current image
                const currentImageDiv = document.getElementById('currentImage');
                currentImageDiv.innerHTML = `
                    <p class="text-sm text-slate-400">Current Image:</p>
                    <img src="/storage/${product.gambar}" alt="Current Product Image" class="h-20 object-cover mt-1 rounded-md">
                `;
                
                // Set form action
                document.getElementById('editProductForm').action = `/admin/products/${productId}`;
                
                // Show modal with animation
                const modal = document.getElementById('editModal');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
                    modal.querySelector('div').classList.add('scale-100', 'opacity-100');
                }, 10);
                document.body.classList.add('overflow-hidden');
            });
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    document.getElementById('editProductForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Produk berhasil diupdate.',
                        showConfirmButton: true,
                        timer: 1000,
                        timerProgressBar: true
                    }).then(() => {
                        form.reset();
                        closeEditModal();
                        window.location.reload();
                    });
                }
            } else if (response.status === 422) {
                const errorData = await response.json();
                let errorMsg = '';
                for (const key in errorData.errors) {
                    errorMsg += errorData.errors[key].join('<br>');
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    html: errorMsg,
                    showConfirmButton: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan server.'
                });
            }
        } catch (err) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Tidak dapat terhubung ke server.'
            });
        }
    });

    // Handle click outside modal
    document.getElementById('editModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeEditModal();
        }
    });
</script>