<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-brands/css/uicons-brands.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <title>@yield('title', 'Cek Halal Indonesia')</title>

    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --dark-green: #1a4444;
            --light-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: var(--light-bg);
        }

        /* ================= NAVIGATION (TRANSPARENT) ================= */
        nav {
            background: transparent;
            /* Default Transparan */
            padding: 1.2rem 0;
            position: fixed;
            /* Fixed agar menempel saat scroll */
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.4s ease;
        }

        /* Class ini akan aktif via Javascript saat scroll */
        nav.scrolled {
            background: var(--dark-green);
            padding: 0.8rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            text-decoration: none;
            color: #fff;
            font-size: 1.6rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            color: #4ade80;
            /* Aksen hijau terang pada ikon logo */
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            font-size: .95rem;
            transition: 0.3s;
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #fff;
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 20px;
            height: 2px;
            background: #4ade80;
        }

        /* ================= FOOTER (DARK PALETTE) ================= */
        footer {
            background: var(--dark-green);
            color: #fff;
            padding: 5rem 2rem 2rem;
            margin-top: 0;
            /* Menempel dengan konten jika diinginkan */
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.5fr 0.8fr 0.8fr 1.2fr;
            gap: 4rem;
        }

        .footer-about .logo {
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .footer-about p {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.8rem;
            color: #fff;
            position: relative;
        }

        .footer-section h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 30px;
            height: 2px;
            background: var(--primary-green);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: #4ade80;
            padding-left: 5px;
        }

        .contact-info li {
            display: flex;
            gap: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }

        .contact-info i {
            color: var(--primary-green);
            margin-top: 5px;
        }

        .social-links {
            display: flex;
            gap: 0.8rem;
        }

        .social-links a {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-links a:hover {
            background: var(--primary-green);
            transform: translateY(-3px);
            border-color: transparent;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 5rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
        }

        /* ================= MOBILE ================= */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 968px) {
            nav {
                background: var(--dark-green) !important;
            }

            /* Mobile tidak transparan */
            .nav-content {
                position: fixed;
                right: -100%;
                top: 70px;
                height: calc(100vh - 70px);
                width: 280px;
                background: #163a3a;
                flex-direction: column;
                padding: 2rem;
                transition: .4s;
            }

            .nav-content.active {
                right: 0;
            }

            .nav-links {
                flex-direction: column;
                gap: 1.5rem;
            }

            .mobile-menu-btn {
                display: block;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .footer-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav id="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <i class="fi fi-rr-征服"></i> CekHalal
            </a>

            <button class="mobile-menu-btn" onclick="toggleMenu()">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>

            <div class="nav-content" id="navMenu">
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('produk.index') }}"
                            class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Cek Produk</a></li>
                    <li><a href="{{ route('berita.index') }}"
                            class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a></li>
                    <li><a href="{{ route('testimonial') }}"
                            class="{{ request()->routeIs('testimonial') ? 'active' : '' }}">Testimoni</a></li>
                    <li><a href="{{ route('tentang.index') }}"
                            class="{{ request()->routeIs('tentang.*') ? 'active' : '' }}">Tentang</a></li>
                    <li><a href="{{ route('kontak.index') }}"
                            class="{{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <a href="{{ route('home') }}" class="logo">
                    CekHalal
                </a>
                <p>
                    Solusi digital terpercaya untuk memverifikasi kehalalan produk. Kami berkomitmen menyajikan data
                    akurat dari sumber resmi untuk ketenangan konsumsi Anda.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fi fi-brands-facebook"></i></a>
                    <a href="#"><i class="fi fi-brands-instagram"></i></a>
                    <a href="#"><i class="fi fi-brands-whatsapp"></i></a>
                    <a href="#"><i class="fi fi-brands-twitter"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Layanan</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('produk.index') }}">Cek Sertifikasi</a></li>
                    <li><a href="{{ route('berita.index') }}">Update Berita</a></li>
                    <li><a href="#">Panduan Halal</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Perusahaan</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('tentang.index') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak.index') }}">Kontak Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Hubungi Kami</h4>
                <ul class="contact-info">
                    <li>
                        <i class="fi fi-rr-marker"></i>
                        <span>Jl. Raya Halal No. 123, Kota Malang, Jawa Timur</span>
                    </li>
                    <li>
                        <i class="fi fi-rr-phone-call"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li>
                        <i class="fi fi-rr-envelope"></i>
                        <span>support@cekhalal.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Cek Halal Indonesia. Dikelola secara profesional untuk masyarakat.
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        function toggleMenu() {
            document.getElementById('navMenu').classList.toggle('active');
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>