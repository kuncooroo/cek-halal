<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Cek Halal Indonesia')</title>

    <!-- Google Font (tetap) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome (icon profesional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* ================= NAVIGATION ================= */
        nav {
            background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
            padding: 1.2rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
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
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .logo small {
            display: block;
            font-size: .75rem;
            font-weight: 500;
            opacity: .9;
            margin-top: -5px;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 2.5rem;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: .95rem;
            position: relative;
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 2px;
            background: #fff;
        }

        .nav-phone {
            background: rgba(255, 255, 255, .2);
            padding: .7rem 1.4rem;
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        /* ================= FOOTER ================= */
        footer {
            background: #1a4444;
            color: #fff;
            padding: 3rem 2rem 2rem;
            margin-top: 5rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-about h3 {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 1rem;
            font-style: italic;
        }

        .footer-about p {
            opacity: .9;
            line-height: 1.8;
            margin-bottom: 1.2rem;
        }

        .footer-section h4 {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: .8rem;
            opacity: .9;
        }

        .footer-links i {
            margin-right: 8px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, .15);
            font-size: .9rem;
            opacity: .8;
        }

        /* ================= MOBILE ================= */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.6rem;
            cursor: pointer;
        }

        @media (max-width: 968px) {
            .nav-content {
                position: fixed;
                right: -100%;
                top: 70px;
                height: calc(100vh - 70px);
                width: 280px;
                background: #1e5555;
                flex-direction: column;
                align-items: flex-start;
                padding: 2rem;
                transition: .3s;
            }

            .nav-content.active {
                right: 0;
            }

            .nav-links {
                flex-direction: column;
                gap: 1.2rem;
            }

            .mobile-menu-btn {
                display: block;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <nav>
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                CekHalal
            </a>

            <button class="mobile-menu-btn" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="nav-content" id="navMenu">
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('produk.index') }}"
                            class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Cek Produk</a></li>
                    <li><a href="{{ route('berita.index') }}"
                            class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a></li>
                    <li><a href="{{ route('tentang.index') }}"
                            class="{{ request()->routeIs('tentang.*') ? 'active' : '' }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak.index') }}"
                            class="{{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ================= CONTENT ================= -->
    @yield('content')

    <!-- ================= FOOTER ================= -->
    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <a href="{{ route('home') }}" class="logo">
                    CekHalal
                </a>
                <p>
                    Platform informasi resmi untuk membantu masyarakat memverifikasi
                    status sertifikasi halal produk di Indonesia secara akurat.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Menu</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('produk.index') }}">Cek Produk</a></li>
                    <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Informasi</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('tentang.index') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Kontak</h4>
                <ul class="footer-links">
                    <li><i class="fa-solid fa-location-dot"></i>Malang, Jawa Timur, Indonesia</li>
                    <li><i class="fa-solid fa-phone"></i> (021) 123-1234</li>
                    <li><i class="fa-solid fa-envelope"></i> info@cekhalal.id</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Cek Halal Indonesia. All rights reserved.
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navMenu').classList.toggle('active');
        }
    </script>

    @stack('scripts')
</body>

</html>
