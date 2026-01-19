<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Cek Halal Indonesia')</title>

    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-brands/css/uicons-brands.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans text-navy bg-bg-light antialiased overflow-x-hidden flex flex-col min-h-screen">

    <nav id="navbar"
        class="fixed top-0 w-full z-50 h-[80px] flex items-center transition-all duration-300 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="container flex justify-between items-center">

            <a href="{{ route('home') }}"
                class="flex items-center gap-2.5 text-2xl font-extrabold text-navy hover:text-primary transition-colors tracking-tight">
                <i class="fi fi-rr-shield-check text-primary text-3xl"></i>
                CekHalal
            </a>

            <button class="lg:hidden text-2xl text-navy hover:text-primary focus:outline-none" onclick="toggleMenu()">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>

            <div class="hidden lg:flex items-center gap-12" id="navMenu">
                <ul class="flex gap-8 list-none m-0 p-0">
                    @php
                        $linkClass =
                            'text-gray-text font-semibold text-[0.95rem] hover:text-primary transition-colors duration-300';
                        $activeClass = 'nav-active';
                    @endphp

                    <li><a href="{{ route('home') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('home') ? $activeClass : '' }}">Beranda</a>
                    </li>
                    <li><a href="{{ route('tentang.index') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('tentang.*') ? $activeClass : '' }}">Tentang
                            Kami</a></li>
                    <li><a href="{{ route('produk.index') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('produk.*') ? $activeClass : '' }}">Cek
                            Produk</a></li>
                    <li><a href="{{ route('berita.index') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('berita.*') ? $activeClass : '' }}">Berita</a>
                    </li>
                    <li><a href="{{ route('testimonial') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('testimonial') ? $activeClass : '' }}">Testimoni</a>
                    </li>
                    <li><a href="{{ route('faq.index') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('faq') ? $activeClass : '' }}">FAQ</a>
                    </li>
                    <li><a href="{{ route('kontak.index') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('kontak.*') ? $activeClass : '' }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity"
        onclick="toggleMenu()"></div>

    <div id="mobileSidebar"
        class="fixed top-[80px] right-0 w-[280px] h-[calc(100vh-80px)] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 lg:hidden flex flex-col p-6 border-l border-gray-100 overflow-y-auto">
        <ul class="flex flex-col gap-4">
            <li><a href="{{ route('home') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-text' }}">Beranda</a>
            </li>
            <li><a href="{{ route('tentang.index') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('tentang.*') ? 'text-primary' : 'text-gray-text' }}">Tentang
                    Kami</a></li>
            <li><a href="{{ route('produk.index') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('produk.*') ? 'text-primary' : 'text-gray-text' }}">Cek
                    Produk</a></li>
            <li><a href="{{ route('berita.index') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('berita.*') ? 'text-primary' : 'text-gray-text' }}">Berita</a>
            </li>
            <li><a href="{{ route('faq.index') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('faq') ? 'text-primary' : 'text-gray-text' }}">FAQ</a>
            </li>
            <li><a href="{{ route('kontak.index') }}"
                    class="block py-2 border-b border-gray-100 font-semibold {{ request()->routeIs('kontak.*') ? 'text-primary' : 'text-gray-text' }}">Kontak</a>
            </li>
        </ul>
    </div>

    <main class="flex-grow pt-[80px] pb-12 w-full">
        @yield('content')
    </main>

    <footer class="bg-navy text-white pt-20 pb-8 mt-auto border-t-[5px] border-primary">
        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 mb-12">

            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-white text-2xl font-bold mb-6">
                    <i class="fi fi-rr-shield-check"></i> CekHalal
                </a>
                <p class="text-gray-light leading-relaxed mb-8 text-sm">
                    Solusi digital terpercaya untuk memverifikasi kehalalan produk. Kami berkomitmen menyajikan data
                    akurat dari sumber resmi untuk ketenangan konsumsi Anda.
                </p>
                <div class="flex gap-4">
                    @foreach (['facebook', 'instagram', 'whatsapp', 'twitter'] as $social)
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-primary hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <i class="fi fi-brands-{{ $social }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-2">
                <h4
                    class="text-lg font-bold mb-7 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-8 after:h-1 after:bg-primary after:rounded-full">
                    Layanan</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('produk.index') }}"
                            class="text-gray-light hover:text-primary hover:pl-1 transition-all">Cek Sertifikasi</a>
                    </li>
                    <li><a href="{{ route('berita.index') }}"
                            class="text-gray-light hover:text-primary hover:pl-1 transition-all">Update Berita</a></li>
                    <li><a href="{{ route('faq.index') }}"
                            class="text-gray-light hover:text-primary hover:pl-1 transition-all">FAQ</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2">
                <h4
                    class="text-lg font-bold mb-7 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-8 after:h-1 after:bg-primary after:rounded-full">
                    Perusahaan</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('tentang.index') }}"
                            class="text-gray-light hover:text-primary hover:pl-1 transition-all">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak.index') }}"
                            class="text-gray-light hover:text-primary hover:pl-1 transition-all">Kontak Kami</a></li>
                    <li><a href="#" class="text-gray-light hover:text-primary hover:pl-1 transition-all">Kebijakan
                            Privasi</a></li>
                    <li><a href="#" class="text-gray-light hover:text-primary hover:pl-1 transition-all">Syarat &
                            Ketentuan</a></li>
                </ul>
            </div>

            <div class="lg:col-span-4">
                <h4
                    class="text-lg font-bold mb-7 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-8 after:h-1 after:bg-primary after:rounded-full">
                    Hubungi Kami</h4>
                <ul class="space-y-5">
                    <li class="flex gap-4 text-gray-light text-sm">
                        <i class="fi fi-rr-marker text-primary mt-1"></i>
                        <span>Jl. Veteran No.10-11, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</span>
                    </li>
                    <li class="flex gap-4 text-gray-light text-sm">
                        <i class="fi fi-rr-phone-call text-primary mt-1"></i>
                        <span>+62 8778 5711 752</span>
                    </li>
                    <li class="flex gap-4 text-gray-light text-sm">
                        <i class="fi fi-rr-envelope text-primary mt-1"></i>
                        <span>cekhalal@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 mt-16 pt-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Cek Halal Indonesia. Dikelola secara profesional untuk masyarakat.
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.remove('nav-scrolled');
                navbar.classList.add('bg-white/95');
            }
        });

        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('mobileMenuOverlay');

        function toggleMenu() {
            if (sidebar.classList.contains('translate-x-full')) {
                sidebar.classList.remove('translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            }
        }
    </script>

    @stack('scripts')
</body>

</html>