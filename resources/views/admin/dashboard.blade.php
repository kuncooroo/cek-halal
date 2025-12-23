@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col xl:flex-row gap-8 max-w-7xl mx-auto">

        <div class="flex-1 space-y-8 min-w-0">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Overview</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Hai Admin berikut ringkasan hari ini.</p>
                </div>
                <div class="hidden sm:flex items-center space-x-2 text-sm">
                    <span class="text-gray-500">Today</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100 hover:shadow-sm transition-all">
                    <h3 class="text-gray-500 text-sm font-medium mb-2">Total Produk</h3>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $totalProduk ?? 0 }}</span>
                            <span
                                class="text-xs font-medium text-green-600 bg-green-100 px-1.5 py-0.5 rounded">+11.01%</span>
                        </div>
                        <svg class="w-12 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 48 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 18L10 12L18 16L26 8L34 14L46 4" />
                        </svg>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-sm transition-all">
                    <h3 class="text-gray-500 text-sm font-medium mb-2">Total Berita</h3>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $totalBerita ?? 0 }}</span>
                            <span class="text-xs font-medium text-gray-600 bg-gray-200 px-1.5 py-0.5 rounded">-0.03%</span>
                        </div>
                        <svg class="w-12 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 48 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 12L14 12L22 18L32 10L46 14" />
                        </svg>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-sm transition-all">
                    <h3 class="text-gray-500 text-sm font-medium mb-2">Total FAQ</h3>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $totalFaq ?? 0 }}</span>
                            <span
                                class="text-xs font-medium text-green-600 bg-green-100 px-1.5 py-0.5 rounded">+15.03%</span>
                        </div>
                        <svg class="w-12 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 48 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 18L14 10L22 14L32 6L46 8" />
                        </svg>
                    </div>
                </div>

                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100 hover:shadow-sm transition-all">
                    <h3 class="text-gray-500 text-sm font-medium mb-2">Total Views</h3>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $totalViews ?? '12.4K' }}</span>
                            <span
                                class="text-xs font-medium text-green-600 bg-green-100 px-1.5 py-0.5 rounded">+6.08%</span>
                        </div>
                        <svg class="w-12 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 48 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 14L10 18L22 8L34 12L46 4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <h3 class="text-sm font-bold text-gray-900">Recent Products</h3>
                            <span class="text-xs text-gray-400 px-2 py-1 bg-white rounded border">This Year</span>
                        </div>
                        <a href="{{ route('admin.produk.index') }}" class="text-xs text-gray-400 hover:text-gray-600">See
                            All</a>
                    </div>

                    <div class="space-y-4">
                        @forelse($recentProduk ?? [] as $produk)
                            <div class="flex items-center justify-between group">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                        {{ strtoupper(substr($produk->nama ?? 'P', 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4
                                            class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">
                                            {{ $produk->nama ?? 'Nama Produk' }}</h4>
                                        <p class="text-xs text-gray-400">{{ Str::limit($produk->deskripsi, 40) }}</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-mono text-gray-400">{{ $produk->created_at?->format('M d') }}</span>
                            </div>
                            <div class="h-px bg-gray-200 w-full"></div>
                        @empty
                            <div
                                class="h-32 flex items-center justify-center text-gray-400 text-sm border border-dashed border-gray-300 rounded-lg">
                                No products data available
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="text-sm font-bold text-gray-900 mb-6">Quick Actions</h3>
                    <div class="space-y-6">
                        <a href="{{ route('admin.produk.index') }}" class="block group">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600 group-hover:text-blue-600 font-medium">Tambah Produk</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-gray-800 h-1.5 rounded-full" style="width: 45%"></div>
                            </div>
                        </a>

                        <a href="{{ route('admin.berita.index') }}" class="block group">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600 group-hover:text-blue-600 font-medium">Tambah Berita</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-gray-800 h-1.5 rounded-full" style="width: 70%"></div>
                            </div>
                        </a>

                        <a href="{{ route('admin.faq.index') }}" class="block group">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600 group-hover:text-blue-600 font-medium">Tambah FAQ</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-gray-800 h-1.5 rounded-full" style="width: 25%"></div>
                            </div>
                        </a>

                        <div class="block">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600 font-medium">System Status</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-gray-800 h-1.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="text-sm font-bold text-gray-900 mb-6">Latest News</h3>
                    <div class="space-y-4">
                        @forelse($recentBerita ?? [] as $berita)
                            @if ($loop->odd)
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 rounded-full bg-blue-400 mt-1.5 flex-shrink-0"></div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-800">{{ $berita->judul }}</h4>
                                        <p class="text-xs text-gray-500 mt-1">{{ Str::limit($berita->konten, 50) }}</p>
                                    </div>
                                    <span
                                        class="text-xs text-gray-400 ml-auto whitespace-nowrap">{{ $berita->created_at?->diffForHumans(null, true) }}</span>
                                </div>
                            @endif
                        @empty
                            <p class="text-xs text-gray-400">Belum ada berita.</p>
                        @endforelse
                    </div>
                </div>

                <div
                    class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-center items-center relative">
                    <h3 class="text-sm font-bold text-gray-900 absolute top-6 left-6">News Distribution</h3>
                    <div
                        class="w-32 h-32 rounded-full border-8 border-blue-100 border-t-blue-500 border-r-blue-400 flex items-center justify-center">
                        <div class="text-center">
                            <span class="block text-xl font-bold text-gray-800">{{ $totalBerita ?? 0 }}</span>
                            <span class="text-[10px] text-gray-400 uppercase">Total</span>
                        </div>
                    </div>
                    <div class="mt-6 w-full px-4">
                        <div class="flex justify-between items-center text-xs text-gray-600 mb-2">
                            <div class="flex items-center"><span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
                                Published</div>
                            <span>80%</span>
                        </div>
                        <div class="flex justify-between items-center text-xs text-gray-600">
                            <div class="flex items-center"><span class="w-2 h-2 rounded-full bg-blue-100 mr-2"></span>
                                Draft</div>
                            <span>20%</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-full xl:w-72 flex-shrink-0 space-y-8 border-l border-gray-100 pl-0 xl:pl-8 mt-4 xl:mt-0">

            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-4">Notifications</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-900">You fixed a bug.</p>
                            <p class="text-[10px] text-gray-400">Just now</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-900">New user registered.</p>
                            <p class="text-[10px] text-gray-400">59 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-900">Andi Lane subscribed.</p>
                            <p class="text-[10px] text-gray-400">Today, 11:59 AM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-4">Activities</h3>
                <div class="relative pl-2 border-l border-gray-200 space-y-6">
                    <div class="relative pl-4">
                        <div class="absolute -left-1.5 top-1 w-3 h-3 bg-red-400 rounded-full border-2 border-white"></div>
                        <p class="text-xs font-medium text-gray-800">Changed the style.</p>
                        <p class="text-[10px] text-gray-400">Just now</p>
                    </div>
                    <div class="relative pl-4">
                        <div class="absolute -left-1.5 top-1 w-3 h-3 bg-yellow-400 rounded-full border-2 border-white">
                        </div>
                        <p class="text-xs font-medium text-gray-800">Release a new version.</p>
                        <p class="text-[10px] text-gray-400">59 minutes ago</p>
                    </div>
                    <div class="relative pl-4">
                        <div class="absolute -left-1.5 top-1 w-3 h-3 bg-blue-400 rounded-full border-2 border-white"></div>
                        <p class="text-xs font-medium text-gray-800">Submitted a bug.</p>
                        <p class="text-[10px] text-gray-400">12 hours ago</p>
                    </div>
                    <div class="relative pl-4">
                        <div class="absolute -left-1.5 top-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white">
                        </div>
                        <p class="text-xs font-medium text-gray-800">Modified A data in Page X.</p>
                        <p class="text-[10px] text-gray-400">Today, 11:59 AM</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-4">Contacts</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Natali+Craig&background=random" alt="User">
                        </div>
                        <span class="text-xs font-medium text-gray-700">Natali Craig</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Drew+Cano&background=random" alt="User">
                        </div>
                        <span class="text-xs font-medium text-gray-700">Drew Cano</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Andi+Lane&background=random" alt="User">
                        </div>
                        <span class="text-xs font-medium text-gray-700">Andi Lane</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
