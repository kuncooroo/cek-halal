@extends('layouts.app')

@section('title', 'Beranda - Platform Verifikasi Produk Halal Terpercaya')

@section('content')
    <!-- Hero Section with Slider -->
    <section class="relative overflow-hidden">
        <div class="container mx-auto px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="inline-block">
                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                            ✨ Platform Terpercaya #1 di Indonesia
                        </span>
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Pastikan Produk Anda
                        <span class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                            Halal & Aman
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Verifikasi ribuan produk halal dengan mudah dan cepat. Database lengkap produk bersertifikat halal MUI untuk ketenangan keluarga Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('cek-produk') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-200 space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span>Cek Produk Sekarang</span>
                        </a>
                        <a href="{{ route('tentang') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white hover:bg-gray-50 text-gray-700 font-bold rounded-xl border-2 border-gray-200 transition-all duration-200 space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Pelajari Lebih Lanjut</span>
                        </a>
                    </div>
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div>
                            <div class="text-3xl font-bold text-green-600">10K+</div>
                            <div class="text-sm text-gray-600">Produk Terverifikasi</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-green-600">500+</div>
                            <div class="text-sm text-gray-600">Brand Terdaftar</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-green-600">50K+</div>
                            <div class="text-sm text-gray-600">Pengguna Aktif</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative z-10 bg-white rounded-3xl shadow-2xl p-8">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=600&fit=crop" alt="Halal Products" class="rounded-2xl w-full h-96 object-cover">
                        <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-green-600 to-emerald-600 text-white p-6 rounded-2xl shadow-xl">
                            <div class="text-sm font-semibold mb-1">Sertifikasi MUI</div>
                            <div class="text-2xl font-bold">100% Terjamin</div>
                        </div>
                    </div>
                    <div class="absolute -z-10 top-10 left-10 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                    <div class="absolute -z-10 top-10 right-10 w-72 h-72 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih Cek Halal?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Solusi lengkap untuk memastikan produk yang Anda konsumsi halal dan aman</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 hover:shadow-xl transition-all duration-200 border border-green-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Database Lengkap</h3>
                    <p class="text-gray-600 leading-relaxed">Akses ke database produk halal terlengkap dengan informasi sertifikasi MUI yang selalu diperbarui.</p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 hover:shadow-xl transition-all duration-200 border border-blue-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Cepat & Akurat</h3>
                    <p class="text-gray-600 leading-relaxed">Verifikasi produk dalam hitungan detik dengan sistem pencarian canggih dan hasil yang akurat.</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 hover:shadow-xl transition-all duration-200 border border-purple-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Mobile Friendly</h3>
                    <p class="text-gray-600 leading-relaxed">Cek produk kapan saja, di mana saja melalui smartphone Anda dengan antarmuka yang responsif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-green-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Cara Menggunakan</h2>
                <p class="text-xl text-gray-600">Tiga langkah mudah untuk memverifikasi produk Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-600 to-emerald-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-xl">1</div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Masukkan Nama Produk</h3>
                    <p class="text-gray-600">Ketik nama produk atau scan barcode yang ingin Anda verifikasi</p>
                </div>

                <div class="text-center">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-xl">2</div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sistem Verifikasi</h3>
                    <p class="text-gray-600">Database kami akan mencari dan memverifikasi status halal produk</p>
                </div>

                <div class="text-center">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-xl">3</div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Dapatkan Hasil</h3>
                    <p class="text-gray-600">Lihat hasil verifikasi lengkap dengan detail sertifikasi MUI</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('cek-produk') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-200 space-x-2">
                    <span>Mulai Verifikasi</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Trusted Partners -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Partner & Vendor Terpercaya</h2>
                <p class="text-xl text-gray-600">Bekerja sama dengan brand ternama untuk memastikan kualitas produk halal</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏢</div>
                        <div class="text-sm font-semibold text-gray-700">Brand A</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏭</div>
                        <div class="text-sm font-semibold text-gray-700">Brand B</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏪</div>
                        <div class="text-sm font-semibold text-gray-700">Brand C</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏬</div>
                        <div class="text-sm font-semibold text-gray-700">Brand D</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏛️</div>
                        <div class="text-sm font-semibold text-gray-700">Brand E</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 flex items-center justify-center hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🏗️</div>
                        <div class="text-sm font-semibold text-gray-700">Brand F</div>
                    </div>
                </div>
            </div>

            <!-- Certification Badge -->
            <div class="mt-16 bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl p-8 text-white text-center">
                <div class="flex items-center justify-center space-x-4 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <h3 class="text-3xl font-bold">Bekerja Sama dengan MUI</h3>
                </div>
                <p class="text-green-100 text-lg max-w-3xl mx-auto">
                    Platform kami didukung oleh Majelis Ulama Indonesia (MUI) untuk memberikan informasi sertifikasi halal yang valid dan terpercaya
                </p>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-20 bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">Berita & Artikel Terbaru</h2>
                    <p class="text-xl text-gray-600">Update terkini seputar produk dan sertifikasi halal</p>
                </div>
                <a href="{{ route('berita.index') }}" class="hidden md:inline-flex items-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 font-semibold rounded-xl border-2 border-gray-200 transition-all space-x-2">
                    <span>Lihat Semua</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for($i = 1; $i <= 3; $i++)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-200 border border-gray-100">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-emerald-500"></div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ now()->subDays($i)->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-green-600 transition-colors">
                            Pentingnya Sertifikasi Halal untuk Produk Pangan
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Memahami proses dan pentingnya sertifikasi halal MUI untuk menjamin kehalalan produk yang dikonsumsi masyarakat Indonesia...
                        </p>
                        <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold space-x-1">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600">
        <div class="container mx-auto px-6 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Mulai Verifikasi Produk Anda Sekarang</h2>
            <p class="text-xl mb-8 text-green-100 max-w-2xl mx-auto">
                Bergabung dengan ribuan pengguna yang sudah mempercayai platform kami untuk memastikan kehalalan produk
            </p>
            <a href="{{ route('cek-produk') }}" class="inline-flex items-center px-10 py-5 bg-white hover:bg-gray-100 text-green-600 font-bold rounded-xl shadow-2xl hover:shadow-3xl transition-all duration-200 text-lg space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <span>Cek Produk Gratis</span>
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>
@endpush