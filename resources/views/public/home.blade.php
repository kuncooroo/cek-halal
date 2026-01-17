@extends('layouts.public')

@section('title', 'Cek Halal Indonesia - Platform Verifikasi Sertifikasi Halal')

@push('styles')
    <style>
        :root {
            --primary-green: #38a169;
            /* Warna hijau sesuai gambar */
            --dark-green: #276749;
            --accent-yellow: #f6e05e;
            --text-gray: #4a5568;
            --light-bg: #f7fafc;
        }

        /* 1. HERO SECTION */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.5rem;
            opacity: 0.9;
        }

        /* 2. SEARCH WIDGET (Melayang di atas Hero) */
        .search-container {
            max-width: 1000px;
            margin: -80px auto 0;
            background: rgba(45, 138, 106, 0.8);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 15px;
            position: relative;
            z-index: 20;
        }

        .search-container h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 1.5rem;
        }

        .search-group label {
            display: block;
            color: white;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .search-group input,
        .search-group select {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid white;
            color: white;
            padding: 0.5rem 0;
        }

        .btn-search {
            background: var(--accent-yellow);
            color: #444;
            padding: 0.75rem 2.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 700;
            cursor: pointer;
        }

        /* 3. STATS SECTION (Grid 4 Kotak) */
        .stats-section {
            padding: 100px 1rem;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .stat-card {
            background: var(--primary-green);
            color: white;
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 10px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .stat-card h4 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        /* 4. ABOUT SECTION */
        .about-section {
            background: white;
            padding: 100px 1rem;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-images {
            display: flex;
            gap: 1rem;
        }

        .about-images img {
            border-radius: 20px;
            width: 50%;
            height: 400px;
            object-fit: cover;
        }

        /* 5. SERVICES/FEATURES GRID (Green Background) */
        .features-section {
            background: var(--primary-green);
            padding: 80px 1rem;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }

        .feature-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .btn-feature {
            background: var(--primary-green);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
            font-size: 0.8rem;
        }

        /* 6. CTA SECTION */
        .cta-section {
            max-width: 1200px;
            margin: 80px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            padding: 0 1rem;
        }

        .cta-image img {
            width: 100%;
            border-radius: 15px;
        }

        @media (max-width: 768px) {

            .search-widget,
            .stats-section,
            .about-container,
            .features-grid,
            .cta-section {
                grid-template-columns: 1fr;
            }

            .hero-content h1 {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Platform Verifikasi Halal<br>Terpercaya</h1>
            <p>Jaminan Halal Untuk Ketenangan Hati</p>
        </div>
    </section>

    <div class="search-container">
        <h3>Cek Sertifikat Halal</h3>
        <form action="{{ route('produk.index') }}" method="GET" class="search-form">
            <div class="search-group">
                <label>Kata Kunci</label>
                <input type="text" name="q" placeholder="Nama Produk / Sertifikat">
            </div>
            <div class="search-group">
                <label>Tipe Produk</label>
                <select name="type">
                    <option value="">Semua Tipe</option>
                    <option value="makanan">Makanan & Minuman</option>
                    <option value="kosmetik">Kosmetik</option>
                </select>
            </div>
            <div class="search-group">
                <label>Produsen</label>
                <input type="text" name="produsen" placeholder="Nama Perusahaan">
            </div>
            <button type="submit" class="btn-search">Cari</button>
        </form>
    </div>

    <section class="stats-section">
        <div class="stats-info">
            <h2 style="font-size: 2.5rem; color: #2d3748;">Mempermudah Proses Verifikasi Halal</h2>
            <p style="color: #718096; line-height: 1.8;">Kami menyediakan platform yang memudahkan Anda untuk mengecek
                status sertifikasi halal produk dengan database yang terintegrasi langsung dengan sistem resmi BPJPH.</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <h4>20 <i class="fi fi-rr-box"></i></h4>
                <p>Produk Terdaftar</p>
            </div>
            <div class="stat-card">
                <h4>10K <i class="fi fi-rr-users"></i></h4>
                <p>Pengguna</p>
            </div>
            <div class="stat-card">
                <h4>7+ <i class="fi fi-rr-calendar"></i></h4>
                <p>Tahun Pengalaman</p>
            </div>
            <div class="stat-card">
                <h4>20 <i class="fi fi-rr-factory"></i></h4>
                <p>Produsen</p>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="about-images">
                <img src="https://images.unsplash.com/photo-1579027989536-b7b1f875659b?q=80&w=2070" alt="Halal Food">
                <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?q=80&w=2030" alt="Cosmetic"
                    style="margin-top: 40px;">
            </div>
            <div class="about-text">
                <h4 style="color: var(--primary-green); margin-bottom: 0;">Layanan Kami</h4>
                <h2 style="font-size: 2.5rem; margin-top: 10px;">Tentang Cek Halal Indonesia</h2>
                <p style="color: #718096;">Platform Cek Halal membantu memverifikasi status kehalalan produk secara akurat.
                    Kami berkomitmen memberikan transparansi informasi bagi konsumen muslim di Indonesia.</p>
                <div style="margin-top: 2rem;">
                    <a href="#" class="btn-search" style="text-decoration: none; display: inline-block;">(021) 123-1234</a>
                    <a href="#" class="btn-feature">Cek Produk</a>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card">
                <img src="https://images.unsplash.com/photo-1534452285544-d4ef5016283d?q=80&w=2070" alt="">
                <h4>Pencarian Produk</h4>
                <p style="font-size: 0.8rem; color: #718096;">Cari produk berdasarkan nama untuk info sertifikasi.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Cek Sekarang</a>
            </div>
            <div class="feature-card">
                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2070" alt="">
                <h4>Berdasarkan Produsen</h4>
                <p style="font-size: 0.8rem; color: #718096;">Temukan semua produk dari produsen pilihan.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Cek Sekarang</a>
            </div>
            <div class="feature-card">
                <img src="https://images.unsplash.com/photo-1563906267088-b029e7101114?q=80&w=2070" alt="">
                <h4>Scan Barcode</h4>
                <p style="font-size: 0.8rem; color: #718096;">Scan kemasan untuk hasil instan.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Cek Sekarang</a>
            </div>
            <div class="feature-card">
                <img src="https://images.unsplash.com/photo-1568027762272-e4da8b386fe9?q=80&w=2030" alt="">
                <h4>Verifikasi Sertifikat</h4>
                <p style="font-size: 0.8rem; color: #718096;">Cek validitas nomor sertifikat resmi.</p>
                <a href="{{ route('produk.index') }}" class="btn-service">Cek Sekarang</a>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-text">
            <h4>Hubungi Kami</h4>
            <h2 style="font-size: 2.5rem;">Siap Verifikasi Produk Halal Anda?</h2>
            <p style="color: #718096;">Gunakan platform kami sekarang untuk memastikan produk konsumsi Anda memiliki
                sertifikat halal yang valid.</p>
            <div style="margin-top: 2rem;">
                <a href="{{ route('kontak.index') }}"" class=" btn-search"
                    style="text-decoration: none; display: inline-block; background: var(--primary-green); color: white;">Hubungi
                    Kami</a>
                <a href="{{ route('produk.index') }}"" class=" btn-search"
                    style="text-decoration: none; display: inline-block; margin-left: 1rem;">Cek
                    Produk</a>
            </div>
        </div>
        <div class="cta-image">
            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=2048" alt="Store">
        </div>
    </section>
@endsection