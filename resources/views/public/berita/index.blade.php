@extends('layouts.public')

@section('title', 'Berita & Informasi - Sertifikasi Halal')

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

        .content-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 5rem 3rem;
        }

        /* Featured News */
        .featured-news {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 4rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .featured-image {
            background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
            background-size: cover;
            background-position: center;
        }

        .featured-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .featured-badge {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, #ffd54f 0%, #ffb300 100%);
            color: #000;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            width: fit-content;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .featured-title {
            font-size: 2rem;
            color: #1a4444;
            margin-bottom: 1rem;
            line-height: 1.3;
            font-weight: 800;
        }

        .featured-excerpt {
            color: #666;
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .featured-meta {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .featured-btn {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: fit-content;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .featured-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(45, 123, 123, 0.3);
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 3rem;
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-box-inline {
            flex: 1;
        }

        .search-box-inline input {
            width: 100%;
            padding: 1rem 1.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .search-box-inline input:focus {
            outline: none;
            border-color: #2d7b7b;
            box-shadow: 0 0 0 3px rgba(45, 123, 123, 0.1);
        }

        /* News Grid */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .news-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            background-size: cover;
            background-position: center;
        }

        .news-content {
            padding: 2rem;
        }

        .news-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .news-title {
            font-size: 1.4rem;
            color: #1a4444;
            margin-bottom: 1rem;
            line-height: 1.4;
            font-weight: 700;
        }

        .news-excerpt {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #999;
            font-size: 0.9rem;
            padding-top: 1.2rem;
            border-top: 2px solid #f0f0f0;
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 500;
        }

        .read-more {
            color: #2d7b7b;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: gap 0.3s;
        }

        .read-more:hover {
            gap: 0.8rem;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.8rem 1.2rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-decoration: none;
            color: #666;
            background: white;
            font-weight: 600;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #2d7b7b;
            color: white;
            border-color: #2d7b7b;
        }

        .pagination .active {
            background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
            color: white;
            border-color: #2d7b7b;
        }

        .no-data {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .no-data-icon {
            font-size: 6rem;
            margin-bottom: 1.5rem;
        }

        .no-data h3 {
            color: #1a4444;
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .no-data p {
            color: #666;
            font-size: 1.1rem;
        }

        @media (max-width: 968px) {
            .news-grid {
                grid-template-columns: 1fr;
            }

            .featured-news {
                grid-template-columns: 1fr;
            }

            .featured-image {
                min-height: 300px;
            }

            .featured-title {
                font-size: 1.6rem;
            }

            . page-hero h1 {
                font-size: 2rem;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Page Hero -->
    <section class="page-hero">
        <h1>Berita & Informasi</h1>
        <p>Update terkini seputar sertifikasi halal dan produk halal di Indonesia</p>
    </section>
    <div class="content-section">
        @if ($featuredBerita)
            <!-- Featured News -->
            <a href="{{ route('berita.show', $featuredBerita->slug) }}" class="featured-news">
                <div class="featured-image"
                    style="background-image: url('{{ $featuredBerita->thumbnail ? asset('storage/' . $featuredBerita->thumbnail) : '' }}')">
                    @if (!$featuredBerita->thumbnail)
                        📰
                    @endif
                </div>
                <div class="featured-content">
                    <span class="featured-badge">⭐ BERITA UTAMA</span>
                    <h2 class="featured-title">{{ $featuredBerita->judul }}</h2>
                    <p class="featured-excerpt">{{ Str::limit(strip_tags($featuredBerita->konten), 200) }}</p>
                    <div class="featured-meta">
                        <span>📅 {{ \Carbon\Carbon::parse($featuredBerita->tanggal_publikasi)->format('d F Y') }}</span>
                        @if ($featuredBerita->penulis)
                            <span>✍️ {{ $featuredBerita->penulis->nama }}</span>
                        @endif
                    </div>
                    <span class="featured-btn">Baca Selengkapnya →</span>
                </div>
            </a>
        @endif
<!-- Filter Section -->
<div class="filter-section">
    <form action="{{ route('berita.index') }}" method="GET" class="search-box-inline">
        <input type="text" name="search" placeholder="🔍 Cari berita..." value="{{ request('search') }}">
    </form>
</div>

<!-- News Grid -->
@if($beritas->count() > 0)
    <div class="news-grid">
        @foreach($beritas as $berita)
        <a href="{{ route('berita.show', $berita->slug) }}" class="news-card">
            <div class="news-image" style="background-image: url('{{ $berita->thumbnail ? asset('storage/' . $berita->thumbnail) : '' }}')">
                @if(!$berita->thumbnail)
                    📰
                @endif
            </div>
            <div class="news-content">
                <span class="news-category">Berita</span>
                <h3 class="news-title">{{ $berita->judul }}</h3>
                <p class="news-excerpt">{{ Str::limit(strip_tags($berita->konten), 150) }}</p>
                <div class="news-meta">
                    <div class="news-date">
                        📅 {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') }}
                    </div>
                    <span class="read-more">Baca →</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        {{ $beritas->links() }}
    </div>
@else
    <div class="no-data">
        <div class="no-data-icon">📭</div>
        <h3>Belum Ada Berita</h3>
        <p>Berita akan segera ditambahkan. Silakan kembali lagi nanti.</p>
    </div>
@endif
</div>
@endsection