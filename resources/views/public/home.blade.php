@extends('layouts.public')

@section('title', 'Cek Halal Indonesia - Platform Verifikasi Sertifikasi Halal')

@push('styles')
<style>
    /* =========================================
       1. GLOBAL VARIABLES & RESET
       ========================================= */
    :root {
        --primary-color: #2ab5c8; /* Biru muda sesuai referensi gambar */
        --primary-dark: #2399a9;
        --secondary-color: #1a4444;
        --text-color: #666;
        --bg-light: #f8f9fa;
    }

    /* =========================================
       2. NEW HERO SECTION (SESUAI GAMBAR)
       ========================================= */
    .hero {
        /* Gambar Background Pemandangan */
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?q=80&w=2070&auto=format&fit=crop'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        min-height: 70vh; /* Tinggi layar penuh */
        display: flex;
        align-items: center;
        padding-bottom: 6rem; /* Memberi ruang untuk search bar melayang */
    }

    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 3rem;
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .hero-content {
        max-width: 800px;
    }

    /* Teks tulisan tangan kecil di atas judul */
    .hero-subtitle {
        font-family: 'Brush Script MT', cursive; 
        font-size: 2rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 0.5rem;
        display: block;
        letter-spacing: 1px;
    }

    .hero-content h1 {
        font-size: 4.5rem;
        font-weight: 800;
        color: white;
        line-height: 1.1;
        margin-bottom: 2.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .hero-buttons {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    /* Tombol Umum */
    .btn {
        padding: 1rem 2.5rem;
        border-radius: 50px; /* Bentuk bulat (Pill shape) */
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
        box-shadow: 0 4px 15px rgba(42, 181, 200, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        background: var(--primary-dark);
        box-shadow: 0 8px 25px rgba(42, 181, 200, 0.5);
    }

    .btn-secondary {
        background: rgba(255,255,255,0.1);
        color: white;
        border: 2px solid white;
        backdrop-filter: blur(5px);
    }

    .btn-secondary:hover {
        background: white;
        color: var(--primary-color);
    }

    /* =========================================
       3. FLOATING SEARCH WIDGET (BARU)
       ========================================= */
    .search-widget-wrapper {
        position: relative;
        margin-top: -5rem; /* Menarik widget ke atas agar menumpuk hero */
        z-index: 10;
        padding: 0 3rem;
        margin-bottom: 2rem;
    }

    .search-widget {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .search-group {
        flex: 1;
        min-width: 200px;
        padding-right: 1.5rem;
        border-right: 1px solid #eee;
    }

    .search-group:last-child {
        border-right: none;
        padding-right: 0;
        flex: 0 0 auto;
    }

    .search-label {
        display: block;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .search-input {
        width: 100%;
        border: none;
        outline: none;
        color: #555;
        font-size: 1rem;
        background: transparent;
        font-weight: 500;
    }

    .search-input::placeholder {
        color: #aaa;
    }

    .btn-search {
        background: var(--primary-color);
        color: white;
        padding: 1rem 3rem;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-search:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* =========================================
       4. ORIGINAL SECTIONS STYLING (DIKEMBALIKAN)
       ========================================= */
    
    /* Common Section Styles */
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-label {
        color: var(--primary-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }

    .section-description {
        font-size: 1.1rem;
        color: var(--text-color);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Stats Section */
    .stats-section {
        padding: 6rem 3rem 4rem; /* Padding atas agak besar krn search bar */
        background: var(--bg-light);
    }

    .stats-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 3rem;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1.1rem;
        color: var(--text-color);
        font-weight: 500;
    }

    /* About Section */
    .about-section {
        padding: 5rem 3rem;
        background: white;
    }
    .about-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* About Info Section (Dark Teal) */
    .about-info-section {
        padding: 5rem 3rem;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%); /* Warna asli dipertahankan utk kontras */
    }

    .about-info-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .about-image-main {
        width: 100%;
        height: 500px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10rem;
        overflow: hidden;
    }

    .about-info-content {
        color: white;
    }

    .about-info-content .section-label { color: #c8e6e6; }
    .about-info-content .section-title { color: white; }
    .about-info-content p {
        color: rgba(255,255,255,0.9);
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    /* Features Section */
    .features-section {
        padding: 5rem 3rem;
        background: white;
    }

    .features-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.5rem;
        margin-top: 3rem;
    }

    .feature-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2.5rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 30px rgba(42, 181, 200, 0.1);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color) 0%, #2399a9 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        color: white;
    }

    .feature-card h3 {
        font-size: 1.4rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .feature-card p {
        color: var(--text-color);
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .learn-more {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .learn-more:hover { gap: 0.8rem; }

    /* CTA Section */
    .cta-section {
        padding: 5rem 3rem;
        background: var(--bg-light);
        text-align: center;
    }

    .cta-container {
        max-width: 800px;
        margin: 0 auto;
    }

    /* =========================================
       5. RESPONSIVE MEDIA QUERIES
       ========================================= */
    @media (max-width: 968px) {
        /* Hero & Search */
        .hero-content h1 { font-size: 3rem; }
        
        .search-widget {
            flex-direction: column;
            align-items: stretch;
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .search-group {
            border-right: none;
            border-bottom: 1px solid #eee;
            padding-right: 0;
            padding-bottom: 1rem;
        }

        .search-widget-wrapper { margin-top: -3rem; padding: 0 1.5rem; }
        
        /* Sections */
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        
        .about-info-container {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .features-grid { grid-template-columns: 1fr; }
        .section-title { font-size: 2rem; }
    }

    @media (max-width: 576px) {
        .hero-content h1 { font-size: 2.5rem; }
        .stats-container { grid-template-columns: 1fr; }
        .hero-buttons { flex-direction: column; width: 100%; }
        .btn { width: 100%; justify-content: center; }
        .hero { padding-bottom: 4rem; }
    }
</style>
@endpush

@section('content')
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <span class="hero-subtitle">Jaminan kehalalan untuk ketenangan hati</span>
            
            <h1>Platform Verifikasi<br>Halal Terpercaya</h1>
            
        </div>
    </div>
</section>

<div class="search-widget-wrapper">
    <form action="{{ route('produk.index') }}" method="GET" class="search-widget">
        <div class="search-group">
            <label class="search-label">Kata Kunci</label>
            <input type="text" name="q" class="search-input" placeholder="Nama Produk / Sertifikat..." required>
        </div>

        <div class="search-group">
            <label class="search-label">Tipe Produk</label>
            <select name="type" class="search-input" style="cursor: pointer;">
                <option value="">Semua Kategori</option>
                <option value="makanan">Makanan & Minuman</option>
                <option value="kosmetik">Kosmetik</option>
                <option value="obat">Obat-obatan</option>
            </select>
        </div>

        <div class="search-group">
            <label class="search-label">Produsen</label>
            <input type="text" name="produsen" class="search-input" placeholder="Nama PT/UMKM...">
        </div>

        <div class="search-group">
            <button type="submit" class="btn-search">
                    Cari Halal
            </button>
        </div>
    </form>
</div>


<section id="about" class="about-section">
    <div class="about-container">
        <div class="section-header">
            <h2 class="section-title">Verifikasi Halal Dibuat Mudah</h2>
            <p class="section-description">
                Kami menyediakan platform yang memudahkan Anda untuk mengecek status sertifikasi halal produk dengan database yang terintegrasi langsung dengan sistem resmi BPJPH.
            </p>
        </div>
    </div>
</section>
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($totalProduk ?? 12500) }}</div>
            <div class="stat-label">Produk Terdaftar</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ number_format($totalProdusen ?? 340) }}</div>
            <div class="stat-label">Produsen</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">7+</div>
            <div class="stat-label">Tahun Pengalaman</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">100K+</div>
            <div class="stat-label">Pengguna</div>
        </div>
    </div>
</section>

<section class="about-info-section">
    <div class="about-info-container">
        <div class="about-image-wrapper">
            <div class="about-image-main">
                📱
            </div>
        </div>
        <div class="about-info-content">
            <div class="section-label">TEKNOLOGI MODERN</div>
            <h2 class="section-title">Tentang Cek Halal Indonesia</h2>
            <p>
                Platform Cek Halal dikembangkan dengan teknologi terkini untuk memberikan pengalaman terbaik dalam memverifikasi status sertifikasi halal produk. Kami berkomitmen untuk selalu memberikan informasi yang akurat dan terpercaya.
            </p>
            <p>
                Dengan fitur pencarian yang fleksibel, Anda dapat mencari produk berdasarkan nama produk, nama produsen, nomor sertifikat halal, atau bahkan scan barcode langsung dari kemasan produk.
            </p>
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="tel:+622112345678" class="btn btn-secondary">
                    📞 (021) 123-1234
                </a>
                <a href="{{ route('produk.index') }}" class="btn btn-primary" style="background: white; color: var(--secondary-color);">
                    Cek Produk
                </a>
            </div>
        </div>
    </div>
</section>

<section class="features-section">
    <div class="features-container">
        <div class="section-header">
            <div class="section-label">LAYANAN KAMI</div>
            <h2 class="section-title">Fitur Unggulan Platform</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Pencarian Produk</h3>
                <p>Cari produk berdasarkan nama produk untuk mendapatkan informasi sertifikasi halal secara instan.</p>
                <a href="{{ route('produk.index') }}" class="learn-more">
                    Coba Sekarang →
                </a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🏢</div>
                <h3>Cari Berdasarkan Produsen</h3>
                <p>Temukan semua produk halal dari produsen favorit Anda dengan mudah dan cepat.</p>
                <a href="{{ route('produk.index') }}" class="learn-more">
                    Coba Sekarang →
                </a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Scan Barcode</h3>
                <p>Gunakan kamera smartphone untuk scan barcode produk dan dapatkan hasilnya langsung.</p>
                <a href="{{ route('produk.index') }}" class="learn-more">
                    Coba Sekarang →
                </a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📄</div>
                <h3>Verifikasi Sertifikat</h3>
                <p>Cek keabsahan nomor sertifikat halal untuk memastikan produk terdaftar secara resmi.</p>
                <a href="{{ route('produk.index') }}" class="learn-more">
                    Coba Sekarang →
                </a>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-container">
        <div class="section-label">HUBUNGI KAMI</div>
        <h2 class="section-title">Siap Verifikasi Produk Halal Anda?</h2>
        <p class="section-description">
            Mulai gunakan platform kami sekarang untuk memastikan produk yang Anda konsumsi memiliki sertifikasi halal yang valid.
        </p>
        <div class="hero-buttons" style="justify-content: center; margin-top: 2rem;">
            <a href="{{ route('produk.index') }}" class="btn btn-primary">
                Mulai Cek Produk
            </a>
            <a href="{{ route('kontak.index') }}" class="btn btn-secondary" style="background: white; color: var(--primary-color); border-color: var(--primary-color);">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection