@extends('layouts.public')

@section('title', 'Cek Halal Indonesia - Platform Verifikasi Sertifikasi Halal')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --dark-green: #1a4444;
            --accent-yellow: #f6e05e;
            --text-gray: #718096;
            --light-bg: #f8fafc;
        }

        /* 1. HERO SECTION */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070');
            background-size: cover;
            background-position: center;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        /* 2. SEARCH WIDGET */
        .search-container {
            max-width: 1000px;
            margin: -100px auto 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 24px;
            position: relative;
            z-index: 20;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .search-container h3 {
            color: var(--dark-green);
            margin-bottom: 2rem;
            font-weight: 800;
            font-size: 1.5rem;
            text-align: center;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 2rem;
        }

        .search-group label {
            display: block;
            color: var(--text-gray);
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .search-group input,
        .search-group select {
            width: 100%;
            background: #f1f5f9;
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--dark-green);
            padding: 0.8rem 1.2rem;
            transition: 0.3s;
            font-weight: 500;
        }

        .search-group input:focus {
            outline: none;
            border-color: var(--primary-green);
            background: white;
        }

        .btn-search {
            background: var(--primary-green);
            color: white;
            padding: 0 2.5rem;
            height: 52px;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            align-self: end;
            transition: 0.3s;
        }

        .btn-search:hover {
            background: var(--dark-green);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(45, 138, 106, 0.2);
        }

        /* 3. STATS SECTION */
        .stats-section {
            padding: 120px 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 6rem;
            align-items: center;
        }

        .stat-card {
            background: var(--dark-green);
            /* Sama dengan Navbar */
            color: white;
            padding: 3rem 2rem;
            border-radius: 24px;
            text-align: center;
            transition: 0.3s;
            border-bottom: 5px solid var(--accent-yellow);
        }

        .stat-card:hover {
            transform: translateY(-10px);
        }

        .stat-card h4 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--accent-yellow);
        }

        .stat-card p {
            font-weight: 600;
            opacity: 0.9;
            font-size: 1rem;
        }

        /* 4. MISI KAMI (Sekarang Hijau Gelap) */
        .about-section {
            background: var(--dark-green);
            padding: 120px 0;
            color: white;
            /* Teks jadi putih */
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
            padding: 0 1.5rem;
        }

        .about-images img {
            border-radius: 24px;
            width: 100%;
            height: 450px;
            object-fit: cover;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .about-images img:last-child {
            margin-top: 40px;
        }

        /* 5. FITUR UNGGULAN (Sekarang Putih Bersih) */
        .features-section {
            background: white;
            padding: 120px 1.5rem;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .feature-card {
            background: var(--dark-green);
            /* Card jadi Hijau */
            padding: 3rem 1.5rem;
            border-radius: 24px;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            color: white;
            /* Teks jadi Putih */
            box-shadow: 0 10px 30px rgba(45, 138, 106, 0.2);
        }

        .feature-card:hover {
            transform: translateY(-15px);
            background: var(--primary-green);
            /* Hijau lebih gelap saat hover */
            box-shadow: 0 20px 40px rgba(26, 68, 68, 0.3);
        }

        .feature-card i {
            font-size: 3rem;
            color: var(--accent-yellow);
            /* Ikon Kuning biar kontras */
            margin-bottom: 1.5rem;
            display: block;
        }

        .feature-card h4 {
            color: white;
            font-weight: 800;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .btn-service {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            background: var(--accent-yellow);
            color: var(--dark-green);
            text-decoration: none;
            font-weight: 800;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .btn-service:hover {
            background: white;
            transform: scale(1.05);
        }

        @media (max-width: 992px) {
            .search-form {
                grid-template-columns: 1fr 1fr;
            }

            .stats-section,
            .about-container,
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Platform Verifikasi Halal<br>Generasi Terbaru</h1>
            <p>Memberikan kepastian hukum dan ketenangan batin bagi konsumen cerdas di seluruh Indonesia.</p>
        </div>
    </section>

    <div class="search-container">
        <form action="{{ route('produk.index') }}" method="GET" class="search-form">
            <div class="search-group">
                <label>Nama Produk</label>
                <input type="text" name="q" placeholder="Cari Mie Instan, Daging, dll">
            </div>

            <div class="search-group">
                <label>Perusahaan</label>
                <input type="text" name="produsen" placeholder="PT. Nama Perusahaan">
            </div>
            <div class="search-group">
                <label>No Sertifikasi</label>
                <input type="text" name="no" placeholder="1770130..">
            </div>
            <button type="submit" class="btn-search">Cari Data</button>
        </form>
    </div>

    <section class="stats-section">
        <div class="stats-info">
            <span
                style="color: var(--primary-green); font-weight: 800; text-transform: uppercase; letter-spacing: 2px;">Data
                Real-time</span>
            <h2 style="font-size: 3rem; color: var(--dark-green); line-height: 1.1; margin: 1rem 0;">Integrasi Data Langsung
                dari BPJPH</h2>
            <p style="color: var(--text-gray); font-size: 1.1rem; margin-bottom: 2rem;">Akses basis data sertifikasi halal
                terbesar di Indonesia dengan parameter pencarian yang mendalam dan hasil yang instan.</p>
            <a href="{{ route('testimonial') }}"
                style="color: var(--primary-green); font-weight: 700; text-decoration: none;">Lihat Apa Kata Pengguna <i
                    class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="stats-grid">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="stat-card">
                    <h4>20K+</h4>
                    <p>Produk Halal</p>
                </div>
                <div class="stat-card" style="margin-top: 20px;">
                    <h4>100%</h4>
                    <p>Akurasi Data</p>
                </div>
                <div class="stat-card">
                    <h4>24/7</h4>
                    <p>Akses Publik</p>
                </div>
                <div class="stat-card" style="margin-top: 20px;">
                    <h4>500+</h4>
                    <p>Produsen</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="about-images">
                <img src="https://images.unsplash.com/photo-1579027989536-b7b1f875659b?q=80&w=2070" alt="Halal Food">
                <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?q=80&w=2030" alt="Cosmetic">
            </div>
            <div class="about-text">
                <h4 style="color: var(--accent-yellow); font-weight: 800;">MISI KAMI</h4>
                <h2 style="font-size: 2.8rem; margin: 1rem 0; line-height: 1.1;">Membangun Ekosistem Halal Digital Indonesia
                </h2>
                <p style="opacity: 0.8; font-size: 1.1rem; margin-bottom: 2rem;">Kami hadir untuk menghilangkan keraguan
                    konsumen melalui teknologi. Dengan mempermudah akses informasi sertifikasi, kita bersama-sama memperkuat
                    industri halal.</p>
                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('kontak.index') }}" class="btn-search"
                        style="background: var(--accent-yellow); color: var(--dark-green); text-decoration: none; display: flex; align-items: center; justify-content: center;">Hubungi
                        Kami</a>
                    <a href="{{ route('tentang.index') }}"
                        style="padding: 1rem 2rem; font-weight: 700; color: white; text-decoration: none;">Tentang Kami <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div style="text-align: center; margin-bottom: 5rem;">
            <span style="color: var(--primary-green); font-weight: 800; text-transform: uppercase;">Kemudahan Layanan</span>
            <h2 style="font-size: 2.8rem; color: var(--dark-green); margin-top: 0.5rem;">Fitur Unggulan Kami</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h4>Pencarian Cerdas</h4>
                <p>Algoritma pencarian cepat berdasarkan Nama, Brand, atau Nomor Sertifikat.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Coba Sekarang</a>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-qrcode"></i>
                <h4>Scan Barcode</h4>
                <p>Cukup arahkan kamera ke barcode produk untuk melihat status halalnya.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Buka Kamera</a>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-building-circle-check"></i>
                <h4>Profil Produsen</h4>
                <p>Informasi lengkap mengenai daftar produk dari perusahaan tertentu.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Lihat Data</a>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-file-shield"></i>
                <h4>Cek Keaslian</h4>
                <p>Validasi masa berlaku sertifikat agar Anda terhindar dari pemalsuan.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Validasi</a>
            </div>
        </div>
    </section>
@endsection