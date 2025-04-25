<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin MM Bakery</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Parisienne&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'script': ['Parisienne', 'cursive'],
                        'poppins': ['Poppins', 'sans-serif']
                    },
                    animation: {
                        'float': 'float 6s infinite ease-in-out',
                        'fade-in': 'fadeIn 1s ease-in-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .bg-auth {
                background: linear-gradient(135deg, #d8b4fe 0%, #a78bfa 100%);
            }
            .border-multicolor {
                border-image: linear-gradient(45deg, #611cb7, #ff9800, #4caf50, #2196f3) 1;
            }
        }
        .company-name {
            font-family: 'Brush Script MT', cursive;
        }
    </style>
</head>
<body class="bg-auth min-h-screen font-poppins flex items-center justify-center p-4">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <!-- Background decorative elements -->
        <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-purple-300/20"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-purple-400/20"></div>
        <div class="absolute top-1/4 right-1/4 w-40 h-40 rounded-full bg-pink-300/20"></div>
        <div class="absolute bottom-1/3 left-1/4 w-32 h-32 rounded-full bg-indigo-300/20"></div>
    </div>

    <div class="relative z-10 w-full max-w-md animate-fade-in">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-multicolor border-4">
            <div class="p-10">
                <!-- Logo and Brand -->
                <div class="text-center mb-10">
                    <h1 class="text-5xl company-name text-purple-700 mb-2">MM Bakery</h1>
                    <p class="text-gray-600">Admin Dashboard</p>
                </div>

                <!-- Error Message -->
                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.process') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" required
                                   class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                   placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                   class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" 
                                   class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-purple-600 hover:text-purple-500">
                                Lupa password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition transform hover:scale-[1.02]">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                    </div>
                </form>
            </div>

            <div class="px-8 py-4 bg-gray-50 text-center rounded-b-2xl">
                <p class="text-xs text-gray-500">
                    &copy; {{ date('Y') }} MM Bakery. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- Floating elements for decoration -->
    <div class="fixed bottom-5 right-5 w-16 h-16 rounded-full bg-purple-500/10 animate-float"></div>
    <div class="fixed top-10 left-10 w-12 h-12 rounded-full bg-pink-500/10 animate-float animation-delay-2000"></div>
    <div class="fixed top-1/3 right-20 w-10 h-10 rounded-full bg-indigo-500/10 animate-float animation-delay-3000"></div>
</body>
</html>