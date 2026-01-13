    @extends('layouts.admin')

    @section('title', 'Dashboard')

    @section('content')
        <div class="flex flex-col xl:flex-row gap-8 max-w-7xl mx-auto">

            <div class="flex-1 space-y-8 min-w-0">

                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Overview</h2>
                        <p class="text-sm text-gray-500 mt-0.5 dark:text-gray-400">Hai Admin berikut ringkasan hari ini.</p>
                    </div>
                    <div class="hidden sm:flex items-center space-x-2 text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Today</span>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-card
                        class="bg-blue-50/50 dark:bg-slate-800 rounded-2xl p-6 border border-blue-100 dark:border-slate-700 hover:shadow-sm transition-all">
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-2">Total Produk</h3>
                        <div class="flex items-end justify-between">
                            <div class="flex items-baseline space-x-2">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalProduk ?? 0 }}</span>
                                <span
                                    class="text-xs font-medium text-green-600 bg-green-100 dark:bg-green-900/30 dark:text-green-400 px-1.5 py-0.5 rounded">+11.01%</span>
                            </div>
                            <svg class="w-12 h-6 text-gray-300 dark:text-slate-600" fill="none" stroke="currentColor"
                                viewBox="0 0 48 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2 18L10 12L18 16L26 8L34 14L46 4" />
                            </svg>
                        </div>
                    </x-card>

                    <x-card
                        class="bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 hover:shadow-sm transition-all">
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-2">Total Berita</h3>
                        <div class="flex items-end justify-between">
                            <div class="flex items-baseline space-x-2">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalBerita ?? 0 }}</span>
                                <span
                                    class="text-xs font-medium text-gray-600 bg-gray-200 dark:bg-slate-700 dark:text-gray-400 px-1.5 py-0.5 rounded">-0.03%</span>
                            </div>
                            <svg class="w-12 h-6 text-gray-300 dark:text-slate-600" fill="none" stroke="currentColor"
                                viewBox="0 0 48 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2 12L14 12L22 18L32 10L46 14" />
                            </svg>
                        </div>
                    </x-card>

                    <x-card
                        class="bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 hover:shadow-sm transition-all">
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-2">Total FAQ</h3>
                        <div class="flex items-end justify-between">
                            <div class="flex items-baseline space-x-2">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalFaq ?? 0 }}</span>
                                <span
                                    class="text-xs font-medium text-green-600 bg-green-100 dark:bg-green-900/30 dark:text-green-400 px-1.5 py-0.5 rounded">+15.03%</span>
                            </div>
                            <svg class="w-12 h-6 text-gray-300 dark:text-slate-600" fill="none" stroke="currentColor"
                                viewBox="0 0 48 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2 18L14 10L22 14L32 6L46 8" />
                            </svg>
                        </div>
                    </x-card>

                    <x-card
                        class="bg-blue-50/50 dark:bg-slate-800 rounded-2xl p-6 border border-blue-100 dark:border-slate-700 hover:shadow-sm transition-all">
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-2">Total Views</h3>
                        <div class="flex items-end justify-between">
                            <div class="flex items-baseline space-x-2">
                                <span
                                    class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalViews ?? '12.4K' }}</span>
                                <span
                                    class="text-xs font-medium text-green-600 bg-green-100 dark:bg-green-900/30 dark:text-green-400 px-1.5 py-0.5 rounded">+6.08%</span>
                            </div>
                            <svg class="w-12 h-6 text-gray-300 dark:text-slate-600" fill="none" stroke="currentColor"
                                viewBox="0 0 48 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2 14L10 18L22 8L34 12L46 4" />
                            </svg>
                        </div>
                    </x-card>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <x-card
                        class="lg:col-span-2 bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white">Recent Products</h3>
                                <span
                                    class="text-xs text-gray-400 px-2 py-1 bg-white dark:bg-slate-700 dark:border-slate-600 rounded border">This
                                    Year</span>
                            </div>
                            <a href="{{ route('admin.produk.index') }}"
                                class="text-xs text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">See All</a>
                        </div>

                        <div class="space-y-4">
                            @forelse($recentProduk ?? [] as $produk)
                                <div class="flex items-center justify-between group">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 flex items-center justify-center text-xs font-bold text-gray-600 dark:text-gray-300">
                                            {{ strtoupper(substr($produk->nama ?? 'P', 0, 1)) }}
                                        </div>
                                        <div>
                                            <h4
                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                {{ $produk->nama ?? 'Nama Produk' }}</h4>
                                            <p class="text-xs text-gray-400 dark:text-gray-500">
                                                {{ Str::limit($produk->deskripsi, 40) }}</p>
                                        </div>
                                    </div>
                                    <span
                                        class="text-xs font-mono text-gray-400 dark:text-gray-500">{{ $produk->created_at?->format('M d') }}</span>
                                </div>
                                <div class="h-px bg-gray-200 dark:bg-slate-700 w-full"></div>
                            @empty
                                <div
                                    class="h-32 flex items-center justify-center text-gray-400 text-sm border border-dashed border-gray-300 dark:border-slate-600 rounded-lg">
                                    No products data available
                                </div>
                            @endforelse
                        </div>
                    </x-card>

                    <x-card class="bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-6">Quick Actions</h3>
                        <div class="space-y-6">
                            <a href="{{ route('admin.produk.index') }}" class="block group">
                                <div class="flex justify-between text-xs mb-1">
                                    <span
                                        class="text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 font-medium">Tambah
                                        Produk</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-gray-800 dark:bg-slate-400 h-1.5 rounded-full" style="width: 45%"></div>
                                </div>
                            </a>

                            <a href="{{ route('admin.berita.index') }}" class="block group">
                                <div class="flex justify-between text-xs mb-1">
                                    <span
                                        class="text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 font-medium">Tambah
                                        Berita</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-gray-800 dark:bg-slate-400 h-1.5 rounded-full" style="width: 70%"></div>
                                </div>
                            </a>

                            <a href="{{ route('admin.faq.index') }}" class="block group">
                                <div class="flex justify-between text-xs mb-1">
                                    <span
                                        class="text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 font-medium">Tambah
                                        FAQ</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-gray-800 dark:bg-slate-400 h-1.5 rounded-full" style="width: 25%"></div>
                                </div>
                            </a>

                            <div class="block">
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-gray-600 dark:text-gray-300 font-medium">System Status</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-gray-800 dark:bg-slate-400 h-1.5 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </x-card>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-card class="bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-6">Latest News</h3>
                        <div class="space-y-4">
                            @forelse($recentBerita ?? [] as $berita)
                                @if ($loop->odd)
                                    <div class="flex items-start space-x-3">
                                        <div class="w-2 h-2 rounded-full bg-blue-400 mt-1.5 flex-shrink-0"></div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $berita->judul }}</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ Str::limit($berita->konten, 50) }}</p>
                                        </div>
                                        <span
                                            class="text-xs text-gray-400 dark:text-gray-500 ml-auto whitespace-nowrap">{{ $berita->created_at?->diffForHumans(null, true) }}</span>
                                    </div>
                                @endif
                            @empty
                                <p class="text-xs text-gray-400">Belum ada berita.</p>
                            @endforelse
                        </div>
                    </x-card>

                    <x-card
                        class="bg-gray-50 dark:bg-slate-800 rounded-2xl p-6 border border-gray-100 dark:border-slate-700 flex flex-col justify-center items-center relative">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white absolute top-6 left-6">News Distribution
                        </h3>
                        <div
                            class="w-32 h-32 rounded-full border-8 border-blue-100 dark:border-slate-700 border-t-blue-500 border-r-blue-400 flex items-center justify-center">
                            <div class="text-center">
                                <span
                                    class="block text-xl font-bold text-gray-800 dark:text-white">{{ $totalBerita ?? 0 }}</span>
                                <span class="text-[10px] text-gray-400 uppercase">Total</span>
                            </div>
                        </div>
                        <div class="mt-6 w-full px-4">
                            <div class="flex justify-between items-center text-xs text-gray-600 dark:text-gray-400 mb-2">
                                <div class="flex items-center"><span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
                                    Published</div>
                                <span>80%</span>
                            </div>
                            <div class="flex justify-between items-center text-xs text-gray-600 dark:text-gray-400">
                                <div class="flex items-center"><span
                                        class="w-2 h-2 rounded-full bg-blue-100 dark:bg-slate-600 mr-2"></span>
                                    Draft</div>
                                <span>20%</span>
                            </div>
                        </div>
                    </x-card>
                </div>

            </div>

        </div>
    @endsection
