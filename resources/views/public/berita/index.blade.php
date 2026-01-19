@extends('layouts.public')

@section('title', 'Berita & Informasi - Sertifikasi Halal')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <div class="relative pt-32 pb-16 text-center overflow-hidden">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[radial-gradient(circle,rgba(30,136,229,0.05)_0%,transparent_70%)] -z-10 pointer-events-none rounded-full">
        </div>

        <div class="container px-5">

            <h1 class="text-3xl md:text-5xl font-extrabold text-navy mb-4 tracking-tight leading-tight">
                Berita & Artikel Halal
            </h1>

            <p class="text-lg text-gray-text max-w-2xl mx-auto leading-relaxed">
                Update terbaru seputar sertifikasi halal, regulasi, dan edukasi produk halal untuk masyarakat.
            </p>

            @if (request('search'))
                <div
                    class="mt-8 inline-block bg-white px-6 py-3 rounded-full shadow-lg shadow-black/5 border border-gray-100 animate-fade-in-up">
                    <p class="text-sm text-gray-text m-0 flex items-center gap-2">
                        <span>Menampilkan hasil: <strong class="text-navy">"{{ request('search') }}"</strong></span>
                        <span class="w-px h-4 bg-gray-200 mx-1"></span>
                        <a href="{{ route('berita.index') }}"
                            class="text-red-500 font-bold hover:underline text-xs flex items-center gap-1">
                            <i class="fa-solid fa-xmark"></i> Reset
                        </a>
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="pb-24 px-5">
        <div class="container">
            @if ($beritas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($beritas as $berita)
                        <div
                            class="group bg-white rounded-[20px] border border-gray-100 overflow-hidden flex flex-col h-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-blue-500/10 hover:border-blue-200">

                            <div class="relative w-full pt-[60%] bg-blue-50 overflow-hidden">
                                @php $img = $berita->thumbnail ?? $berita->gambar; @endphp

                                @if ($img)
                                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                                        style="background-image:url('{{ asset('storage/' . $img) }}')">
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center bg-blue-50 text-blue-200">
                                        <i class="fa-regular fa-image text-5xl"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="p-7 flex flex-col flex-grow">
                                <div
                                    class="flex items-center gap-3 text-xs font-bold text-gray-400 mb-4 uppercase tracking-wider">
                                    <span class="flex items-center gap-1.5 text-primary">
                                        <i class="fa-solid fa-user-pen"></i>
                                        {{ $berita->penulis->name ?? ($berita->penulis->nama ?? 'Admin Redaksi') }}
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                    <span>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') }}</span>
                                </div>

                                <h3
                                    class="text-xl font-extrabold text-navy mb-3 leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-300">
                                    {{ $berita->judul }}
                                </h3>

                                <div class="text-gray-text text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ Str::limit(strip_tags($berita->konten), 110) }}
                                </div>

                                <div class="mt-auto pt-5 border-t border-gray-50">
                                    <a href="{{ route('berita.show', $berita->slug) }}"
                                        class="inline-flex items-center gap-2 text-primary font-bold text-sm group/btn">
                                        Baca Selengkapnya
                                        <i
                                            class="fa-solid fa-arrow-right transition-transform duration-300 group-hover/btn:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-16 flex justify-center">
                    <div class="bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                        {{ $beritas->withQueryString()->links() }}
                    </div>
                </div>
            @else
                <div
                    class="text-center py-24 bg-white rounded-[24px] border border-dashed border-gray-200 max-w-2xl mx-auto shadow-sm">
                    <div
                        class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <i class="fa-regular fa-newspaper text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-2">Belum ada berita tersedia</h3>
                    <p class="text-gray-text text-lg">Silakan kembali lagi nanti untuk update terbaru.</p>

                    @if (request('search'))
                        <a href="{{ route('berita.index') }}"
                            class="inline-flex items-center gap-2 mt-6 text-primary font-bold hover:underline">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Semua Berita
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
