<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
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
            color: #611cb7 !important;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Mobile Topbar -->
    <div class="md:hidden bg-white shadow-sm px-4 py-3 flex items-center justify-between">
        <button onclick="toggleSidebar()" class="text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <h1 class="text-lg font-semibold">Admin Panel</h1>
    </div>

    <!-- Main Container -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed z-30 inset-y-0 left-0 transform md:relative md:translate-x-0 transition-transform duration-200 ease-in-out w-64 bg-white text-gray-800 font-sans flex flex-col h-full -translate-x-full md:translate-x-0 border-r border-gray-200">
            <!-- Logo -->
            <div class="p-4 border-b border-gray-200 flex items-center">
                <span class="ml-2 text-xl company-name">MM Bakery</span>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1 px-2">
                    @yield('sidebar')
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-md text-purple-700 hover:bg-gray-100 hover:text-purple-800 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-purple-800 border border-gray-200' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.products') }}"
                        class="flex items-center px-4 py-3 rounded-md text-purple-700 hover:bg-gray-100 hover:text-purple-800 transition-colors duration-200 {{ request()->routeIs('admin.products') ? 'bg-gray-100 text-purple-800 border border-gray-200' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users') }}"
                        class="flex items-center px-4 py-3 rounded-md text-purple-700 hover:bg-gray-100 hover:text-purple-800 transition-colors duration-200 {{ request()->routeIs('admin.users') ? 'bg-gray-100 text-purple-800 border border-gray-200' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            Users
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.reports') }}"
                        class="flex items-center px-4 py-3 rounded-md text-purple-700 hover:bg-gray-100 hover:text-purple-800 transition-colors duration-200 {{ request()->routeIs('admin.reports') ? 'bg-gray-100 text-purple-800 border border-gray-200' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Reports
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.settings') }}"
                        class="flex items-center px-4 py-3 rounded-md text-purple-700 hover:bg-gray-100 hover:text-purple-800 transition-colors duration-200 {{ request()->routeIs('admin.settings') ? 'bg-gray-100 text-purple-800 border border-gray-200' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Profile -->
            <div x-data="{ open: false }" class="relative p-4 border-t border-gray-200">
    <button @click="open = !open" class="flex items-center w-full hover:bg-gray-200 rounded-md p-2 transition-colors duration-200 focus:outline-none">
        <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center">
            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium">{{ \App\Models\User::find(session('user_id'))->name ?? 'Admin User' }}</p>
            <p class="text-xs text-gray-400 capitalize">{{ session('role') ?? 'Administrator' }}</p>
        </div>
        <svg class="w-4 h-4 ml-auto text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'transform rotate-180': open }">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.away="open = false" 
         class="absolute bottom-full left-4 mb-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>

            <!-- <div class="p-4 border-t border-gray-200">
                <a href="#" class="flex items-center hover:bg-gray-200 rounded-md p-2 transition-colors duration-200">
                    <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Admin User</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </a>
            </div> -->

        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center space-x-4"></div>
            </header>
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
