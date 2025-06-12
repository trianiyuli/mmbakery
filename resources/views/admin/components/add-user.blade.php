<div id="add-user-modal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 backdrop-blur overflow-y-auto py-2 sm:py-4">
    <div class="bg-white rounded-lg p-4 sm:p-6 w-full border border-gray-200 max-w-2xl transform transition-all duration-300 ease-out scale-95 opacity-0 mx-2 sm:mx-4 my-4">
        <!-- Modal content -->
        <div class="text-center">
            <div class="flex justify-between items-center mb-4 sm:mb-6">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">Tambah User Baru</h3>
                <button onclick="closeAddUserModal()" class="text-gray-400 hover:text-blue-600 transition-colors duration-200 cursor-pointer">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="mt-3 sm:mt-4 text-left">
                @csrf
                <div class="flex flex-col md:flex-row gap-4 sm:gap-6">
                    <!-- Left Column (Profile Picture) -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="relative mb-2 sm:mb-3">
                            <img id="profile-preview" src="https://via.placeholder.com/150" alt="Profile Preview" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-gray-100 shadow-sm">
                            <label for="profile-picture" class="absolute bottom-2 right-2 bg-blue-600 text-white p-1.5 sm:p-2 rounded-full cursor-pointer hover:bg-blue-700 transition-all duration-200 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <input type="file" id="profile-picture" name="profile-picture" accept="image/*" class="hidden" onchange="previewProfileImage(this)">
                            </label>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Upload foto profil (Maks 2MB)</p>
                    </div>
                    
                    <!-- Right Column (Form Fields) -->
                    <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
                        <div class="col-span-2">
                            <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="name-error" class="mt-1 text-xs sm:text-sm text-red-500 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="email-error" class="mt-1 text-xs sm:text-sm text-red-500 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="role" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                            <select id="role" name="role" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <option value="">Pilih role</option>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                            <p id="role-error" class="mt-1 text-xs sm:text-sm text-red-500 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                            <input type="password" id="password" name="password" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="password-error" class="mt-1 text-xs sm:text-sm text-red-500 hidden"></p>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="confirm_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input type="password" id="confirm_password" name="password_confirmation" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            <p id="confirm_password-error" class="mt-1 text-xs sm:text-sm text-red-500 hidden"></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 sm:mt-8 pt-3 sm:pt-4 border-t border-gray-200 flex justify-end gap-2 sm:gap-3">
                    <button type="button" onclick="closeAddUserModal()" class="px-3 sm:px-5 py-1.5 sm:py-2.5 border border-gray-300 rounded-md shadow-sm text-xs sm:text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-3 sm:px-5 py-1.5 sm:py-2.5 border border-transparent rounded-md shadow-sm text-xs sm:text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Tambah User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
    function openAddUserModal() {
        const modal = document.getElementById('add-user-modal');
        modal.classList.remove('hidden');
        // Add slight delay to allow display property to take effect before animation
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    function closeAddUserModal() {
        const modal = document.getElementById('add-user-modal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        // Wait for animation to finish before hiding
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
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
    
    // Ganti event submit form menjadi AJAX
    const addUserForm = document.querySelector('#add-user-modal form');
    addUserForm.addEventListener('submit', async function(e) {
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
                        text: 'User berhasil ditambahkan.',
                        showConfirmButton: true,
                        timer: 1000,
                        timerProgressBar: true
                    }).then(() => {
                        form.reset();
                        closeAddUserModal();
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