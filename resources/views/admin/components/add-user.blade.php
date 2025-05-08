<div id="add-user-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
    <div class="relative mx-auto p-6 border w-full max-w-2xl shadow-xl rounded-lg bg-white animate-fade-in">
        <!-- Modal content -->
        <div class="text-center">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Tambah User Baru</h3>
                <button onclick="closeAddUserModal()" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 cursor-pointer">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="mt-4 text-left">
                @csrf
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Left Column (Profile Picture) -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="relative mb-3">
                            <img id="profile-preview" src="https://via.placeholder.com/150" alt="Profile Preview" class="w-32 h-32 rounded-full object-cover border-4 border-gray-100 shadow-sm">
                            <label for="profile-picture" class="absolute bottom-2 right-2 bg-blue-500 text-white p-2 rounded-full cursor-pointer hover:bg-blue-600 transition-all duration-200 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <input type="file" id="profile-picture" name="profile-picture" accept="image/*" class="hidden" onchange="previewProfileImage(this)">
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 text-center">Upload foto profil (Maks 2MB)</p>
                    </div>
                    
                    <!-- Right Column (Form Fields) -->
                    <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="name-error" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="email-error" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                            <select id="role" name="role" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <option value="">Pilih role</option>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                            <p id="role-error" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="password-error" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input type="password" id="confirm_password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="confirm_password-error" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-4 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" onclick="closeAddUserModal()" class="px-5 py-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Tambah User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px) scale(0.98); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    
    .border-error {
        border-color: #ef4444;
    }
</style>

<script>
    // Function to preview the selected profile image
    function previewProfileImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Function to close this modal
    function closeAddUserModal() {
        document.getElementById('add-user-modal').classList.add('hidden');
    }
    
    // Function to show error message
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(`${fieldId}-error`);
        
        field.classList.add('border-error');
        errorElement.textContent = message;
        errorElement.classList.remove('hidden');
    }
    
    // Function to clear error
    function clearError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(`${fieldId}-error`);
        
        field.classList.remove('border-error');
        errorElement.classList.add('hidden');
    }
    
    // Form validation for add user
    document.querySelector('#add-user-modal form')?.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validate name
        const name = document.getElementById('name').value.trim();
        if (!name) {
            showError('name', 'Nama lengkap harus diisi');
            isValid = false;
        } else {
            clearError('name');
        }
        
        // Validate email
        const email = document.getElementById('email').value.trim();
        if (!email) {
            showError('email', 'Alamat email harus diisi');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('email', 'Format email tidak valid');
            isValid = false;
        } else {
            clearError('email');
        }
        
        // Validate role
        const role = document.getElementById('role').value;
        if (!role) {
            showError('role', 'Role harus dipilih');
            isValid = false;
        } else {
            clearError('role');
        }
        
        // Validate password
        const password = document.getElementById('password').value;
        if (!password) {
            showError('password', 'Password harus diisi');
            isValid = false;
        } else if (password.length < 8) {
            showError('password', 'Password minimal 8 karakter');
            isValid = false;
        } else {
            clearError('password');
        }
        
        // Validate confirm password
        const confirmPassword = document.getElementById('confirm_password').value;
        if (!confirmPassword) {
            showError('confirm_password', 'Konfirmasi password harus diisi');
            isValid = false;
        } else if (password !== confirmPassword) {
            showError('confirm_password', 'Password tidak cocok');
            isValid = false;
        } else {
            clearError('confirm_password');
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Real-time validation
    document.getElementById('name')?.addEventListener('input', function() {
        if (this.value.trim()) {
            clearError('name');
        }
    });
    
    document.getElementById('email')?.addEventListener('input', function() {
        const email = this.value.trim();
        if (email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            clearError('email');
        }
    });
    
    document.getElementById('role')?.addEventListener('change', function() {
        if (this.value) {
            clearError('role');
        }
    });
    
    document.getElementById('password')?.addEventListener('input', function() {
        const password = this.value;
        if (password && password.length >= 8) {
            clearError('password');
            
            // Validate confirm password if exists
            const confirmPassword = document.getElementById('confirm_password').value;
            if (confirmPassword && password === confirmPassword) {
                clearError('confirm_password');
            }
        }
    });
    
    document.getElementById('confirm_password')?.addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        
        if (confirmPassword && password === confirmPassword) {
            clearError('confirm_password');
        }
    });
    
    // Handle click outside modal to close
    document.getElementById('add-user-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeAddUserModal();
        }
    });
</script>