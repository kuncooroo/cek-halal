@extends('layouts.public')

@section('title', $berita->judul ?? 'Detail Berita - Cek Halal Indonesia')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .article-content h2 { font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 2rem; margin-bottom: 1rem; }
        .article-content h3 { font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .article-content p { margin-bottom: 1.25rem; line-height: 1.8; color: #334155; }
        .article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.25rem; color: #334155; }
        .article-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.25rem; color: #334155; }
        .article-content blockquote { border-left: 4px solid #ffc107; background-color: #fffbeb; padding: 1rem 1.5rem; margin: 1.5rem 0; font-style: italic; border-radius: 0 0.5rem 0.5rem 0; }
        .article-content img { border-radius: 0.75rem; max-width: 100%; height: auto; margin: 1.5rem 0; }
        .article-content a { color: #1e88e5; text-decoration: underline; font-weight: 500; }
    </style>
@endpush

@section('content')

    <div class="container px-5 pt-[120px] pb-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-[2.5fr_1fr] gap-10">
            
            <div>
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-primary font-bold text-sm mb-6 hover:underline transition-all">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
                </a>

                <article class="bg-white rounded-[24px] border border-gray-100 p-6 md:p-10 shadow-sm">
                    <header class="mb-8">
                        <span class="inline-block py-1.5 px-3 rounded-lg bg-blue-50 text-primary text-xs font-bold uppercase tracking-wider mb-4">
                            {{ $berita->kategori->nama ?? 'Info Terkini' }}
                        </span>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-navy leading-tight mb-6">
                            {{ $berita->judul }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-sm text-gray-400 border-b border-gray-100 pb-6">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-primary"></i>
                                <span>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-user text-primary"></i>
                                <span>{{ $berita->penulis->name ?? ($berita->penulis->nama ?? 'Admin Redaksi') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-clock text-primary"></i>
                                @php
                                    $wordCount = str_word_count(strip_tags($berita->konten));
                                    $minutesToRead = ceil($wordCount / 200);
                                @endphp
                                <span>{{ $minutesToRead }} Menit Baca</span>
                            </div>
                        </div>
                    </header>

                    <div class="w-full aspect-video bg-gray-100 rounded-xl overflow-hidden mb-8">
                        @php
                            $mainImage = $berita->gambar ?? $berita->thumbnail;
                        @endphp
                        @if ($mainImage)
                            <img src="{{ asset('storage/' . $mainImage) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <i class="fa-regular fa-image text-5xl"></i>
                            </div>
                        @endif
                    </div>

                    <div class="article-content text-lg">
                        {!! $berita->konten !!}
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-100">
                        <span class="block text-sm font-bold text-navy mb-4">Bagikan artikel ini:</span>
                        <div class="flex gap-3">
                            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" target="_blank" 
                               class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-[#25D366] hover:-translate-y-1 transition-transform shadow-md hover:shadow-lg">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                               class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-[#1877F2] hover:-translate-y-1 transition-transform shadow-md hover:shadow-lg">
                                <i class="fa-brands fa-facebook-f text-lg"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}" target="_blank"
                               class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-black hover:-translate-y-1 transition-transform shadow-md hover:shadow-lg">
                                <i class="fa-brands fa-x-twitter text-lg"></i>
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link disalin!');" 
                                class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-gray-400 hover:-translate-y-1 transition-transform shadow-md hover:shadow-lg" title="Salin Link">
                                <i class="fa-solid fa-link text-lg"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <aside class="lg:sticky lg:top-[100px] h-fit">
                <div class="bg-white rounded-[24px] border border-gray-100 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-navy mb-5 pb-3 border-b border-gray-100">
                        Berita Lainnya
                    </h3>

                    <div class="flex flex-col gap-5">
                        @forelse($relatedBeritas as $related)
                            <div class="flex gap-4 group">
                                <a href="{{ route('berita.show', $related->slug) }}" class="shrink-0 overflow-hidden rounded-xl w-[70px] h-[70px]">
                                    @php $relatedImg = $related->thumbnail ?? $related->gambar; @endphp
                                    @if ($relatedImg)
                                        <img src="{{ asset('storage/' . $relatedImg) }}" alt="{{ $related->judul }}" 
                                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                            <i class="fa-regular fa-image"></i>
                                        </div>
                                    @endif
                                </a>

                                <div>
                                    <h5 class="font-bold text-sm text-navy leading-snug mb-1 line-clamp-2">
                                        <a href="{{ route('berita.show', $related->slug) }}" class="hover:text-primary transition-colors">
                                            {{ $related->judul }}
                                        </a>
                                    </h5>
                                    <span class="text-xs text-gray-400">
                                        {{ \Carbon\Carbon::parse($related->tanggal_publikasi)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-400 text-center py-4">Tidak ada berita terkait lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const articleImages = document.querySelectorAll('.article-content img');
            articleImages.forEach(img => {
                img.classList.add('h-auto', 'max-w-full', 'rounded-xl');
            });
        });
    </script>
@endpush