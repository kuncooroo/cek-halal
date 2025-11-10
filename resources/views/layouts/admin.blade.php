<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-800 text-white p-6 flex flex-col">
            <h3 class="text-2xl font-bold mb-6 text-center">Admin Panel</h3>
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-200">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.produk.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-200">Manajemen Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.berita.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-200">Manajemen Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faq.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-200">Manajemen FAQ</a>
                    </li>
                </ul>
            </nav>
            
            <div class="mt-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                @yield('title')
            </h1>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html> 