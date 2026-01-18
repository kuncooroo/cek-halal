@extends('layouts.public')

@section('title', 'Cek Produk - Sertifikasi Halal')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --dark-green: #1a4444;
            --accent-yellow: #f6e05e;
            --text-gray: #718096;
        }

        .page-hero {
            background: linear-gradient(rgba(26, 68, 68, 0.9), rgba(26, 68, 68, 0.9)),
                url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070');
            background-size: cover;
            padding: 5rem 3rem 4rem;
            text-align: center;
            color: white;
        }

        .page-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .content-wrapper {
            max-width: 1000px;
            margin: -4rem auto 5rem;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Search Box Container */
        .search-box {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
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
            background: #f1f5f9;
            border: none;
            cursor: pointer;
            font-weight: 700;
            color: var(--text-gray);
            border-radius: 12px;
            transition: 0.3s;
        }

        .tab-btn.active {
            background: var(--dark-green);
            color: white;
        }

        .search-content {
            display: none;
        }

        .search-content.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            color: var(--dark-green);
            font-weight: 700;
        }

        .form-group input {
            width: 100%;
            padding: 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(45, 138, 106, 0.1);
        }

        .search-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 1.5rem;
        }

        .search-btn:hover {
            background: var(--dark-green);
            transform: translateY(-2px);
        }

        /* Result Card Styles */
        .result-box {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
            border-bottom: 2px solid #f1f5f9;
            margin-bottom: 2rem;
        }

        .result-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: var(--primary-green);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .result-icon.expired {
            background: #e53e3e;
        }

        .badge {
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .badge.halal {
            background: #dcfce7;
            color: #166534;
        }

        .badge.expired {
            background: #fee2e2;
            color: #991b1b;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .detail-label {
            font-weight: 700;
            color: var(--dark-green);
        }

        .loading {
            text-align: center;
            padding: 2rem;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-green);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .search-tabs {
                grid-template-columns: 1fr 1fr;
            }

            .detail-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero">
        <h1>Cek Sertifikasi Halal</h1>
        <p>Verifikasi status kehalalan produk secara real-time melalui database BPJPH.</p>
    </section>

    <div class="content-wrapper">
        <div class="search-box">
            <div class="search-tabs">
                <button class="tab-btn active" data-tab="nama_produk">📦 Produk</button>
                <button class="tab-btn" data-tab="nama_produsen">🏢 Produsen</button>
                <button class="tab-btn" data-tab="nomor_sertifikat">📄 Sertifikat</button>
                <button class="tab-btn" data-tab="barcode">📱 Barcode</button>
            </div>

            <div id="nama_produk" class="search-content active">
                <form class="search-form" data-type="nama_produk">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="search_value" value="{{ $old_q ?? '' }}" placeholder="Contoh: Mie Instan">
                    </div>
                    <button type="submit" class="search-btn">🔍 Cari Data</button>
                </form>
            </div>

            <div id="nama_produsen" class="search-content">
                <form class="search-form" data-type="nama_produsen">
                    <div class="form-group">
                        <label>Nama Perusahaan / Produsen</label>
                        <input type="text" name="search_value" value="{{ $old_produsen ?? '' }}"
                            placeholder="Contoh: PT Indofood">
                    </div>
                    <button type="submit" class="search-btn">🔍 Cari Produsen</button>
                </form>
            </div>

            <div id="nomor_sertifikat" class="search-content">
                <form class="search-form" data-type="nomor_sertifikat">
                    <div class="form-group">
                        <label>Nomor Sertifikat Halal</label>
                        <input type="text" name="search_value" value="{{ $old_no ?? '' }}" placeholder="Contoh: 1770130...">
                    </div>
                    <button type="submit" class="search-btn">🔍 Cek Sertifikat</button>
                </form>
            </div>

            <div id="barcode" class="search-content">
                <form class="search-form" data-type="barcode">
                    <div class="form-group">
                        <label>Kode Barcode / EAN</label>
                        <input type="text" name="search_value" placeholder="Contoh: 899...">
                    </div>
                    <button type="submit" class="search-btn">🔍 Cari Barcode</button>
                </form>
            </div>
        </div>

        <div id="resultBox" class="result-box"></div>
    </div>
@endsection

@push('scripts')
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // 1. Tab Switching Logic
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const tabName = this.getAttribute('data-tab');
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.search-content').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                document.getElementById(tabName).classList.add('active');
            });
        });

        // 2. Autofill & Auto-search from Home
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const q = urlParams.get('q');
            const produsen = urlParams.get('produsen');
            const no = urlParams.get('no');

            if (q) {
                searchProduct('nama_produk', q);
            } else if (produsen) {
                switchTab('nama_produsen');
                searchProduct('nama_produsen', produsen);
            } else if (no) {
                switchTab('nomor_sertifikat');
                searchProduct('nomor_sertifikat', no);
            }
        });

        function switchTab(tabName) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.search-content').forEach(c => c.classList.remove('active'));
            document.querySelector(`.tab-btn[data-tab="${tabName}"]`).classList.add('active');
            document.getElementById(tabName).classList.add('active');
        }

        // 3. Search Handler
        document.querySelectorAll('.search-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const type = this.getAttribute('data-type');
                const val = this.querySelector('input').value;
                if (val) searchProduct(type, val);
            });
        });

        function searchProduct(type, val) {
            const box = document.getElementById('resultBox');
            box.innerHTML = `<div class="loading"><div class="spinner"></div><p>Menghubungi database...</p></div>`;
            box.classList.add('show');
            box.scrollIntoView({ behavior: 'smooth', block: 'center' });

            fetch('{{ route("produk.search") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ search_type: type, search_value: val })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.found) {
                        renderData(data.data);
                    } else {
                        box.innerHTML = `<div style="text-align:center; padding:2rem"><h3>❌ Tidak Ditemukan</h3><p>${data.message}</p></div>`;
                    }
                });
        }

        function renderData(d) {
            const box = document.getElementById('resultBox');
            const badge = d.is_expired ? '<span class="badge expired">KADALUARSA</span>' : '<span class="badge halal">AKTIF / HALAL</span>';

            box.innerHTML = `
                <div class="result-header">
                    <div class="result-icon ${d.is_expired ? 'expired' : ''}">${d.is_expired ? '⚠️' : '✓'}</div>
                    <div><h2>${d.nama_produk}</h2>${badge}</div>
                </div>
                <div class="result-details">
                    <div class="detail-row"><div class="detail-label">Produsen</div><div class="detail-value">${d.nama_produsen}</div></div>
                    <div class="detail-row"><div class="detail-label">Nomor Sertifikat</div><div class="detail-value">${d.nomor_sertifikat}</div></div>
                    <div class="detail-row"><div class="detail-label">Masa Berlaku</div><div class="detail-value">${d.tanggal_kadaluarsa}</div></div>
                    <div class="detail-row"><div class="detail-label">Kategori</div><div class="detail-value">${d.kategori}</div></div>
                </div>
            `;
        }
    </script>
@endpush