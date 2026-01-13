@extends('layouts.public')

@section('title', 'Cek Produk - Sertifikasi Halal')

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
        max-width: 1000px;
        margin: -3rem auto 5rem;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Search Box */
    .search-box {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        margin-bottom: 2rem;
    }

    .search-tabs {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 2.5rem;
    }

    .tab-btn {
        padding: 1rem;
        background: #f8f9fa;
        border: 2px solid transparent;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 600;
        color: #666;
        border-radius: 10px;
        transition: all 0.3s;
        text-align: center;
    }

    .tab-btn:hover {
        background: #e9ecef;
        color: #2d7b7b;
    }

    .tab-btn.active {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        border-color: #2d7b7b;
    }

    .search-content {
        display: none;
    }

    .search-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.8rem;
        color: #1a4444;
        font-weight: 600;
        font-size: 1rem;
    }

    .form-group input {
        width: 100%;
        padding: 1.2rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: 'Poppins', sans-serif;
    }

    .form-group input:focus {
        outline: none;
        border-color: #2d7b7b;
        box-shadow: 0 0 0 3px rgba(45, 123, 123, 0.1);
    }

    .search-btn {
        width: 100%;
        padding: 1.2rem;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(45, 123, 123, 0.3);
    }

    .search-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Scanner Area */
    .scanner-area {
        border: 3px dashed #2d7b7b;
        border-radius: 15px;
        padding: 3rem;
        text-align: center;
        background: #f0f9f9;
        margin-bottom: 2rem;
    }

    .scanner-icon {
        font-size: 5rem;
        margin-bottom: 1rem;
    }

    .scanner-area h3 {
        color: #1a4444;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .scanner-area p {
        color: #666;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .scanner-btn {
        padding: 1rem 2.5rem;
        background: #2d7b7b;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .scanner-btn:hover {
        background: #1e5555;
        transform: translateY(-2px);
    }

    /* Result Box */
    .result-box {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        display: none;
        margin-top: 2rem;
    }

    .result-box.show {
        display: block;
        animation: fadeInUp 0.5s ease;
    }

    .result-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding-bottom: 2rem;
        border-bottom: 3px solid #f0f0f0;
        margin-bottom: 2rem;
    }

    .result-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        flex-shrink: 0;
    }

    .result-icon.expired {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
    }

    .result-status h2 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        font-weight: 800;
    }

    .badge {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge.halal {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .badge.expired {
        background: #fff3e0;
        color: #e65100;
    }

    .badge.not-found {
        background: #ffebee;
        color: #c62828;
    }

    .result-details {
        display: grid;
        gap: 1rem;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        padding: 1.2rem;
        background: #f8f9fa;
        border-radius: 10px;
        gap: 2rem;
        align-items: center;
    }

    .detail-label {
        font-weight: 700;
        color: #1a4444;
    }

    .detail-value {
        color: #555;
        font-weight: 500;
    }

    .no-result {
        text-align: center;
        padding: 4rem 2rem;
    }

    .no-result-icon {
        font-size: 6rem;
        margin-bottom: 1.5rem;
    }

    .no-result h3 {
        color: #c62828;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .no-result p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .loading {
        text-align: center;
        padding: 3rem;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #2d7b7b;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 0 auto 1rem;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 968px) {
        .search-tabs {
            grid-template-columns: repeat(2, 1fr);
        }

        .detail-row {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .page-hero h1 {
            font-size: 2rem;
        }

        .search-box {
            padding: 2rem;
        }
    }

    @media (max-width: 576px) {
        .search-tabs {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <h1>Cek Sertifikasi Halal Produk</h1>
    <p>Verifikasi status sertifikasi halal produk dengan mudah, cepat, dan akurat</p>
</section>

<div class="content-wrapper">
    <!-- Search Box -->
    <div class="search-box">
        <div class="search-tabs">
            <button class="tab-btn active" data-tab="nama_produk">
                📦 Nama Produk
            </button>
            <button class="tab-btn" data-tab="nama_produsen">
                🏢 Produsen
            </button>
            <button class="tab-btn" data-tab="nomor_sertifikat">
                📄 No. Sertifikat
            </button>
            <button class="tab-btn" data-tab="barcode">
                📱 Scan Barcode
            </button>
        </div>

        <!-- Nama Produk -->
        <div id="nama_produk" class="search-content active">
            <form class="search-form" data-type="nama_produk">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="search_value" placeholder="Contoh: Indomie Goreng Original" required>
                </div>
                <button type="submit" class="search-btn">
                    <span>🔍</span>
                    <span>Cari Produk</span>
                </button>
            </form>
        </div>

        <!-- Nama Produsen -->
        <div id="nama_produsen" class="search-content">
            <form class="search-form" data-type="nama_produsen">
                <div class="form-group">
                    <label>Nama Produsen</label>
                    <input type="text" name="search_value" placeholder="Contoh: PT Indofood CBP Sukses Makmur" required>
                </div>
                <button type="submit" class="search-btn">
                    <span>🔍</span>
                    <span>Cari Produsen</span>
                </button>
            </form>
        </div>

        <!-- Nomor Sertifikat -->
        <div id="nomor_sertifikat" class="search-content">
            <form class="search-form" data-type="nomor_sertifikat">
                <div class="form-group">
                    <label>Nomor Sertifikat Halal</label>
                    <input type="text" name="search_value" placeholder="Contoh: 00110071851022" required>
                </div>
                <button type="submit" class="search-btn">
                    <span>🔍</span>
                    <span>Cari Sertifikat</span>
                </button>
            </form>
        </div>

        <!-- Scan Barcode -->
        <div id="barcode" class="search-content">
            <div class="scanner-area">
                <div class="scanner-icon">📷</div>
                <h3>Scan Barcode Produk</h3>
                <p>Arahkan kamera smartphone Anda ke barcode produk untuk memindai</p>
                <button type="button" class="scanner-btn" onclick="startScanner()">
                    Mulai Scan Barcode
                </button>
            </div>
            <form class="search-form" data-type="barcode">
                <div class="form-group">
                    <label>Atau Masukkan Kode Barcode Manual</label>
                    <input type="text" name="search_value" placeholder="Contoh: 8992388102012">
                </div>
                <button type="submit" class="search-btn">
                    <span>🔍</span>
                    <span>Cari Barcode</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Result Box -->
    <div id="resultBox" class="result-box">
        <!-- Result akan muncul di sini -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.search-content').forEach(c => c.classList.remove('active'));
            
            this.classList.add('active');
            document.getElementById(tabName).classList.add('active');
            
            document.getElementById('resultBox').classList.remove('show');
        });
    });

    // Handle all search forms
    document.querySelectorAll('.search-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const searchType = this.getAttribute('data-type');
            const searchValue = this.querySelector('input[name="search_value"]').value;
            
            if (!searchValue) {
                alert('Silakan masukkan kata kunci pencarian');
                return;
            }
            
            searchProduct(searchType, searchValue);
        });
    });

    function searchProduct(searchType, searchValue) {
        const resultBox = document.getElementById('resultBox');
        
        resultBox.innerHTML = `
            <div class="loading">
                <div class="spinner"></div>
                <p style="color: #666; font-size: 1.1rem;">Mencari produk...</p>
            </div>
        `;
        resultBox.classList.add('show');
        resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        fetch('{{ route("produk.search") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                search_type: searchType,
                search_value: searchValue
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.found) {
                showResult(data.data);
            } else {
                showNotFound(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            resultBox.innerHTML = `
                <div class="no-result">
                    <div class="no-result-icon">⚠️</div>
                    <h3>Terjadi Kesalahan</h3>
                    <p>Maaf, terjadi kesalahan saat mencari produk. Silakan coba lagi.</p>
                </div>
            `;
        });
    }

    function showResult(data) {
        const resultBox = document.getElementById('resultBox');
        const statusBadge = data.is_expired 
            ? '<span class="badge expired">⚠️ SERTIFIKAT KADALUARSA</span>'
            : '<span class="badge halal">✓ HALAL BERSERTIFIKAT</span>';
        
        const iconClass = data.is_expired ? 'expired' : '';
        const statusTitle = data.is_expired ? 'Sertifikat Kadaluarsa' : 'Produk Terdaftar';
        
        resultBox.innerHTML = `
            <div class="result-header">
                <div class="result-icon ${iconClass}">
                    ${data.is_expired ? '⚠️' : '✓'}
                </div>
                <div class="result-status">
                    <h2>${statusTitle}</h2>
                    ${statusBadge}
                </div>
            </div>
            <div class="result-details">
                <div class="detail-row">
                    <div class="detail-label">Nama Produk</div>
                    <div class="detail-value">${data.nama_produk}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nama Produsen</div>
                    <div class="detail-value">${data.nama_produsen}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nomor Sertifikat</div>
                    <div class="detail-value">${data.nomor_sertifikat}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal Terbit</div>
                    <div class="detail-value">${data.tanggal_terbit}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal Kadaluarsa</div>
                    <div class="detail-value">${data.tanggal_kadaluarsa}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Status Sertifikat</div>
                    <div class="detail-value">${data.status_sertifikat}</div>
                </div>
                ${data.kategori !== '-' ? `
                <div class="detail-row">
                    <div class="detail-label">Kategori</div>
                    <div class="detail-value">${data.kategori}</div>
                </div>
                ` : ''}
            </div>
        `;
    }

    function showNotFound(message) {
        const resultBox = document.getElementById('resultBox');
        resultBox.innerHTML = `
            <div class="no-result">
                <div class="no-result-icon">❌</div>
                <h3>Produk Tidak Ditemukan</h3>
                <p>${message || 'Produk yang Anda cari tidak terdaftar dalam database sertifikasi halal.'}</p>
                <p style="margin-top: 1rem; color: #999;">Silakan periksa kembali informasi yang Anda masukkan atau hubungi produsen untuk informasi lebih lanjut.</p>
            </div>
        `;
    }

    function startScanner() {
        alert('Fitur scan barcode memerlukan integrasi dengan library barcode scanner.\n\nUntuk sementara, silakan masukkan barcode secara manual di form di bawah.');
    }
</script>
@endpush