<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profil</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terdaftar</th>
            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
        <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex-shrink-0 h-10 w-10">
                    @if($user->photo)
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}">
                    @else
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-medium">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    @endif
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span class="text-xs bg-gray-100 px-2 py-1 rounded">••••••••</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @php
                    $roleClasses = [
                        'admin' => 'bg-green-100 text-green-800',
                        'superadmin' => 'bg-purple-100 text-purple-800'
                    ];
                @endphp
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $roleClasses[$user->role] ?? 'bg-gray-100 text-gray-800' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user->created_at->format('Y-m-d') }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end space-x-2">
                    <button onclick="openEditUserModal({{ json_encode($user) }})" 
                            class="p-1.5 text-blue-600 hover:text-blue-900 rounded-full hover:bg-blue-50 transition-colors cursor-pointer" 
                            title="Edit">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    @if($role === 'superadmin')
                    <button onclick="openDeleteUserModal('{{ $user->id }}', '{{ $user->name }}')" 
                            class="p-1.5 text-red-600 hover:text-red-900 rounded-full hover:bg-red-50 transition-colors cursor-pointer" 
                            title="Delete">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>