<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($products as $product)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama }}" class="h-10 w-10 rounded-full object-cover">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ $product->nama }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ ucfirst(str_replace('-', ' ', $product->kategori)) }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($product->unggulan)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">No</span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button onclick="openDetailModal({{ $product->id }})" class="text-blue-600 hover:text-blue-900 mr-3">Detail</button>
                <button onclick="openEditModal({{ $product->id }})" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</button>
                <button onclick="openDeleteModal({{ $product->id }})" class="text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>