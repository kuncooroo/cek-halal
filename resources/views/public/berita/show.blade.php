@extends('layouts.public')

@section('title', $berita->judul . ' - Cek Halal Indonesia')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --dark-green: #1a4444;
            --text-gray: #718096;
        }

        .article-wrapper {
            max-width: 900px;
            margin: 3rem auto 5rem;
            padding: 0 1.5rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 2rem;
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
        }

        .breadcrumb span {
            margin: 0 0.5rem;
            color: #cbd5e0;
        }

        /* Article Card */
        .article-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.05);
            border: 1px solid #edf2f7;
        }

        .article-header {
            padding: 3rem 3rem 1.5rem;
        }

        .article-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: #e6fffa;
            color: var(--primary-green);
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .article-title {
            font-size: 2.5rem;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            line-height: 1.3;
            font-weight: 800;
        }

        .article-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--text-gray);
            font-size: 0.9rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #edf2f7;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-item i {
            color: var(--primary-green);
        }

        .article-image {
            width: 100%;
            height: 500px;
            background-size: cover;
            background-position: center;
            background-color: #f7fafc;
        }

        .article-content {
            padding: 3rem;
            font-size: 1.15rem;
            line-height: 1.8;
            color: #2d3748;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        /* Author Box */
        .author-box {
            background: #f8faf9;
            padding: 2rem;
            border-radius: 15px;
            margin: 0 3rem 3rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            border: 1px solid #edf2f7;
        }

        .author-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: var(--primary-green);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            color: var(--dark-green);
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .author-info p {
            color: var(--text-gray);
            font-size: 0.9rem;
            margin: 0;
        }

        /* Share Section */
        .share-section {
            padding: 2rem 3rem;
            background: #ffffff;
            border-top: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .share-buttons {
            display: flex;
            gap: 0.8rem;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        .facebook {
            background: #3b5998;
        }

        .twitter {
            background: #1da1f2;
        }

        .whatsapp {
            background: #25d366;
        }

        /* Related News */
        .related-news {
            margin-top: 4rem;
        }

        .related-title {
            font-size: 1.8rem;
            color: var(--dark-green);
            margin-bottom: 2rem;
            font-weight: 800;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .related-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .related-card:hover {
            transform: translateY(-5px);
        }

        .related-img {
            height: 150px;
            background-size: cover;
            background-position: center;
        }

        .related-info {
            padding: 1.2rem;
        }

        .related-info h4 {
            font-size: 1rem;
            color: var(--dark-green);
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .article-title {
                font-size: 1.8rem;
            }

            .article-header,
            .article-content,
            .share-section {
                padding: 1.5rem;
            }

            .author-box {
                margin: 1.5rem;
                flex-direction: column;
                text-align: center;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .article-image {
                height: 300px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="article-wrapper">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}">Berita</a>
            <span>/</span>
            <span style="color: var(--text-gray)">Detail Berita</span>
        </div>

        <article class="article-card">
            <div class="article-header">
                <span class="article-category">Informasi Halal</span>
                <h1 class="article-title">{{ $berita->judul }}</h1>

                <div class="article-meta">
                    <div class="meta-item">
                        <i class="fi fi-rr-calendar"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fi fi-rr-user"></i>
                        <span>{{ $berita->penulis->nama ?? 'Admin' }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fi fi-rr-eye"></i>
                        <span>{{ rand(120, 500) }} Dilihat</span>
                    </div>
                </div>
            </div>

            <div class="article-image"
                style="background-image: url('{{ $berita->thumbnail ? asset('storage/' . $berita->thumbnail) : 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2070' }}')">
            </div>

            <div class="article-content">
                {!! nl2br(e($berita->konten)) !!}
            </div>

            @if($berita->penulis)
                <div class="author-box">
                    <div class="author-avatar">
                        @if($berita->penulis->foto)
                            <img src="{{ asset('storage/' . $berita->penulis->foto) }}" alt="{{ $berita->penulis->nama }}">
                        @else
                            <i class="fi fi-rr-user-md"></i>
                        @endif
                    </div>
                    <div class="author-info">
                        <h4>{{ $berita->penulis->nama }}</h4>
                        <p>{{ $berita->penulis->bio ?? 'Kontributor aktif Cek Halal Indonesia yang fokus pada edukasi produk halal.' }}
                        </p>
                    </div>
                </div>
            @endif

            <div class="share-section">
                <span style="font-weight: 700; color: var(--dark-green)">Bagikan :</span>
                <div class="share-buttons">
                    <a href="#" class="share-btn facebook"><i class="fi fi-brands-facebook"></i></a>
                    <a href="#" class="share-btn twitter"><i class="fi fi-brands-twitter"></i></a>
                    <a href="#" class="share-btn whatsapp"><i class="fi fi-brands-whatsapp"></i></a>
                </div>
            </div>
        </article>

        @if($relatedBeritas->count() > 0)
            <div class="related-news">
                <h2 class="related-title">Berita Terkait</h2>
                <div class="related-grid">
                    @foreach($relatedBeritas as $related)
                        <a href="{{ route('berita.show', $related->slug) }}" class="related-card">
                            <div class="related-img"
                                style="background-image: url('{{ $related->thumbnail ? asset('storage/' . $related->thumbnail) : 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2070' }}')">
                            </div>
                            <div class="related-info">
                                <h4>{{ Str::limit($related->judul, 50) }}</h4>
                                <span style="font-size: 0.8rem; color: var(--text-gray)">
                                    <i class="fi fi-rr-calendar" style="margin-right: 5px"></i>
                                    {{ \Carbon\Carbon::parse($related->tanggal_publikasi)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection