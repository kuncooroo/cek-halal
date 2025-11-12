@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 mb-8 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold mb-2">Selamat datang kembali, {{ Auth::user()->name }}! </h2>
                <p class="text-blue-100 text-lg">Anda login sebagai <span class="font-semibold bg-white/20 px-3 py-1 rounded-lg">{{ Auth::user()->role }}</span></p>
            </div>
            <div class="hidden md:block">
                <svg class="w-32 h-32 text-white/20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Produk -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-lg">+12%</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Produk</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalProduk ?? 0 }}</p>
        </div>

        <!-- Total Berita -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-lg">+8%</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Berita</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalBerita ?? 0 }}</p>
        </div>

        <!-- Total FAQ -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded-lg">+5%</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total FAQ</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalFaq ?? 0 }}</p>
        </div>

        <!-- Total Views -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-red-600 bg-red-100 px-2 py-1 rounded-lg">+24%</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Views</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalViews ?? '12.4K' }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Products -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Produk Terbaru</h3>
                <a href="{{ route('admin.produk.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
            </div>
            
            <div class="space-y-4">
                @forelse($recentProduk ?? [] as $produk)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($produk->nama ?? 'P', 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $produk->nama ?? 'Nama Produk' }}</h4>
                                <p class="text-sm text-gray-500">{{ Str::limit($produk->deskripsi ?? 'Deskripsi produk', 50) }}</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-gray-500">{{ $produk->created_at?->diffForHumans() ?? 'Baru' }}</span>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p>Belum ada produk</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Quick Actions</h3>
            
            <div class="space-y-3">
                <a href="{{ route('admin.produk.index') }}" class="flex items-center space-x-3 p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-blue-700">Tambah Produk</span>
                </a>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center space-x-3 p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors group">
                    <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-purple-700">Tambah Berita</span>
                </a>

                <a href="{{ route('admin.faq.index') }}" class="flex items-center space-x-3 p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                    <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-green-700">Tambah FAQ</span>
                </a>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8">
                <h4 class="text-sm font-bold text-gray-800 mb-4">Aktivitas Terakhir</h4>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">Produk ditambahkan</p>
                            <p class="text-xs text-gray-500">2 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">Berita dipublikasikan</p>
                            <p class="text-xs text-gray-500">5 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">FAQ diupdate</p>
                            <p class="text-xs text-gray-500">1 hari yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News -->
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-800">Berita Terbaru</h3>
            <a href="{{ route('admin.berita.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($recentBerita ?? [] as $berita)
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-purple-400 to-blue-500"></div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">{{ $berita->judul ?? 'Judul Berita' }}</h4>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($berita->konten ?? 'Konten berita', 80) }}</p>
                        <span class="text-xs text-gray-500">{{ $berita->created_at?->diffForHumans() ?? 'Baru' }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8 text-gray-500">
                    <p>Belum ada berita</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection