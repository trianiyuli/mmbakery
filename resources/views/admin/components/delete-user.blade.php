<div id="delete-user-modal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden z-50 backdrop-blur">
    <div class="bg-white rounded-lg p-6 w-full border border-red-200 max-w-md transform transition-all duration-300 ease-out scale-95 opacity-0">
        <!-- Modal content -->
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Hapus User</h3>
            
            <div class="mb-6">
                <p id="delete-user-message" class="text-gray-500">
                    Apakah Anda yakin ingin menghapus user ini? Aksi ini tidak dapat dibatalkan.
                </p>
            </div>
            
            <form id="deleteUserForm" method="POST" action="" class="mt-4">
                @csrf
                @method('DELETE')
                <input type="hidden" id="delete_user_id" name="delete_user_id" value="">
                
                <div class="flex justify-center gap-3">
                    <button type="button" onclick="closeDeleteUserModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 cursor-pointer">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Function to open modal with animation
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
        // Add slight delay to allow display property to take effect before animation
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    // Function to close modal with animation
    function closeDeleteUserModal() {
        const modal = document.getElementById('delete-user-modal');
        modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
        modal.querySelector('div').classList.add('scale-95', 'opacity-0');
        // Wait for animation to finish before hiding
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    
    // Handle click outside modal to close
    document.getElementById('delete-user-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeDeleteUserModal();
        }
    });

    document.getElementById('deleteUserForm').addEventListener('submit', async function(e) {
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
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'User berhasil dihapus.',
                    showConfirmButton: true,
                    timer: 1000,
                    timerProgressBar: true
                }).then(() => {
                    closeDeleteUserModal();
                    window.location.reload();
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
</script>