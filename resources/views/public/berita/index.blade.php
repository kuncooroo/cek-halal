@extends('layouts.public')

@section('title', 'Berita & Informasi - Sertifikasi Halal')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --bg-light: #f4f7f6;
        }

        /* Hero Section Sesuai Foto */
        .page-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1534723452862-4c874018d66d?q=80&w=2070');
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

        .content-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        /* News Grid Sesuai Foto */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            width: 100%;
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .news-content {
            padding: 2rem;
            flex-grow: 1;
        }

        .news-title {
            font-size: 1.25rem;
            color: #1a202c;
            margin-bottom: 1rem;
            font-weight: 800;
            line-height: 1.4;
        }

        .news-excerpt {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Bottom Card Meta */
        .news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .btn-selengkapnya {
            background: var(--primary-green);
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-selengkapnya:hover {
            background: var(--secondary-green);
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #4a5568;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .news-author i {
            font-size: 1.1rem;
        }

        /* Pagination Styling */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 4rem;
        }

        @media (max-width: 992px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
            }

            .page-hero h1 {
                font-size: 2.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero">
        <h1>Berita</h1>
    </section>

    <div class="content-section">
        @if($beritas->count() > 0)
            <div class="news-grid">
                @foreach($beritas as $berita)
                    <div class="news-card">
                        <div class="news-image"
                            style="background-image: url('{{ $berita->thumbnail ? asset('storage/' . $berita->thumbnail) : 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2070' }}')">
                        </div>

                        <div class="news-content">
                            <h3 class="news-title">{{ $berita->judul }}</h3>
                            <p class="news-excerpt">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>

                            <div class="news-footer">
                                <a href="{{ route('berita.show', $berita->slug) }}" class="btn-selengkapnya">Selengkapnya</a>
                                <div class="news-author">
                                    <i class="fi fi-rr-user-md"></i> <span>{{ $berita->penulis->nama ?? 'Admin' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $beritas->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 5rem 0;">
                <h3 style="color: #ccc;">Belum ada berita tersedia.</h3>
            </div>
        @endif
    </div>
@endsection