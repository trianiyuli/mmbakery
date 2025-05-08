@extends('layouts.admin')

@section('title', 'Products')
@section('page_title', 'Products Overview')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Filter and Add Product Button -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.products') }}" class="px-4 py-2 rounded-md {{ !request('category') || request('category') === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">All</a>
            @foreach(['roti-manis', 'donat', 'cake', 'pizza', 'tart'] as $category)
                <a href="{{ route('admin.products', ['category' => $category]) }}" class="px-4 py-2 rounded-md {{ request('category') === $category ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                    {{ ucfirst(str_replace('-', ' ', $category)) }}
                </a>
            @endforeach
        </div>
        
        <div class="flex gap-4 w-full md:w-auto">
            <input type="text" id="searchInput" placeholder="Search products..." class="px-4 py-2 border rounded-md w-full md:w-64" value="{{ request('search') }}">
            <button onclick="openAddModal()" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                Add Product
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div id="productsTable" class="bg-white rounded-lg shadow overflow-hidden">
        @include('admin.partials.products_table', ['products' => $products])
    </div>

    <!-- Pagination -->
    <div id="productsPagination" class="mt-4">
        {{ $products->links('admin.partials.products_pagination', ['products' => $products]) }}
    </div>
</div>

<!-- Add Product Modal -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Add New Product</h3>
        <form id="addProductForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="nama" name="nama" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="harga" name="harga" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="kategori" name="kategori" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="roti-manis">Roti Manis</option>
                        <option value="donat">Donat</option>
                        <option value="cake">Cake</option>
                        <option value="pizza">Pizza</option>
                        <option value="tart">Tart</option>
                    </select>
                </div>
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="gambar" name="gambar" required accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="unggulan" name="unggulan" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="unggulan" class="ml-2 block text-sm text-gray-700">Featured Product</label>
                </div>
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeAddModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Edit Product</h3>
        <form id="editProductForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label for="edit_nama" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="edit_nama" name="nama" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="edit_harga" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="edit_harga" name="harga" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="edit_kategori" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="edit_kategori" name="kategori" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="roti-manis">Roti Manis</option>
                        <option value="donat">Donat</option>
                        <option value="cake">Cake</option>
                        <option value="pizza">Pizza</option>
                        <option value="tart">Tart</option>
                    </select>
                </div>
                <div>
                    <label for="edit_gambar" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="edit_gambar" name="gambar" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <div id="currentImage" class="mt-2"></div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="edit_unggulan" name="unggulan" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="edit_unggulan" class="ml-2 block text-sm text-gray-700">Featured Product</label>
                </div>
                <div>
                    <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="edit_deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Confirm Deletion</h3>
        <p class="mb-6">Are you sure you want to delete this product? This action cannot be undone.</p>
        <form id="deleteProductForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Product Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4" id="detailTitle">Product Details</h3>
        <div class="space-y-4">
            <div>
                <img id="detailImage" src="" alt="Product Image" class="w-full h-48 object-cover rounded-md">
            </div>
            <div>
                <h4 class="text-lg font-medium" id="detailName"></h4>
                <p class="text-gray-600" id="detailPrice"></p>
                <p class="text-sm text-gray-500" id="detailCategory"></p>
                <p class="text-sm mt-2" id="detailFeatured"></p>
            </div>
            <div>
                <p class="text-gray-700" id="detailDescription"></p>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button type="button" onclick="closeDetailModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Close
            </button>
        </div>
    </div>
</div>

<script>
    // Modal functions
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal(productId) {
        fetch(`/admin/products/${productId}`)
            .then(response => response.json())
            .then(product => {
                document.getElementById('edit_nama').value = product.nama;
                document.getElementById('edit_harga').value = product.harga;
                document.getElementById('edit_kategori').value = product.kategori;
                document.getElementById('edit_unggulan').checked = product.unggulan;
                document.getElementById('edit_deskripsi').value = product.deskripsi || '';
                
                // Show current image
                const currentImageDiv = document.getElementById('currentImage');
                currentImageDiv.innerHTML = `
                    <p class="text-sm text-gray-500">Current Image:</p>
                    <img src="/storage/${product.gambar}" alt="Current Product Image" class="h-20 object-cover mt-1">
                `;
                
                // Set form action
                document.getElementById('editProductForm').action = `/admin/products/${productId}`;
                
                document.getElementById('editModal').classList.remove('hidden');
            });
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(productId) {
        document.getElementById('deleteProductForm').action = `/admin/products/${productId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function openDetailModal(productId) {
        fetch(`/admin/products/${productId}`)
            .then(response => response.json())
            .then(product => {
                document.getElementById('detailTitle').textContent = product.nama;
                document.getElementById('detailName').textContent = product.nama;
                document.getElementById('detailPrice').textContent = `Rp ${product.harga.toLocaleString()}`;
                document.getElementById('detailCategory').textContent = `Category: ${product.kategori.replace('-', ' ')}`;
                document.getElementById('detailFeatured').textContent = product.unggulan ? '⭐ Featured Product' : '';
                document.getElementById('detailDescription').textContent = product.deskripsi || 'No description available';
                
                const imageElement = document.getElementById('detailImage');
                imageElement.src = `/storage/${product.gambar}`;
                imageElement.alt = product.nama;
                
                document.getElementById('detailModal').classList.remove('hidden');
            });
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            const searchValue = this.value;
            const category = new URLSearchParams(window.location.search).get('category') || 'all';
            window.location.href = `/admin/products?search=${searchValue}&category=${category}`;
        }
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

    // Form submissions
    document.getElementById('addProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        this.submit();
    });

    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        this.submit();
    });

    document.getElementById('deleteProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        this.submit();
    });
</script>
@endsection