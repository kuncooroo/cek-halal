<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cek Halal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold text-gray-800">
                    <a href="/">Cek Halal</a>
                </div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-blue-500">Beranda</a>
                    <a href="{{ route('cek-produk') }}" class="text-gray-600 hover:text-blue-500">Cek Produk</a>
                    <a href="{{ route('berita.index') }}" class="text-gray-600 hover:text-blue-500">Berita</a>
                    <a href="{{ route('faq.index') }}" class="text-gray-600 hover:text-blue-500">FAQ</a>
                    <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-blue-500">Tentang</a>
                    <a href="{{ route('kontak') }}" class="text-gray-600 hover:text-blue-500">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-white mt-12 py-6">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-500">&copy; {{ date('Y') }} Website Cek Halal. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>