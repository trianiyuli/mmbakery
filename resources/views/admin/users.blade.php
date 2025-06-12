@extends('layouts.admin')
@section('title', 'Users')
@section('page_title', 'Users Overview')
@section('content')
    <style>
        .border-red-500 {
            border-color: #ef4444;
        }
        .backdrop-blur {
            backdrop-filter: blur(2px);
        }
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            #search-user {
                min-width: 100%;
            }
            .notification-mobile {
                width: 90%;
                left: 50%;
                transform: translateX(-50%);
                top: 1rem;
            }
        }
    </style>
    <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-6">
        <!-- Success Notification -->
        @if(session('success'))
        <div id="success-notification" class="fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded shadow-lg z-50 flex items-center justify-between min-w-[250px] sm:min-w-[300px] notification-mobile transition-all duration-300 transform translate-x-0">
            <span class="text-sm sm:text-base">{{ session('success') }}</span>
            <button onclick="closeNotification()" class="ml-4 text-white hover:text-gray-100 focus:outline-none">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        <!-- Header with search and add button -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 sm:mb-6 gap-3 sm:gap-4">
            <div class="w-full md:w-auto">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Akun User</h2>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-grow md:flex-grow-0 w-full sm:w-auto">
                    <input id="search-user" type="text" placeholder="Cari user..." 
                           class="w-full pl-10 pr-4 py-2 text-sm sm:text-base rounded-lg bg-white border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                @if($role === 'superadmin')
                <button onclick="openAddUserModal()" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center justify-center sm:justify-start gap-2 transition-colors cursor-pointer text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah User
                </button>
                @endif
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <div id="users-table-container" class="min-w-full">
                    @include('admin.partials.users_table', ['users' => $users, 'role' => $role])
                </div>
            </div>
            
            <div id="users-pagination-container">
                @include('admin.partials.users_pagination', ['users' => $users])
            </div>
        </div>
    </div>

    <!-- Include Modals -->
    @include('admin.components.add-user')
    @include('admin.components.edit-user')
    @include('admin.components.delete-user')

    <script>
        // Notification handling
        function closeNotification() {
            const notification = document.getElementById('success-notification');
            if (notification) {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }
        }

        // Auto close notification after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('success-notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            }
        });

    // Search functionality
    document.getElementById('search-user').addEventListener('input', function(e) {
        const searchValue = e.target.value;
        searchUsers(searchValue);
    });

    function searchUsers(query) {
        fetch(`{{ route('admin.users') }}?search=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('users-table-container').innerHTML = data.table;
            
            // Update pagination only if it exists
            const paginationContainer = document.getElementById('users-pagination-container');
            if (data.pagination) {
                paginationContainer.innerHTML = data.pagination;
            } else {
                paginationContainer.innerHTML = '';
            }
            
            // Reattach event listeners for modals
            attachModalEventListeners();
        })
        .catch(error => {
            console.error('Error:', error);
            // Tampilkan pesan error ke user jika diperlukan
        });
    }

    function attachModalEventListeners() {
        // Reattach event listeners for edit buttons
        document.querySelectorAll('[onclick^="openEditUserModal"]').forEach(button => {
            const match = button.getAttribute('onclick').match(/openEditUserModal\((.*)\)/);
            if (match && match[1]) {
                const userData = JSON.parse(match[1].replace(/&quot;/g, '"'));
                button.onclick = function() { openEditUserModal(userData) };
            }
        });

        // Reattach event listeners for delete buttons
        document.querySelectorAll('[onclick^="openDeleteUserModal"]').forEach(button => {
            const match = button.getAttribute('onclick').match(/openDeleteUserModal\('(.*)', '(.*)'\)/);
            if (match && match[1] && match[2]) {
                button.onclick = function() { openDeleteUserModal(match[1], match[2]) };
            }
        });
    }

    // Handle pagination clicks without page reload
    document.addEventListener('click', function(e) {
        const paginationLink = e.target.closest('a[href*="page="]');
        if (paginationLink) {
            e.preventDefault();
            const url = new URL(paginationLink.href);
            const searchValue = document.getElementById('search-user').value;
            
            // Tambahkan parameter search jika ada
            if (searchValue) {
                url.searchParams.set('search', searchValue);
            }
            
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('users-table-container').innerHTML = data.table;
                
                // Update pagination only if it exists
                const paginationContainer = document.getElementById('users-pagination-container');
                if (data.pagination) {
                    paginationContainer.innerHTML = data.pagination;
                } else {
                    paginationContainer.innerHTML = '';
                }
                
                attachModalEventListeners();
            })
            .catch(error => {
                console.error('Error:', error);
                // Tampilkan pesan error ke user jika diperlukan
            });
        }
    });

    // Panggil pertama kali untuk melampirkan event listeners
    document.addEventListener('DOMContentLoaded', function() {
        attachModalEventListeners();
        
        // Auto close notification after 3 seconds
        const notification = document.getElementById('success-notification');
        if (notification) {
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    });
    </script>
@endsection