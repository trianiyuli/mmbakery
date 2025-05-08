@extends('layouts.admin')
@section('title', 'Users')
@section('page_title', 'Users Overview')
@section('content')
    <style>
        .border-red-500 {
            border-color: #ef4444;
        }
    </style>
    <div class="container mx-auto px-4 py-6">
        <!-- Success Notification -->
        @if(session('success'))
        <div id="success-notification" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50 flex items-center justify-between min-w-[300px] transition-all duration-300 transform translate-x-0">
            <span>{{ session('success') }}</span>
            <button onclick="closeNotification()" class="ml-4 text-white hover:text-gray-200 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        <!-- Header with search and add button -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen User</h2>
                <p class="text-gray-600">Manajemen semua user yang terdaftar</p>
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <div class="relative flex-grow md:flex-grow-0">
                    <input id="search-user" type="text" placeholder="Search users..." 
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                @if($role === 'superadmin')
                <button onclick="openAddUserModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add User
                </button>
                @endif
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <div id="users-table-container">
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

        // Modal open functions (called from table buttons)
        function openAddUserModal() {
            document.getElementById('add-user-modal').classList.remove('hidden');
        }

        function openEditUserModal(user) {
            const userObj = typeof user === 'string' ? JSON.parse(user) : user;
            const modal = document.getElementById('edit-user-modal');
            const form = document.getElementById('editUserForm');
            const currentUserRole = "{{ $role }}";
            
            // Set form values
            form.querySelector('#edit_name').value = userObj.name;
            form.querySelector('#edit_email').value = userObj.email;
            form.querySelector('#edit_user_id').value = userObj.id;
            
            // Update form action
            form.action = "{{ route('admin.users.update', '') }}/" + userObj.id;
            
            // Only show role field for superadmin
            const roleField = document.getElementById('edit_role_container');
            if (currentUserRole === 'superadmin') {
                roleField.classList.remove('hidden');
                document.getElementById('edit_role').value = userObj.role;
            } else {
                roleField.classList.add('hidden');
            }
            
            document.getElementById('edit_profile-preview').src = userObj.photo 
                ? `/storage/${userObj.photo}` 
                : 'https://via.placeholder.com/150';
            
            modal.classList.remove('hidden');
        }

        function openDeleteUserModal(userId, userName) {
        const modal = document.getElementById('delete-user-modal');
        const form = document.getElementById('deleteUserForm');
        
        // Set confirmation message
        document.getElementById('delete-user-message').textContent = 
            `Apakah Anda yakin ingin menghapus user ${userName}? Aksi ini tidak dapat dibatalkan.`;
        
        // Set form action
        form.action = "{{ route('admin.users.destroy', '') }}/" + userId;
        document.getElementById('delete_user_id').value = userId;
        
        modal.classList.remove('hidden');
    }

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