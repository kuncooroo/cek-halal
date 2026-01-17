@extends('layouts.public')

@section('title', 'Tentang Kami - Cek Halal Indonesia')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --accent-gold: #e9c46a;
            --text-muted: #718096;
            --bg-light: #f4f7f6;
        }

        /* Hero Section Sesuai Foto */
        .page-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=2074');
            background-size: cover;
            background-position: center;
            padding: 8rem 2rem;
            text-align: left;
            color: white;
        }

        .page-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 1.5rem;
        }

        /* Intro Section */
        .about-intro {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 6rem;
        }

        .about-text h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }

        .about-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Nilai - Nilai Kami */
        .values-section {
            background: var(--primary-green);
            padding: 5rem 2rem;
            margin: 0 calc(-50vw + 50%);
            color: white;
        }

        .values-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .values-section h2 {
            font-size: 1.8rem;
            margin-bottom: 4rem;
            font-weight: 700;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .value-card {
            text-align: center;
        }

        .value-card i {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        /* Visi & Misi */
        .vm-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin: 5rem 0;
        }

        .vm-box {
            padding: 3.5rem;
            border-radius: 15px;
        }

        .visi-box {
            background: white;
            color: #1a202c;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .misi-box {
            background: #1a202c;
            color: white;
        }

        /* Features Section */
        .features-section {
            background: var(--primary-green);
            padding: 5rem;
            border-radius: 15px;
            color: white;
            margin-bottom: 6rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            position: relative;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .feature-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: var(--accent-gold);
        }

        /* CTA Footer */
        .cta-footer {
            text-align: center;
            padding: 4rem 0;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn-custom {
            padding: 0.8rem 2.5rem;
            border-radius: 30px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-emerald {
            background: var(--primary-green);
            color: white;
        }

        .btn-gold {
            background: var(--accent-gold);
            color: #1a202c;
        }

        @media (max-width: 968px) {

            .about-intro,
            .vm-section,
            .features-grid,
            .values-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero">
        <h1>Tentang Kami</h1>
    </section>

    <div class="content-wrapper">
        <div class="about-intro">
            <div class="about-text">
                <h2>Platform Cek Sertifikasi Halal Indonesia</h2>
                <p>Platform Cek Halal dikembangkan sebagai solusi digital untuk menjawab kebutuhan masyarakat dalam
                    mengakses informasi sertifikasi halal produk dengan cepat dan mudah. Kami memastikan setiap informasi
                    yang disajikan akurat dan terkini melalui integrasi database resmi.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=2070" alt="Masjid Image">
            </div>
        </div>

        <section class="values-section">
            <div class="values-container">
                <h2>Nilai - Nilai Kami</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <i class="fi fi-rr-shield-check"></i>
                        <h3>Kepercayaan</h3>
                        <p>Menyajikan informasi akurat dan dapat dipercaya.</p>
                    </div>
                    <div class="value-card">
                        <i class="fi fi-rr-clock-three"></i>
                        <h3>Kecepatan</h3>
                        <p>Layanan verifikasi yang cepat dan responsif.</p>
                    </div>
                    <div class="value-card">
                        <i class="fi fi-rr-handshake"></i>
                        <h3>Integritas</h3>
                        <p>Transparansi dan kejujuran dalam setiap layanan.</p>
                    </div>
                    <div class="value-card">
                        <i class="fi fi-rr-bulb"></i>
                        <h3>Inovasi</h3>
                        <p>Terus berinovasi untuk pengalaman pengguna yang lebih baik.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="vm-section">
            <div class="vm-box visi-box">
                <h3>Visi</h3>
                <p>Cek Halal adalah platform digital yang hadir untuk memudahkan masyarakat Indonesia dalam memverifikasi
                    status sertifikasi halal produk. Kami berkomitmen memberikan informasi yang akurat, cepat, dan
                    terpercaya untuk mendukung gaya hidup halal masyarakat muslim Indonesia.
                </p>
            </div>
            <div class="vm-box misi-box">
                <h3>Misi</h3>
                <p>Memberikan layanan verifikasi halal yang cepat dan mudah, meningkatkan kesadaran masyarakat tentang
                    pentingnya produk halal, serta mendukung implementasi UU Jaminan Produk Halal.</p>
            </div>
        </div>

        <section class="features-section">
            <h2>Mengapa Memilih Platform Kami</h2>
            <div class="features-grid">
                <ul class="feature-list">
                    <li>Database terintegrasi langsung dengan sistem resmi BPJPH</li>
                    <li>Fitur pencarian fleksibel dengan 4 metode</li>
                    <li>Antarmuka user-friendly untuk semua kalangan</li>
                </ul>
                <ul class="feature-list">
                    <li>Update data secara berkala</li>
                    <li>Akses gratis tanpa biaya untuk seluruh masyarakat</li>
                    <li>Dapat diakses dari berbagai perangkat</li>
                </ul>
            </div>
        </section>

        <div class="cta-footer">
            <h2>Mulailah Gunakan Platform Kami</h2>
            <p>Verifikasi status halal produk Anda sekarang dengan mudah dan cepat</p>
            <div class="btn-group">
                <a href="{{ route('kontak.index') }}" class="btn-custom btn-emerald">Hubungi Kami</a>
                <a href="{{ route('produk.index') }}" class="btn-custom btn-gold">Cek Produk</a>
            </div>
        </div>
    </div>
@endsection