@extends('layouts.public')

@section('title', 'Tentang Kami - Cek Halal Indonesia')

@push('styles')
<style>
    .page-hero {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        padding: 4rem 3rem 3rem;
        text-align: center;
        color: white;
    }

    .page-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .page-hero p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }

    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 5rem 2rem;
    }

    /* Hero About */
    .about-hero {
        background: white;
        padding: 4rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        margin-bottom: 4rem;
        text-align: center;
    }

    .hero-icon {
        font-size: 6rem;
        margin-bottom: 2rem;
    }

    .about-hero h2 {
        color: #1a4444;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        font-weight: 800;
    }

    .about-hero p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.9;
        max-width: 900px;
        margin: 0 auto;
    }

    /* Vision & Mission */
    .vm-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2.5rem;
        margin-bottom: 4rem;
    }

    .vm-card {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    .vm-card:hover {
        transform: translateY(-5px);
    }

    .vm-icon {
        font-size: 5rem;
        margin-bottom: 1.5rem;
    }

    .vm-card h3 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 1.2rem;
        font-weight: 800;
    }

    .vm-card p {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.9;
    }

    /* Content Sections */
    .content-section {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .content-section h3 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #2d7b7b;
        font-weight: 800;
    }

    .content-section p {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.9;
        margin-bottom: 1.5rem;
    }

    .content-section ul {
        list-style: none;
        padding-left: 0;
    }

    .content-section li {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.9;
        margin-bottom: 1rem;
        padding-left: 2.5rem;
        position: relative;
    }

    .content-section li:before {
        content: "✓";
        position: absolute;
        left: 0;
        width: 30px;
        height: 30px;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.1rem;
    }

    /* Values Section */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .value-card {
        background: linear-gradient(135deg, #f0f9f9 0%, #e0f2f2 100%);
        padding: 2.5rem;
        border-radius: 15px;
        text-align: center;
        border: 2px solid #c8e6e6;
        transition: all 0.3s;
    }

    .value-card:hover {
        transform: translateY(-5px);
        border-color: #2d7b7b;
    }

    .value-icon {
        font-size: 3.5rem;
        margin-bottom: 1.2rem;
    }

    .value-card h4 {
        color: #1a4444;
        font-size: 1.4rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .value-card p {
        color: #555;
        font-size: 1rem;
        line-height: 1.7;
    }

    /* Team Section */
    .team-section {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        padding: 4rem;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 4rem;
    }

    .team-section h3 {
        font-size: 2.5rem;
        margin-bottom: 1.2rem;
        font-weight: 800;
    }

    .team-section p {
        font-size: 1.2rem;
        margin-bottom: 3rem;
        opacity: 0.9;
    }

    .team-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 2.5rem;
        margin-top: 2.5rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1.1rem;
    opacity: 0.9;
    font-weight: 500;
}

/* CTA Section */
.cta-section {
    background: white;
    padding: 4rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    text-align: center;
}

.cta-section h3 {
    color: #1a4444;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 800;
}

.cta-section p {
    color: #666;
    font-size: 1.2rem;
    margin-bottom: 2.5rem;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    padding: 1.2rem 3rem;
    border: none;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
}

.btn-primary {
    background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(45, 123, 123, 0.3);
}

.btn-secondary {
    background: white;
    color: #2d7b7b;
    border: 2px solid #2d7b7b;
}

.btn-secondary:hover {
    background: #2d7b7b;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(45, 123, 123, 0.3);
}

@media (max-width: 968px) {
    .vm-grid {
        grid-template-columns: 1fr;
    }

    .values-grid {
        grid-template-columns: 1fr;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 300px;
    }

    .page-hero h1 {
        font-size: 2rem;
    }

    .about-hero,
    .content-section,
    .team-section,
    .cta-section {
        padding: 2.5rem 2rem;
    }
}
</style>
@endpush
@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <h1>Tentang Kami</h1>
    <p>Mengenal lebih dekat platform verifikasi sertifikasi halal terpercaya</p>
</section>
<div class="content-wrapper">
    <!-- Hero Section -->
    <div class="about-hero">
        <div class="hero-icon">🕌</div>
        <h2>Platform Cek Sertifikasi Halal Indonesia</h2>
        <p>Cek Halal adalah platform digital yang hadir untuk memudahkan masyarakat Indonesia dalam memverifikasi status sertifikasi halal produk. Kami berkomitmen memberikan informasi yang akurat, cepat, dan terpercaya untuk mendukung gaya hidup halal masyarakat muslim Indonesia.</p>
    </div>
    <!-- Vision & Mission -->
<div class="vm-grid">
    <div class="vm-card">
        <div class="vm-icon">🎯</div>
        <h3>Visi Kami</h3>
        <p>Menjadi platform terdepan dalam penyediaan informasi sertifikasi halal yang mudah diakses, akurat, dan terpercaya untuk seluruh masyarakat Indonesia.</p>
    </div>
    <div class="vm-card">
        <div class="vm-icon">🚀</div>
        <h3>Misi Kami</h3>
        <p>Memberikan layanan verifikasi halal yang cepat dan mudah, meningkatkan kesadaran masyarakat tentang pentingnya produk halal, serta mendukung implementasi UU Jaminan Produk Halal.</p>
    </div>
</div>

<!-- About Content -->
<div class="content-section">
    <h3>Tentang Platform Kami</h3>
    <p>Platform Cek Halal dikembangkan sebagai solusi digital untuk menjawab kebutuhan masyarakat dalam mengakses informasi sertifikasi halal produk dengan cepat dan mudah. Dengan database yang terintegrasi dengan sistem resmi BPJPH (Badan Penyelenggara Jaminan Produk Halal), kami memastikan setiap informasi yang disajikan adalah yang paling akurat dan terkini.</p>
    <p>Sejak diluncurkan, platform kami telah membantu ribuan pengguna dalam memverifikasi status halal produk yang mereka konsumsi sehari-hari. Kami terus berinovasi untuk memberikan fitur-fitur yang lebih baik dan pengalaman pengguna yang optimal.</p>
</div>

<!-- Features -->
<div class="content-section">
    <h3>Keunggulan Platform</h3>
    <ul>
        <li>Database terintegrasi langsung dengan sistem resmi BPJPH untuk akurasi data terjamin</li>
        <li>Fitur pencarian fleksibel dengan 4 metode: nama produk, produsen, nomor sertifikat, dan scan barcode</li>
        <li>Antarmuka yang user-friendly dan mudah digunakan oleh semua kalangan</li>
        <li>Informasi lengkap meliputi status sertifikasi, tanggal terbit, dan masa berlaku</li>
        <li>Update data secara berkala untuk memastikan informasi selalu terkini</li>
        <li>Akses gratis tanpa biaya apapun untuk seluruh masyarakat Indonesia</li>
        <li>Dapat diakses dari berbagai perangkat (desktop, tablet, smartphone)</li>
    </ul>
</div>

<!-- Values -->
<div class="content-section">
    <h3>Nilai-Nilai Kami</h3>
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">🔒</div>
            <h4>Kepercayaan</h4>
            <p>Kami berkomitmen menyajikan informasi yang akurat dan dapat dipercaya</p>
        </div>
        <div class="value-card">
            <div class="value-icon">⚡</div>
            <h4>Kecepatan</h4>
            <p>Memberikan layanan verifikasi yang cepat dan responsif</p>
        </div>
        <div class="value-card">
            <div class="value-icon">🤝</div>
            <h4>Integritas</h4>
            <p>Menjaga transparansi dan kejujuran dalam setiap layanan</p>
        </div>
        <div class="value-card">
            <div class="value-icon">💡</div>
            <h4>Inovasi</h4>
            <p>Terus berinovasi untuk pengalaman pengguna yang lebih baik</p>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="team-section">
    <h3>Tim Kami</h3>
    <p>Platform ini dikembangkan dan dikelola oleh tim profesional yang berdedikasi untuk memberikan layanan terbaik bagi masyarakat Indonesia</p>
    <div class="team-stats">
        <div class="stat-item">
            <div class="stat-number">10+</div>
            <div class="stat-label">Profesional Berpengalaman</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Dukungan Sistem</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ number_format($stats['total_produk']) }}+</div>
            <div class="stat-label">Produk Terdaftar</div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section">
    <h3>Mulai Gunakan Platform Kami</h3>
    <p>Verifikasi status halal produk Anda sekarang dengan mudah dan cepat</p>
    <div class="cta-buttons">
        <a href="{{ route('produk.index') }}" class="btn btn-primary">Cek Produk Sekarang</a>
        <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Hubungi Kami</a>
    </div>
</div>
</div>
@endsection