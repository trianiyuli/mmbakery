@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-medium mb-4">Welcome to Admin Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-medium text-blue-800">Total Users</h3>
                <p class="text-3xl font-bold mt-2">1,234</p>
            </div>
            <!-- ... konten lainnya ... -->
        </div>
    </div>
@endsection