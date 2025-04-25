@extends('layouts.admin')

@section('title', 'Products')
@section('page_title', 'Products Overview')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-medium">Products</h2>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Add Product
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @for($i = 1; $i <= 8; $i++)
            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <div class="bg-gray-100 h-48 flex items-center justify-center">
                    <span class="text-gray-400">Product Image</span>
                </div>
                <div class="p-4">
                    <h3 class="font-medium">Product {{ $i }}</h3>
                    <p class="text-gray-600 text-sm mt-1">${{ rand(10, 100) }}.00</p>
                    <div class="mt-3 flex justify-between">
                        <button class="text-indigo-600 text-sm hover:text-indigo-800">Edit</button>
                        <button class="text-red-600 text-sm hover:text-red-800">Delete</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection