<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Cek Halal</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 8s ease-in-out infinite;
            animation-delay: 2s;
        }

        .animate-float-slow {
            animation: float 10s ease-in-out infinite;
            animation-delay: 1s;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-green-900 to-green-600 min-h-screen flex items-center justify-center relative overflow-hidden">

    <div
        class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-8 shadow-2xl w-full max-w-md z-10 border border-white/40">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 tracking-wide">Admin Login</h1>
            <p class="text-gray-500 text-sm mt-2">Masuk untuk mengelola Website Cek Halal</p>
        </div>



        <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2 ml-1 text-sm">EMAIL</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@gmail.com"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border
                        {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200' }}
                        focus:outline-none focus:ring-2 focus:ring-green-500/50
                        focus:border-green-500 transition bg-gray-50 text-gray-800">
                </div>

                @error('email')
                    <p class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 ml-1 text-sm">PASSWORD</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>

                    <input type="password" name="password" id="passwordInput" placeholder="••••••••"
                        class="w-full pl-10 pr-12 py-3 rounded-xl border
                        {{ $errors->has('password') ? 'border-red-500' : 'border-gray-200' }}
                        focus:outline-none focus:ring-2 focus:ring-green-500/50
                        focus:border-green-500 transition bg-gray-50 text-gray-800">

                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-green-600">
                        <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                                -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eyeClosed" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24" />
                        </svg>
                    </button>
                </div>

                @error('password')
                    <p class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                    Remember me
                </label>
            </div>

            <button type="submit"
                class="w-full py-3 rounded-xl bg-green-700 hover:bg-green-800
                text-white font-bold tracking-wide shadow-lg
                hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Sign In
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-gray-200 text-center text-sm text-gray-500">
            <span class="text-green-600 font-semibold">Demo:</span>
            superadmin@gmail.com | password123
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const open = document.getElementById('eyeOpen');
            const closed = document.getElementById('eyeClosed');

            if (input.type === 'password') {
                input.type = 'text';
                open.classList.remove('hidden');
                closed.classList.add('hidden');
            } else {
                input.type = 'password';
                open.classList.add('hidden');
                closed.classList.remove('hidden');
            }
        }
    </script>
</body>

</html>
