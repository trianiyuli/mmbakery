@extends('layouts.admin')

@section('title', 'Settings')
@section('page_title', 'Settings Overview')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-medium mb-6">Settings</h2>
        
        <div class="space-y-6">
            <div class="border-b pb-4">
                <h3 class="font-medium text-gray-900 mb-3">General Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">Site Name</label>
                        <input type="text" class="mt-1 block w-64 rounded-md border-gray-300 shadow-sm" value="AdminPanel">
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">Timezone</label>
                        <select class="mt-1 block w-64 rounded-md border-gray-300 shadow-sm">
                            <option>UTC</option>
                            <option selected>Asia/Jakarta</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <h3 class="font-medium text-gray-900 mb-3">Email Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">SMTP Host</label>
                        <input type="text" class="mt-1 block w-64 rounded-md border-gray-300 shadow-sm" value="smtp.example.com">
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">SMTP Port</label>
                        <input type="text" class="mt-1 block w-64 rounded-md border-gray-300 shadow-sm" value="587">
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
@endsection