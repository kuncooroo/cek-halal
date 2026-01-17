@extends('layouts.admin')

@section('title', 'Dashboard Admin Halal')

@section('content')
    @php
        $now = now()->setTimezone('Asia/Jakarta');
        $hour = $now->format('H');
        $greeting = match (true) {
            $hour >= 3 && $hour < 10 => 'Selamat Pagi',
            $hour >= 10 && $hour < 15 => 'Selamat Siang',
            $hour >= 15 && $hour < 18 => 'Selamat Sore',
            default => 'Selamat Malam',
        };

        $totalProdukReal = \App\Models\Produk::count();
        $totalExpired = \App\Models\Produk::where('tanggal_kadaluarsa', '<', $now)->count();
        $totalActive = $totalProdukReal - $totalExpired;
        $circumference = 283;
        $percentActive = $totalProdukReal > 0 ? $totalActive / $totalProdukReal : 0;
        $dashOffset = $circumference * (1 - $percentActive);
    @endphp

    <div class="flex flex-col xl:flex-row gap-8 max-w-7xl mx-auto">

        <div class="flex-1 space-y-8 min-w-0">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        {{ $greeting }}, Admin!
                    </h2>
                    <p class="text-sm text-gray-500 mt-1 dark:text-gray-400">
                        Berikut adalah ringkasan aktivitas sistem sertifikasi halal Anda.
                    </p>
                </div>

                <div class="flex items-center space-x-2 bg-white dark:bg-slate-800 px-4 py-2 rounded-lg border border-gray-100 dark:border-slate-700 shadow-sm cursor-default select-none"
                    title="Tanggal Server Saat Ini">
                    <div class="p-1.5 bg-gray-100 dark:bg-slate-700 rounded-md">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider leading-none">Hari
                            Ini</span>
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-200 leading-none mt-1">
                            {{ $now->translatedFormat('l, d F Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Produk</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProduk ?? 0 }}</h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                    Terdaftar
                                </span>
                                <span class="text-xs text-gray-400">Data aktif</span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-4 -right-4 w-24 h-24 bg-gray-50 dark:bg-slate-700/20 rounded-full blur-2xl pointer-events-none">
                    </div>
                </x-card>

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Artikel & Berita</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalBerita ?? 0 }}</h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    Published
                                </span>
                                <span class="text-xs text-gray-400">Konten publik</span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                    </div>
                </x-card>

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Database FAQ</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalFaq ?? 0 }}</h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    Pusat Bantuan
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </x-card>

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pencarian User</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalPencarian ?? 0 }}
                            </h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Queries
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </x-card>

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ulasan & Rating</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalTestimoni ?? 0 }}
                            </h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    Feedback
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                    </div>
                </x-card>

                <x-card
                    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pengunjung</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalPengunjung ?? 0 }}
                            </h3>
                            <div class="flex items-center mt-2 gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-gray-600 bg-gray-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                    Traffic
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </x-card>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <x-card
                    class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-sm h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <h3 class="text-base font-bold text-gray-900 dark:text-white">Produk Halal Terbaru</h3>
                            <span
                                class="text-xs text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 px-2.5 py-1 rounded-full font-medium">
                                5 Terakhir
                            </span>
                        </div>
                        <a href="{{ route('admin.produk.index') }}"
                            class="text-sm font-medium text-gray-500 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors">Lihat
                            Semua</a>
                    </div>

                    <div class="space-y-1">
                        @forelse($recentProduk ?? [] as $produk)
                            <div
                                class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-slate-700/50 rounded-xl transition-colors group cursor-pointer">
                                <div class="flex items-center space-x-4 w-3/4">
                                    <div
                                        class="w-12 h-12 flex-shrink-0 rounded-xl bg-gray-100 dark:bg-slate-700 flex items-center justify-center text-sm font-bold text-gray-600 dark:text-gray-300 shadow-sm group-hover:bg-white group-hover:shadow-md transition-all">
                                        {{ strtoupper(substr($produk->nama_produk ?? 'P', 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors truncate">
                                            {{ $produk->nama_produk ?? 'Nama Produk' }}
                                        </h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate mt-0.5">
                                            <span class="font-medium">{{ $produk->nama_produsen ?? 'Produsen' }}</span>
                                            <span class="mx-1 text-gray-300">•</span>
                                            ID: #{{ $produk->id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="block text-[10px] text-gray-400 uppercase tracking-wide font-medium">Kadaluarsa</span>
                                    <span class="text-xs font-mono font-medium text-red-600 dark:text-red-400">
                                        {{ $produk->tanggal_kadaluarsa ? $produk->tanggal_kadaluarsa->format('d M Y') : 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div
                                class="h-48 flex flex-col items-center justify-center text-gray-400 text-sm border-2 border-dashed border-gray-100 dark:border-slate-700 rounded-xl">
                                <svg class="w-10 h-10 mb-3 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                Belum ada data produk halal.
                            </div>
                        @endforelse
                    </div>
                </x-card>

                <div class="space-y-6">

                    <x-card
                        class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Aksi Cepat
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.produk.index') }}"
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl transition-all group border border-gray-100 dark:border-slate-600">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="p-2 bg-white dark:bg-slate-600 rounded-lg text-gray-600 dark:text-gray-300 shadow-sm border border-gray-100 dark:border-slate-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Tambah Produk</span>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <a href="{{ route('admin.berita.index') }}"
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl transition-all group border border-gray-100 dark:border-slate-600">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="p-2 bg-white dark:bg-slate-600 rounded-lg text-gray-600 dark:text-gray-300 shadow-sm border border-gray-100 dark:border-slate-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Tulis Berita</span>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </x-card>

                    <x-card
                        class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start mb-6">
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white">Status Sertifikat</h3>
                            <button class="text-gray-400 hover:text-gray-600"><svg class="w-4 h-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg></button>
                        </div>

                        <div class="flex flex-row items-center justify-between">
                            <div class="relative w-28 h-28">
                                <svg class="w-full h-full transform -rotate-90">
                                    <circle cx="56" cy="56" r="45" stroke="currentColor"
                                        stroke-width="10" fill="transparent" class="text-red-500 dark:text-red-900" />
                                    <circle cx="56" cy="56" r="45" stroke="currentColor"
                                        stroke-width="10" fill="transparent" stroke-dasharray="283"
                                        stroke-dashoffset="{{ $dashOffset }}"
                                        class="text-blue-600 dark:text-blue-500 transition-all duration-1000 ease-out"
                                        stroke-linecap="round" />
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span
                                        class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalProdukReal ?? 0 }}</span>
                                    <span
                                        class="text-[9px] text-gray-400 uppercase font-bold tracking-wider">Total</span>
                                </div>
                            </div>

                            <div class="space-y-3 flex-1 ml-6">
                                <div class="flex justify-between items-center text-xs">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="w-2.5 h-2.5 rounded-full bg-blue-600 shadow-[0_0_8px_rgba(37,99,235,0.5)]"></span>
                                        <span class="text-gray-600 dark:text-gray-300 font-medium">Aktif</span>
                                    </div>
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $totalActive ?? 0 }}</span>
                                </div>
                                <div class="flex justify-between items-center text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-red-400 dark:bg-red-500"></span>
                                        <span class="text-gray-600 dark:text-gray-300 font-medium">Expired</span>
                                    </div>
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $totalExpired ?? 0 }}</span>
                                </div>
                                <div class="h-px bg-gray-100 dark:bg-slate-700 my-2"></div>
                                <div class="text-[10px] text-gray-400">
                                    Data diperbarui real-time.
                                </div>
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>

            <x-card
                class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Berita Terkini</h3>
                    <a href="{{ route('admin.berita.index') }}"
                        class="p-2 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($recentBerita ?? [] as $berita)
                        <div
                            class="flex gap-4 p-4 rounded-xl border border-gray-100 dark:border-slate-700 hover:border-blue-100 dark:hover:border-blue-900/50 hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-all group">
                            <div
                                class="w-16 h-16 rounded-lg bg-gray-200 dark:bg-slate-700 flex-shrink-0 overflow-hidden">
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-bold text-gray-900 dark:text-white line-clamp-1 group-hover:text-blue-600 transition-colors">
                                    {{ $berita->judul }}</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">
                                    {{ Str::limit(strip_tags($berita->konten), 80) }}</p>
                                <div class="flex items-center gap-2 mt-2 text-[10px] text-gray-400">
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg> {{ $berita->created_at?->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-8 text-gray-400 text-sm">
                            Belum ada berita yang dipublish.
                        </div>
                    @endforelse
                </div>
            </x-card>

        </div>
    </div>
@endsection