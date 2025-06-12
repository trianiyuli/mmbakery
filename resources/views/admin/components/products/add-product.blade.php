<div id="addModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 backdrop-blur">
    <div class="bg-white rounded-lg p-4 sm:p-6 w-full max-w-md border border-gray-200 mx-2 sm:mx-4 transform transition-all duration-300 ease-out scale-95 opacity-0">
        <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 text-gray-900">Tambah Produk Baru</h3>
        <form id="addProductForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-3 sm:space-y-4">
                <div>
                    <label for="nama" class="block text-xs sm:text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" id="nama" name="nama" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="harga" class="block text-xs sm:text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="kategori" class="block text-xs sm:text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="roti-manis">Roti Manis</option>
                        <option value="donat">Donat</option>
                        <option value="cake">Cake</option>
                        <option value="pizza">Pizza</option>
                        <option value="tart">Tart</option>
                    </select>
                </div>
                <div>
                    <label for="gambar" class="block text-xs sm:text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="gambar" name="gambar" required accept="image/*" class="mt-1 block w-full text-xs sm:text-sm text-gray-700 file:mr-3 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-3 sm:file:px-4 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="unggulan" name="unggulan" class="h-3.5 w-3.5 sm:h-4 sm:w-4 bg-white border-gray-300 rounded text-blue-600 focus:ring-blue-500">
                    <label for="unggulan" class="ml-2 block text-xs sm:text-sm text-gray-700">Produk Unggulan</label>
                </div>
                <div>
                    <label for="deskripsi" class="block text-xs sm:text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-1.5 sm:py-2 px-2 sm:px-3 text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
            <div class="mt-4 sm:mt-6 flex justify-end space-x-2 sm:space-x-3">
                <button type="button" onclick="closeAddModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-3 sm:px-4 py-1.5 sm:py-2 border border-transparent rounded-md shadow-sm text-xs sm:text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        const modal = document.getElementById('addModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeAddModal() {
        const modal = document.getElementById('addModal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    document.getElementById('addProductForm').addEventListener('submit', async function(e) {
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
                        text: 'Produk berhasil ditambahkan.',
                        showConfirmButton: true,
                        timer: 1000,
                        timerProgressBar: true
                    }).then(() => {
                        form.reset();
                        closeAddModal();
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
        document.getElementById('addModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeAddModal();
        }
    });
</script>