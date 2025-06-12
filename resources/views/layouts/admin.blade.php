<!DOCTYPE html>
<html lang="en" class="light h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Bakery - Admin Panel</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.toggle('hidden');
        }
        
        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');
        }
        
        // Global state untuk modal logout
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                showLogoutModal: false,
                initialized: false,
                
                init() {
                    this.initialized = true;
                },
                
                openLogoutModal() {
                    this.showLogoutModal = true;
                    document.body.classList.add('overflow-hidden');
                },
                
                closeLogoutModal() {
                    this.showLogoutModal = false;
                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .company-name {
            font-family: 'Brush Script MT', cursive !important;
            font-size: xx-large !important;
        }
        .profile-dropup {
            min-width: 200px;
            left: 50%;
            transform: translateX(-50%);
            bottom: calc(100% + 8px);
        }
        .profile-dropup-item {
            padding: 0.5rem 1rem;
            transition: all 0.2s;
        }
        [x-cloak] { display: none !important; }
        
        /* Fix untuk mencegah flicker dan styling modal */
        .modal-overlay {
            opacity: 0;
            transition: opacity 200ms ease-in-out;
        }
        .modal-overlay.active {
            opacity: 1;
        }
        .modal-container {
            opacity: 0;
            transform: translateY(10px) scale(0.98);
            transition: all 200ms ease-in-out;
        }
        .modal-container.active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .modal-content {
            text-align: center;
        }
        .modal-icon {
            margin: 0 auto;
        }
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Mobile Topbar -->
    <div class="md:hidden bg-white shadow-sm px-4 py-3 flex items-center justify-between">
        <button onclick="toggleSidebar()" class="text-blue-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <h1 class="text-lg font-semibold text-blue-600">Admin Panel</h1>
    </div>

    <!-- Main Container -->
    <div class="flex h-screen overflow-hidden">
        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-gray-600/75 z-20 hidden md:hidden" onclick="closeSidebar()"></div>

        <!-- Sidebar -->
        <div id="sidebar" class="fixed z-30 inset-y-0 left-0 transform md:relative md:translate-x-0 transition-transform duration-200 ease-in-out w-64 bg-white text-gray-800 font-sans flex flex-col h-full -translate-x-full md:translate-x-0 border-r border-gray-200">
            <!-- Logo and Close Button Container -->
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <span class="ml-2 text-xl company-name text-blue-600">MM Bakery</span>
                <button onclick="closeSidebar()" class="md:hidden text-gray-500 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1 px-2">
                    @yield('sidebar')
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 border border-blue-100' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.products') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('admin.products') ? 'bg-blue-50 text-blue-600 border border-blue-100' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('admin.users') ? 'bg-blue-50 text-blue-600 border border-blue-100' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            Users
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Profile Section -->
            <div x-data="{ open: false }" class="relative p-4 border-t border-gray-200">
                @php
                    $user = \App\Models\User::find(session('user_id'));
                    $userName = $user->name ?? 'Admin User';
                    $userRole = session('role') ?? 'Administrator';
                    $userPhoto = $user->photo ?? null;
                @endphp

                <div class="relative">
                    <button @click="open = !open" class="flex items-center w-full space-x-3 hover:bg-gray-100 rounded-lg p-2 transition-colors duration-200 focus:outline-none cursor-pointer"
                            :class="{ 'bg-gray-100 rounded-b-none': open }">
                        <!-- Profile Picture -->
                        @if($userPhoto)
                            <div class="w-8 h-8 rounded-full bg-gray-100 overflow-hidden flex-shrink-0">
                                <img src="{{ asset('storage/' . $userPhoto) }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif

                        <!-- Profile Info -->
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-800 truncate">{{ $userName }}</p>
                            <p class="text-xs text-gray-500 truncate capitalize">{{ $userRole }}</p>
                        </div>

                        <!-- Dropup Icon -->
                        <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" 
                            :class="{ 'transform rotate-180': open }" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        @click.away="open = false"
                        class="absolute bottom-full left-0 right-0 mb-0 bg-gray-100 rounded-t-lg overflow-hidden">
                        <button @click="$store.modal.openLogoutModal(); open = false" 
                                class="w-full py-4 px-3 text-left text-sm text-gray-700 hover:bg-gray-200 flex items-center space-x-3 focus:outline-none cursor-pointer">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-blue-600">@yield('title', 'Pages')</h1>
                <div class="flex items-center space-x-4"></div>
            </header>
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Global Logout Confirmation Modal -->
    <div x-data="{
        show: false,
        init() {
            this.$watch('$store.modal.showLogoutModal', value => {
                if (value) {
                    this.show = true;
                    setTimeout(() => {
                        document.querySelector('.modal-overlay').classList.add('active');
                        document.querySelector('.modal-container').classList.add('active');
                    }, 10);
                } else {
                    document.querySelector('.modal-overlay').classList.remove('active');
                    document.querySelector('.modal-container').classList.remove('active');
                    setTimeout(() => this.show = false, 200);
                }
            });
        }
    }" x-show="show" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <!-- Background overlay -->
        <div class="modal-overlay fixed inset-0 bg-gray-900/75 transition-opacity" 
             @click="$store.modal.closeLogoutModal()"></div>

        <!-- Modal content -->
        <div class="modal-container flex items-center justify-center min-h-screen p-2 sm:p-0">
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full mx-2 sm:mx-auto">
                <div class="bg-white px-4 sm:px-8 py-4 sm:py-6 text-center">
                    <div class="modal-icon mx-auto flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 rounded-full bg-red-100 mb-3 sm:mb-4">
                        <svg class="h-5 w-5 sm:h-6 sm:w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-base sm:text-lg font-medium text-gray-900 mb-2">
                        Konfirmasi Logout
                    </h3>
                    <div class="mt-1 sm:mt-2">
                        <p class="text-xs sm:text-sm text-gray-600">
                            Anda akan keluar dari akun admin. Pastikan semua pekerjaan Anda sudah disimpan.
                        </p>
                    </div>
                    
                    <div class="modal-buttons mt-4 sm:mt-6 flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3">
                        <button @click="$store.modal.closeLogoutModal()" type="button" class="w-full sm:w-auto inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-3 sm:px-4 py-1.5 sm:py-2 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150 cursor-pointer">
                            Batalkan
                        </button>
                        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                            @csrf
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-lg border border-transparent shadow-sm px-3 sm:px-4 py-1.5 sm:py-2 bg-red-600 text-xs sm:text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150 cursor-pointer">
                                Ya, Logout Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>