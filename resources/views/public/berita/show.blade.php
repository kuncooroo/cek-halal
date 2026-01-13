@extends('layouts.public')

@section('title', $berita->judul . ' - Cek Halal Indonesia')

@push('styles')
<style>
    .article-wrapper {
        max-width: 900px;
        margin: 3rem auto 5rem;
        padding: 0 2rem;
    }

    .breadcrumb {
        margin-bottom: 2rem;
        color: #666;
        font-size: 0.95rem;
    }

    .breadcrumb a {
        color: #2d7b7b;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .breadcrumb a:hover {
        color: #1e5555;
        text-decoration: underline;
    }

    .breadcrumb span {
        margin: 0 0.5rem;
    }

    .article-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .article-header {
        padding: 3rem 3rem 0;
    }

    .article-category {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .article-title {
        font-size: 2.8rem;
        color: #1a4444;
        margin-bottom: 1.5rem;
        line-height: 1.3;
        font-weight: 800;
    }

    .article-meta {
        display: flex;
        gap: 2rem;
        color: #999;
        font-size: 0.95rem;
        padding-bottom: 2rem;
        border-bottom: 3px solid #f0f0f0;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    .article-image {
        width: 100%;
        height: 450px;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10rem;
        background-size: cover;
        background-position: center;
    }

    .article-content {
        padding: 3rem;
        font-size: 1.1rem;
        line-height: 1.9;
        color: #444;
    }

    .article-content p {
        margin-bottom: 1.8rem;
    }

    .article-content h2 {
        color: #1a4444;
        margin-top: 2.5rem;
        margin-bottom: 1.2rem;
        font-weight: 700;
        font-size: 1.8rem;
    }

    .article-content h3 {
        color: #2d7b7b;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        font-size: 1.4rem;
    }

    .article-content ul, .article-content ol {
        margin-left: 2rem;
        margin-bottom: 1.8rem;
    }

    .article-content li {
        margin-bottom: 0.8rem;
    }

    .author-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2.5rem;
        border-radius: 15px;
        margin: 2rem 3rem;
        display: flex;
        gap: 2rem;
        align-items: center;
    }

    .author-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        flex-shrink: 0;
        overflow: hidden;
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .author-info h4 {
        color: #1a4444;
        margin-bottom: 0.5rem;
        font-size: 1.3rem;
        font-weight: 700;
    }

    .author-info p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .share-section {
        padding: 2.5rem 3rem;
        border-top: 3px solid #f0f0f0;
    }

    .share-title {
        color: #1a4444;
        margin-bottom: 1.2rem;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .share-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .share-btn {
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .share-btn.facebook {
        background: #1877f2;
        color: white;
    }

    .share-btn.twitter {
        background: #1da1f2;
        color: white;
    }

    .share-btn.whatsapp {
        background: #25d366;
        color: white;
    }

    /* Related News */
    .related-news {
        margin-top: 4rem;
    }

    .related-title {
        font-size: 2.2rem;
        color: #1a4444;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 800;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .related-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .related-image {
        width: 100%;
        height: 180px;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        background-size: cover;
        background-position: center;
    }

    .related-content {
        padding: 1.8rem;
    }

    .related-card h4 {
        color: #1a4444;
        margin-bottom: 1rem;
        font-size: 1.2rem;
        line-height: 1.4;
        font-weight: 700;
    }

    .related-date {
        color: #999;
        font-size: 0.85rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .article-title {
            font-size: 2rem;
        }

        .article-header,
        .article-content {
            padding: 2rem;
        }

        .article-image {
            height: 300px;
        }

        .author-box {
            flex-direction: column;
            text-align: center;
            padding: 2rem;
        }

        .share-buttons {
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="article-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('berita.index') }}">Berita</a>
        <span>/</span>
        <span>{{ Str::limit($berita->judul, 50) }}</span>
    </div>

    <!-- Article Card -->
    <article class="article-card">
        <div class="article-header">
            <span class="article-category">Berita</span>
            <h1 class="article-title">{{ $berita->judul }}</h1>
            <div class="article-meta">
                <div class="meta-item">
                    📅 {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d F Y') }}
                </div>
                @if($berita->penulis)
                <div class="meta-item">
                    ✍️ {{ $berita->penulis->nama }}
                </div>
                @endif
                <div class="meta-item">
                    👁️ {{ rand(100, 1000) }} views
                </div>
            </div>
        </div>

        @if($berita->thumbnail)
        <div class="article-image" style="background-image: url('{{ asset('storage/' . $berita->thumbnail) }}')"></div>
        @else
        <div class="article-image">📰</div>
        @endif

        <div class="article-content">
            {!! nl2br(e($berita->konten)) !!}
        </div>

        @if($berita->penulis)
        <!-- Author Box -->
        <div class="author-box">
            <div class="author-avatar">
                @if($berita->penulis->foto)
                    <img src="{{ asset('storage/' . $berita->penulis->foto) }}" alt="{{ $berita->penulis->nama }}">
                @else
                    ✍️
                @endif
            </div>
            <div class="author-info">
                <h4>{{ $berita->penulis->nama }}</h4>
                <p>{{ $berita->penulis->bio ?? 'Penulis di Cek Halal Indonesia. Berdedikasi untuk menyajikan informasi terkini seputar sertifikasi halal dan produk halal di Indonesia.' }}</p>
            </div>
        </div>
        @endif

        <!-- Share Section -->
        <div class="share-section">
            <div class="share-title">Bagikan Artikel:</div>
            <div class="share-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.show', $berita->slug)) }}" target="_blank" class="share-btn facebook">
                    <span>📘</span>
                    <span>Facebook</span>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.show', $berita->slug)) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="share-btn twitter">
                    <span>🐦</span>
                    <span>Twitter</span>
                </a>
                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . route('berita.show', $berita->slug)) }}" target="_blank" class="share-btn whatsapp">
                    <span>💬</span>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </article>

    @if($relatedBeritas->count() > 0)
    <!-- Related News -->
    <div class="related-news">
        <h2 class="related-title">Berita Terkait</h2>
        <div class="related-grid">
            @foreach($relatedBeritas as $related)
            <a href="{{ route('berita.show', $related->slug) }}" class="related-card">
                <div class="related-image" style="background-image: url('{{ $related->thumbnail ? asset('storage/' . $related->thumbnail) : '' }}')">
                    @if(!$related->thumbnail)
                        📰
                    @endif
                </div>
                <div class="related-content">
                    <h4>{{ $related->judul }}</h4>
                    <div class="related-date">
                        📅 {{ \Carbon\Carbon::parse($related->tanggal_publikasi)->format('d M Y') }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection