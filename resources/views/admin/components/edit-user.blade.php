<div id="edit-user-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
    <div class="relative mx-auto p-6 border w-full max-w-2xl shadow-xl rounded-lg bg-white animate-fade-in">
        <!-- Modal content -->
        <div class="text-center">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Edit User</h3>
                <button onclick="closeEditUserModal()" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 cursor-pointer">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="editUserForm" method="POST" action="" enctype="multipart/form-data" class="mt-4 text-left">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_user_id" name="edit_user_id" value="">
                
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Left Column (Profile Picture) -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="relative mb-3">
                            <img id="edit_profile-preview" src="https://via.placeholder.com/150" alt="Profile Preview" class="w-32 h-32 rounded-full object-cover border-4 border-gray-100 shadow-sm">
                            <label for="edit_profile-picture" class="absolute bottom-2 right-2 bg-blue-500 text-white p-2 rounded-full cursor-pointer hover:bg-blue-600 transition-all duration-200 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <input type="file" id="edit_profile-picture" name="edit_profile-picture" accept="image/*" class="hidden" onchange="previewEditProfileImage(this)">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 text-center">Upload foto profil (Maks 2MB)</p>
                    </div>
                    
                    <!-- Right Column (Form Fields) -->
                    <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2 md:col-span-1">
                            <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="edit_name" name="edit_name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div class="col-span-2 md:col-span-1">
                            <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <input type="email" id="edit_email" name="edit_email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div id="edit_role_container" class="hidden col-span-2 md:col-span-1">
                            <label for="edit_role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select id="edit_role" name="edit_role" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (kosongi jika tidak menganti password)</label>
                            <input type="password" id="edit_password" name="edit_password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                        
                        <div class="col-span-2">
                            <label for="edit_confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" id="edit_confirm_password" name="edit_confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" onclick="closeEditUserModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Save Changes
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
</style>

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
    
    // Function to close this modal
    function closeEditUserModal() {
        document.getElementById('edit-user-modal').classList.add('hidden');
    }
    
    // Form validation specific to this modal
    document.getElementById('editUserForm')?.addEventListener('submit', function(e) {
        const password = document.getElementById('edit_password').value;
        const confirmPassword = document.getElementById('edit_confirm_password').value;
        
        // Reset error states
        resetPasswordErrors();
        
        // Validate password only if fields are not empty
        if (password || confirmPassword) {
            if (password.length < 8) {
                e.preventDefault();
                showPasswordError('edit_password', 'Password must be at least 8 characters');
                return false;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                showPasswordError('edit_confirm_password', 'Passwords do not match');
                return false;
            }
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