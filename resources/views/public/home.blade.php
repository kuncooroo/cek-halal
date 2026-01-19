@extends('layouts.public')

@section('title', 'Cek Halal Indonesia - Platform Verifikasi Sertifikasi Halal')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <section
        class="relative min-h-[calc(100vh-80px)] flex items-center pt-10 pb-16 px-5 lg:px-0 bg-[radial-gradient(circle_at_top_right,#eef7ff_0%,#ffffff_60%)] overflow-hidden">

        <div class="container flex flex-col-reverse lg:flex-row items-center justify-between gap-10">

            <div class="flex-1 max-w-2xl z-10 text-center lg:text-left">
                <h1 class="text-4xl md:text-[3.5rem] font-extrabold leading-[1.2] mb-6 text-navy">
                    Solusi Halal di <span class="text-primary relative">Setiap Tahap</span> Kehidupan.
                </h1>
                <p class="text-lg text-gray-text leading-relaxed mb-10">
                    Platform verifikasi sertifikasi halal generasi terbaru. Memberikan kepastian hukum dan ketenangan batin
                    bagi konsumen cerdas di seluruh Indonesia.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-6">
                    <a href="{{ route('produk.index') }}"
                        class="inline-flex items-center gap-3 bg-primary text-white px-9 py-4 rounded-full font-bold shadow-lg hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300">
                        Cek Produk <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <a href="#"
                        class="group flex items-center gap-3 text-navy font-bold hover:text-primary transition-colors">
                        <span
                            class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md text-primary group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-play"></i>
                        </span>
                        Lihat Video
                    </a>
                </div>

                <div class="mt-10 flex items-center justify-center lg:justify-start gap-4">
                    <div class="flex -space-x-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg"
                            class="w-10 h-10 rounded-full border-[3px] border-white">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg"
                            class="w-10 h-10 rounded-full border-[3px] border-white">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg"
                            class="w-10 h-10 rounded-full border-[3px] border-white">
                    </div>
                    <div class="text-left">
                        <h5 class="m-0 font-extrabold text-base text-navy">2.5 Juta+</h5>
                        <span class="text-xs text-gray-text">Produk Terdaftar</span>
                    </div>
                </div>
            </div>

            <div class="flex-1 justify-end relative w-full lg:w-auto hidden lg:flex">
                <img src="{{ asset('images/logohalal.png') }}" alt="Halal Indonesia"
                    class="max-w-full h-auto max-h-[550px] rounded-br-[100px] rounded-bl-[100px] [mask-image:linear-gradient(to_bottom,black_85%,transparent_100%)]">
            </div>
        </div>
    </section>

    <div class="bg-white border-b border-gray-100 py-8">
        <div class="container flex flex-wrap justify-center gap-8 md:gap-16">
            @foreach (['BPJPH', 'LPPOM', 'MUI', 'KEMENAG', 'KOMINFO'] as $stat)
                <div class="group cursor-default">
                    <h4
                        class="text-2xl font-extrabold text-slate-300 group-hover:text-primary transition-colors duration-300">
                        {{ $stat }}
                    </h4>
                </div>
            @endforeach
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="container">
            <div class="mb-12 text-center lg:text-left">
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy mb-4">Layanan <span
                        class="text-primary">Unggulan</span></h2>
                <p class="text-gray-text max-w-lg mx-auto lg:mx-0">Akses data sertifikasi halal dengan berbagai metode
                    pencarian tercanggih.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-pastel-blue p-8 rounded-3xl transition-transform duration-300 hover:-translate-y-2 flex flex-col justify-between min-h-[260px]">
                    <div>
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-500 text-xl shadow-sm mb-5">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <h4 class="font-bold text-xl text-navy mb-3">Pencarian Pintar</h4>
                        <p class="text-gray-text text-sm leading-relaxed">Cari berdasarkan nama produk, merek, atau nomor
                            sertifikat secara instan.</p>
                    </div>
                </div>

                <div
                    class="bg-pastel-pink p-8 rounded-3xl transition-transform duration-300 hover:-translate-y-2 flex flex-col justify-between min-h-[260px]">
                    <div>
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-pink-500 text-xl shadow-sm mb-5">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <h4 class="font-bold text-xl text-navy mb-3">Scan Barcode</h4>
                        <p class="text-gray-text text-sm leading-relaxed">Scan barcode kemasan produk untuk validasi status
                            halal real-time.</p>
                    </div>
                </div>

                <div
                    class="bg-pastel-purple p-8 rounded-3xl transition-transform duration-300 hover:-translate-y-2 flex flex-col justify-between min-h-[260px]">
                    <div>
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-purple-500 text-xl shadow-sm mb-5">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <h4 class="font-bold text-xl text-navy mb-3">Cek Produsen</h4>
                        <p class="text-gray-text text-sm leading-relaxed">Lihat profil perusahaan dan daftar seluruh produk
                            yang mereka miliki.</p>
                    </div>
                </div>

                <div
                    class="bg-pastel-orange p-8 rounded-3xl transition-transform duration-300 hover:-translate-y-2 flex flex-col justify-between min-h-[260px]">
                    <div>
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-orange-500 text-xl shadow-sm mb-5">
                            <i class="fa-solid fa-book-quran"></i>
                        </div>
                        <h4 class="font-bold text-xl text-navy mb-3">Direktori Halal</h4>
                        <p class="text-gray-text text-sm leading-relaxed">Katalog lengkap bahan baku dan produk jadi sesuai
                            kategori.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="produk-populer" class="py-24 bg-bg-light">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-navy mb-4">Produk Terbaru <span
                            class="text-primary">Terverifikasi</span></h2>
                    <p class="text-gray-text">Daftar produk makanan dan minuman populer yang baru saja memperbarui atau
                        mendapatkan sertifikat halal.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $products = [
                        [
                            'title' => 'Noodle Supreme Ayam',
                            'cat' => 'Makanan Instan',
                            'img' =>
                                'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800&auto=format&fit=crop',
                        ],
                        [
                            'title' => 'Kopi Susu Gula Aren',
                            'cat' => 'Minuman Olahan',
                            'img' =>
                                'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?q=80&w=800&auto=format&fit=crop',
                        ],
                        [
                            'title' => 'Keripik Kentang Balado',
                            'cat' => 'Makanan Ringan',
                            'img' =>
                                'https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=800&auto=format&fit=crop',
                        ],
                    ];
                @endphp

                @foreach ($products as $prod)
                    <div
                        class="bg-white p-4 rounded-3xl shadow-sm hover:shadow-xl hover:shadow-black/5 hover:-translate-y-1 hover:border-primary border border-transparent transition-all duration-300">
                        <div class="h-52 w-full rounded-2xl overflow-hidden mb-4 bg-gray-100">
                            <img src="{{ $prod['img'] }}" class="w-full h-full object-cover" alt="{{ $prod['title'] }}">
                        </div>
                        <div class="px-1">
                            <h5 class="text-lg font-bold text-navy mb-1">{{ $prod['title'] }}</h5>
                            <span class="text-sm text-gray-text block mb-4">{{ $prod['cat'] }}</span>
                            <div class="flex justify-between items-center pt-4 border-t border-dashed border-gray-200">
                                <span
                                    class="bg-green-50 text-green-700 px-3 py-1 rounded-lg text-xs font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-check"></i> Halal
                                </span>
                                <small class="text-gray-400">ID321...</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 px-5 text-center">
        <div class="container">
            <h6 class="text-primary font-bold tracking-widest uppercase mb-3">Testimoni</h6>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy mb-12">Apa Kata Masyarakat?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">

                <div
                    class="bg-white p-10 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.05)] border border-slate-100 text-left relative">
                    <i class="fa-solid fa-quote-right absolute top-6 right-8 text-5xl text-slate-100"></i>
                    <p class="text-gray-text relative z-10 mb-6">"Sangat membantu saat belanja bulanan. Tinggal scan
                        barcode, langsung ketahuan status halalnya. Tidak ragu lagi beli produk baru."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/women/12.jpg"
                            class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h5 class="font-bold text-navy">Sarah Aulia</h5>
                            <small class="text-gray-text">Ibu Rumah Tangga</small>
                        </div>
                    </div>
                </div>

                <div class="bg-primary p-10 rounded-3xl shadow-xl text-left relative transform md:scale-105 z-10">
                    <i class="fa-solid fa-quote-right absolute top-6 right-8 text-5xl text-white/20"></i>
                    <p class="text-white/90 relative z-10 mb-6">"Sebagai pengusaha kuliner, saya sangat terbantu untuk
                        mengecek bahan baku yang saya gunakan. Datanya sangat lengkap dan update."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg"
                            class="w-12 h-12 rounded-full object-cover border-2 border-white/30">
                        <div>
                            <h5 class="font-bold text-white">Budi Santoso</h5>
                            <small class="text-white/70">Pemilik Restoran</small>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-10 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.05)] border border-slate-100 text-left relative">
                    <i class="fa-solid fa-quote-right absolute top-6 right-8 text-5xl text-slate-100"></i>
                    <p class="text-gray-text relative z-10 mb-6">"Aplikasi web ini sangat responsif dan mudah digunakan.
                        Fitur pencarian produsennya detail sekali."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/women/66.jpg"
                            class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h5 class="font-bold text-navy">Dina Rahma</h5>
                            <small class="text-gray-text">Mahasiswi</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container flex flex-col lg:flex-row gap-12 items-start">
            <div class="flex-1">
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy mb-6">Pertanyaan yang Sering <span
                        class="text-primary">Diajukan</span></h2>
                <p class="text-gray-text mb-6 leading-relaxed">Meningkatkan pemahaman harian dan pengambilan keputusan yang
                    lebih baik. Temukan jawaban singkat di sini.</p>
                <a href="#" class="text-primary font-bold hover:underline flex items-center gap-2">
                    Lihat Semua FAQ <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="flex-[1.5] w-full">
                @foreach (['Bagaimana cara cek sertifikat halal?', 'Apakah data disini sinkron dengan BPJPH?', 'Bagaimana cara mendaftarkan produk saya?', 'Apakah ada biaya untuk menggunakan layanan ini?'] as $q)
                    <div class="border-b border-gray-100 py-5 cursor-pointer group">
                        <div
                            class="flex justify-between items-center font-bold text-lg text-navy group-hover:text-primary transition-colors">
                            {{ $q }} <i class="fa-solid fa-plus text-sm"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container mb-20 mt-10">
        <div
            class="relative bg-gradient-to-br from-primary to-blue-400 rounded-[30px] p-10 md:p-16 flex flex-col md:flex-row justify-between items-center text-center md:text-left overflow-hidden shadow-2xl shadow-blue-500/30">
            <div class="absolute -bottom-12 -right-12 w-72 h-72 bg-white/10 rounded-full"></div>

            <div class="relative z-10 text-white mb-8 md:mb-0 max-w-lg">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Mulai Cek Kehalalan Produk Sekarang</h2>
                <p class="opacity-90">Pastikan apa yang Anda dan keluarga konsumsi terjamin kehalalannya. Gratis dan mudah.
                </p>
            </div>
            <div class="relative z-10">
                <a href="{{ route('produk.index') }}"
                    class="bg-white text-primary px-8 py-4 rounded-full font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    Cari Produk
                </a>
            </div>
        </div>
    </div>

@endsection
