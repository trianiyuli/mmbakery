<div id="delete-user-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-xl rounded-lg bg-white animate-fade-in">
        <!-- Modal content -->
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Hapus User</h3>
            
            <div class="mb-6">
                <p id="delete-user-message" class="text-gray-600">
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
    // Function to close this modal
    function closeDeleteUserModal() {
        document.getElementById('delete-user-modal').classList.add('hidden');
    }
    
    // Function to open delete modal with user data
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
    
    // Handle click outside modal to close
    document.getElementById('delete-user-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeDeleteUserModal();
        }
    });
</script>