<div id="edit-user-modal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 backdrop-blur overflow-y-auto py-2 sm:py-4">
    <div class="bg-white rounded-lg p-4 sm:p-6 w-full border border-gray-200 max-w-2xl transform transition-all duration-300 ease-out scale-95 opacity-0 mx-2 sm:mx-4 my-4">
        <!-- Modal content -->
        <div class="text-center">
            <div class="flex justify-between items-center mb-3 sm:mb-4">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900">Edit User</h3>
                <button onclick="closeEditUserModal()" class="text-gray-400 hover:text-blue-600 transition-colors duration-200 cursor-pointer">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="editUserForm" method="POST" action="" enctype="multipart/form-data" class="mt-3 sm:mt-4 text-left">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_user_id" name="edit_user_id" value="">
                
                <div class="flex flex-col md:flex-row gap-4 sm:gap-6">
                    <!-- Left Column (Profile Picture) -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="relative mb-2 sm:mb-3">
                            <img id="edit_profile-preview" src="https://via.placeholder.com/150" alt="Profile Preview" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-gray-100 shadow-sm">
                            <label for="edit_profile-picture" class="absolute bottom-2 right-2 bg-blue-600 text-white p-1.5 sm:p-2 rounded-full cursor-pointer hover:bg-blue-700 transition-all duration-200 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <input type="file" id="edit_profile-picture" name="edit_profile-picture" accept="image/*" class="hidden" onchange="previewEditProfileImage(this)">
                            </label>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Upload foto profil (Maks 2MB)</p>
                    </div>
                    
                    <!-- Right Column (Form Fields) -->
                    <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
                        <div class="col-span-2 md:col-span-1">
                            <label for="edit_name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="edit_name" name="edit_name" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div class="col-span-2 md:col-span-1">
                            <label for="edit_email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <input type="email" id="edit_email" name="edit_email" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div id="edit_role_container" class="hidden col-span-2 md:col-span-1">
                            <label for="edit_role" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select id="edit_role" name="edit_role" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="edit_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Password Baru (kosongi jika tidak menganti password)</label>
                            <input type="password" id="edit_password" name="edit_password" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div class="col-span-2">
                            <label for="edit_confirm_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" id="edit_confirm_password" name="edit_confirm_password" class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm sm:text-base text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-gray-200 flex justify-end gap-2 sm:gap-3">
                    <button type="button" onclick="closeEditUserModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-md shadow-sm text-xs sm:text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="px-3 sm:px-4 py-1.5 sm:py-2 border border-transparent rounded-md shadow-sm text-xs sm:text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Function to preview the selected profile image
    function previewEditProfileImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('edit_profile-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Function to open modal with animation
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
        // Add slight delay to allow display property to take effect before animation
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    // Function to close modal with animation
    function closeEditUserModal() {
        const modal = document.getElementById('edit-user-modal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        // Wait for animation to finish before hiding
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    
    // Form validation specific to this modal
    document.getElementById('editUserForm').addEventListener('submit', async function(e) {
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
                        text: 'User berhasil diupdate.',
                        showConfirmButton: true,
                        timer: 1000,
                        timerProgressBar: true
                    }).then(() => {
                        form.reset();
                        closeEditUserModal();
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
    
    // Real-time password validation
    document.getElementById('edit_password')?.addEventListener('input', function() {
        validateEditPasswordFields();
    });
    
    document.getElementById('edit_confirm_password')?.addEventListener('input', function() {
        validateEditPasswordFields();
    });
    
    function validateEditPasswordFields() {
        const password = document.getElementById('edit_password').value;
        const confirmPassword = document.getElementById('edit_confirm_password').value;
        
        // Reset error states
        resetPasswordErrors();
        
        // Only validate if at least one field has content
        if (password || confirmPassword) {
            // Validate password length
            if (password.length > 0 && password.length < 8) {
                showPasswordError('edit_password', 'Password must be at least 8 characters');
            }
            
            // Validate password match
            if (password && confirmPassword && password !== confirmPassword) {
                showPasswordError('edit_confirm_password', 'Passwords do not match');
            }
        }
    }
    
    function resetPasswordErrors() {
        document.getElementById('edit_password').classList.remove('border-red-500');
        document.getElementById('edit_confirm_password').classList.remove('border-red-500');
        const errorElements = document.querySelectorAll('.password-error');
        errorElements.forEach(el => el.remove());
    }
    
    function showPasswordError(fieldId, message) {
        const field = document.getElementById(fieldId);
        field.classList.add('border-red-500');
        
        const errorElement = document.createElement('p');
        errorElement.className = 'mt-1 text-sm text-red-600 password-error';
        errorElement.textContent = message;
        
        field.parentNode.appendChild(errorElement);
    }
    
    // Handle click outside modal to close
    document.getElementById('edit-user-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeEditUserModal();
        }
    });
</script>