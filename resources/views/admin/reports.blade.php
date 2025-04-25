@extends('layouts.admin')

@section('title', 'Reports')
@section('page_title', 'Reports Overview')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-medium mb-4">Reports</h2>
        
        <div class="grid grid-cols-1 gap-6">
            <div class="border rounded-lg p-4">
                <h3 class="font-medium mb-3">Sales Overview</h3>
                <div class="bg-gray-100 h-64 flex items-center justify-center">
                    <span class="text-gray-400">Chart will be displayed here</span>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border rounded-lg p-4">
                    <h3 class="font-medium mb-3">Top Products</h3>
                    <div class="space-y-3">
                        @for($i = 1; $i <= 5; $i++)
                        <div class="flex justify-between">
                            <span>Product {{ $i }}</span>
                            <span class="font-medium">{{ rand(50, 200) }} sales</span>
                        </div>
                        @endfor
                    </div>
                </div>
                
                <div class="border rounded-lg p-4">
                    <h3 class="font-medium mb-3">Recent Activities</h3>
                    <div class="space-y-3">
                        @for($i = 1; $i <= 5; $i++)
                        <div class="text-sm">
                            <p>User {{ $i }} {{ ['created', 'updated', 'deleted'][rand(0,2)] }} a product</p>
                            <p class="text-gray-500 text-xs">{{ rand(1, 24) }} hours ago</p>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection