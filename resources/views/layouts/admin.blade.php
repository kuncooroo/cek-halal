<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 4px;
        }
    </style>
</head>

@php
    $currentAdmin = Illuminate\Support\Facades\Auth::guard('admin')->user();
@endphp

<body class="bg-[#F7F9FB] text-gray-800 font-sans antialiased overflow-hidden dark:bg-slate-900 dark:text-gray-100">

    <div class="flex h-screen w-full">
        <aside
            class="w-64 flex-shrink-0 bg-white border-r border-gray-100 flex flex-col transition-all duration-300 dark:bg-slate-800 dark:border-slate-700">
            <div class="h-16 flex items-center px-6 mb-4">
                <div class="flex items-center space-x-2 text-gray-900 dark:text-white">
                    <span class="text-lg font-semibold tracking-tight">Dashboard Admin</span>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
                <p class="px-2 text-xs font-medium text-gray-400 uppercase tracking-wider mb-2 mt-2">Main</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                <p class="px-2 text-xs font-medium text-gray-400 uppercase tracking-wider mb-2 mt-6">Manajemen</p>

                <a href="{{ route('admin.kategori.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.kategori*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.kategori*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    <span class="text-sm font-medium">Kategori</span>
                </a>

                <a href="{{ route('admin.produk.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.produk*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.produk*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="text-sm font-medium">Produk</span>
                </a>

                <a href="{{ route('admin.penulis.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.penulis*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.penulis*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span class="text-sm font-medium">Penulis</span>
                </a>

                <a href="{{ route('admin.berita.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.berita*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.berita*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span class="text-sm font-medium">Berita</span>
                </a>

                <a href="{{ route('admin.faq.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.faq*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.faq*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">FAQ</span>
                </a>

                <a href="{{ route('admin.testimoni.index') }}"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.testimoni*') ? 'bg-gray-100 text-gray-900 dark:bg-slate-700 dark:text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.testimoni*') ? 'text-gray-900 dark:text-white' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="text-sm font-medium">Testimoni</span>
                </a>

                @if ($currentAdmin && $currentAdmin->role === 'superadmin')
                    <p class="px-2 text-xs font-medium text-purple-500 uppercase tracking-wider mb-2 mt-6">Super Admin
                    </p>

                    <a href="{{ route('admin.admin.index') }}"
                        class="flex items-center space-x-3 px-3 py-2 rounded-lg group transition-colors {{ request()->routeIs('admin.admin*') ? 'bg-purple-50 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-slate-700 dark:hover:text-white' }}">

                        <svg class="w-5 h-5 {{ request()->routeIs('admin.admin*') ? 'text-purple-700 dark:text-purple-300' : 'text-gray-400 group-hover:text-gray-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                        <span class="text-sm font-medium">Kelola Admin</span>
                    </a>
                @endif
            </nav>

            <div class="p-4">
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
            <header
                class="h-16 bg-white/80 backdrop-blur-md border-b border-gray-100 flex justify-between items-center px-8 flex-shrink-0 z-10 dark:bg-slate-800/90 dark:border-slate-700">
                <div class="flex items-center space-x-4">

                    @php
                        $routeName = Route::currentRouteName();
                        $segments = explode('.', $routeName);

                        $moduleName = 'Dashboard';
                        $actionName = '';
                        $isIndex = true;

                        if (count($segments) >= 2 && $segments[0] === 'admin') {
                            $rawModule = $segments[1];

                            $moduleName = ucfirst($rawModule);
                            if ($rawModule === 'faq') {
                                $moduleName = 'FAQ';
                            }

                            if (isset($segments[2])) {
                                $action = $segments[2];
                                if ($action === 'create') {
                                    $actionName = 'Tambah Baru';
                                    $isIndex = false;
                                } elseif ($action === 'edit') {
                                    $actionName = 'Edit Data';
                                    $isIndex = false;
                                } elseif ($action === 'show') {
                                    $actionName = 'Detail';
                                    $isIndex = false;
                                }
                            }
                        }
                    @endphp

                    <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400">

                        <a href="{{ route('admin.dashboard') }}"
                            class="hover:text-gray-800 dark:hover:text-white transition-colors">
                            Admin
                        </a>

                        @if ($routeName !== 'admin.dashboard')
                            <span class="mx-2 text-gray-400">/</span>

                            @if ($isIndex)
                                <span class="text-gray-800 font-medium dark:text-gray-200">
                                    {{ $moduleName }}
                                </span>
                            @else
                                @if ($segments[1] === 'profile')
                                    <span class="text-gray-800 font-medium dark:text-gray-200">
                                        {{ $moduleName }}
                                    </span>
                                @else
                                    <a href="{{ route('admin.' . $segments[1] . '.index') }}"
                                        class="hover:text-gray-800 dark:hover:text-white transition-colors">
                                        {{ $moduleName }}
                                    </a>
                                @endif

                                <span class="mx-2 text-gray-400">/</span>


                                <span class="text-gray-800 font-medium dark:text-gray-200">
                                    {{ $actionName }}
                                </span>
                            @endif
                        @else
                            <span class="mx-2 text-gray-400">/</span>
                            <span class="text-gray-800 font-medium dark:text-gray-200">
                                Dashboard
                            </span>
                        @endif
                    </nav>


                </div>

                <div class="flex items-center space-x-4">

                    <div class="relative" id="notification-dropdown-container">
                        <button onclick="toggleNotificationDropdown()"
                            class="p-2 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-all relative focus:outline-none"
                            title="Notifikasi">

                            @if (isset($adminNotifications) && $adminNotifications->count() > 0)
                                <div
                                    class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-slate-800 animate-pulse">
                                </div>
                            @endif

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <div id="notification-dropdown-menu"
                            class="hidden absolute right-0 mt-2 w-80 bg-white dark:bg-slate-800 rounded-xl shadow-xl py-2 ring-1 ring-black ring-opacity-5 z-50 transform origin-top-right transition-all duration-200 border border-gray-100 dark:border-slate-700">

                            <div
                                class="px-4 py-2 border-b border-gray-100 dark:border-slate-700 flex justify-between items-center">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white">Notifikasi</h3>
                                @if (isset($adminNotifications) && $adminNotifications->count() > 0)
                                    <span class="text-[10px] text-blue-600 dark:text-blue-400 font-medium">
                                        {{ $adminNotifications->count() }} Baru
                                    </span>
                                @endif
                            </div>

                            <div class="max-h-64 overflow-y-auto custom-scrollbar">
                                @forelse($adminNotifications ?? [] as $notif)
                                    @php
                                        $level = $notif->data['level'] ?? 'normal';
                                        $bgColor = match ($level) {
                                            'important' => 'bg-red-50/50 hover:bg-red-50 border-red-500 dark:bg-red-900/10 dark:hover:bg-red-900/20',
                                            'medium' => 'bg-yellow-50/50 hover:bg-yellow-50 border-yellow-500 dark:bg-yellow-900/10 dark:hover:bg-yellow-900/20',
                                            'info' => 'bg-blue-50/50 hover:bg-blue-50 border-blue-500 dark:bg-blue-900/10 dark:hover:bg-blue-900/20',
                                            default => 'hover:bg-gray-50 border-transparent dark:hover:bg-slate-700/50',
                                        };
                                        $textColor = match ($level) {
                                            'important' => 'text-red-600 dark:text-red-400',
                                            'medium' => 'text-yellow-600 dark:text-yellow-400',
                                            'info' => 'text-blue-600 dark:text-blue-400',
                                            default => 'text-gray-900 dark:text-gray-100',
                                        };
                                    @endphp

                                    <a href="{{ route('admin.notifications.read', $notif->id) }}"
                                        class="block px-4 py-3 transition-colors border-l-4 {{ $bgColor }}">
                                        <div class="flex items-start">
                                            <div class="flex-1">
                                                @if ($level === 'important')
                                                    <p
                                                        class="text-[10px] font-bold text-red-600 dark:text-red-400 uppercase tracking-wider mb-0.5">
                                                        Penting</p>
                                                @elseif($level === 'medium')
                                                    <p
                                                        class="text-[10px] font-bold text-yellow-600 dark:text-yellow-400 uppercase tracking-wider mb-0.5">
                                                        Peringatan</p>
                                                @elseif($level === 'info')
                                                    <p
                                                        class="text-[10px] font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wider mb-0.5">
                                                        Info</p>
                                                @endif

                                                <p
                                                    class="text-sm {{ $level === 'normal' ? 'text-gray-700 dark:text-gray-200' : $textColor }} line-clamp-2">
                                                    {{ $notif->data['message'] ?? 'Notifikasi baru' }}
                                                </p>
                                                <p class="text-[10px] text-gray-400 mt-1">
                                                    {{ $notif->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="px-4 py-6 text-center">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Tidak ada notifikasi baru.
                                        </p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="px-4 py-2 border-t border-gray-100 dark:border-slate-700 text-center">
                                <form action="{{ route('admin.notifications.markAllRead') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-xs font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors w-full">
                                        Tandai semua dibaca
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button onclick="toggleTheme()"
                        class="p-2 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-all"
                        title="Ubah Tema">
                        <svg id="icon-sun" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg id="icon-moon" class="w-5 h-5 block" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>

                    <div class="relative ml-4 border-l border-gray-200 pl-4 dark:border-slate-600"
                        id="profile-dropdown-container">
                        <button onclick="toggleProfileDropdown()" class="flex items-center gap-3 focus:outline-none">
                            <div class="text-right hidden md:block">
                                <div class="text-sm font-bold text-gray-900 dark:text-white">
                                    {{ $currentAdmin ? $currentAdmin->name : 'Admin' }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 capitalize">
                                    {{ $currentAdmin ? $currentAdmin->role : 'User' }}
                                </div>
                            </div>
                            @if ($currentAdmin && !empty($currentAdmin->avatar))
                                <img src="{{ asset('storage/' . $currentAdmin->avatar) }}"
                                    class="w-8 h-8 rounded-full object-cover border border-gray-200 shadow-sm"
                                    alt="Avatar">
                            @else
                                <div
                                    class="w-8 h-8 rounded-full bg-black text-white flex items-center justify-center font-bold text-xs uppercase shadow-md dark:bg-slate-200 dark:text-slate-900">
                                    {{ substr($currentAdmin ? $currentAdmin->name : 'A', 0, 1) }}
                                </div>
                            @endif
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="profile-dropdown-menu"
                            class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-slate-700 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50 transform origin-top-right transition-all duration-200">

                            <div class="px-4 py-2 border-b border-gray-100 dark:border-slate-600 md:hidden">
                                <p class="text-sm text-gray-700 dark:text-white font-bold">
                                    {{ $currentAdmin ? $currentAdmin->name : 'Admin' }}</p>
                            </div>

                            <a href="{{ route('admin.profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-slate-600">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    Edit Profil
                                </div>
                            </a>

                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-slate-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        Log out
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        const html = document.documentElement;
        const iconSun = document.getElementById('icon-sun');
        const iconMoon = document.getElementById('icon-moon');

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            showSun();
        } else {
            html.classList.remove('dark');
            showMoon();
        }

        function toggleTheme() {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
                showMoon();
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
                showSun();
            }
        }

        function showSun() {
            iconSun.classList.remove('hidden');
            iconMoon.classList.add('hidden');
        }

        function showMoon() {
            iconMoon.classList.remove('hidden');
            iconSun.classList.add('hidden');
        }

        function toggleProfileDropdown() {
            const menu = document.getElementById('profile-dropdown-menu');
            const notifMenu = document.getElementById('notification-dropdown-menu');

            if (!notifMenu.classList.contains('hidden')) {
                notifMenu.classList.add('hidden');
            }
            menu.classList.toggle('hidden');
        }

        function toggleNotificationDropdown() {
            const notifMenu = document.getElementById('notification-dropdown-menu');
            const profileMenu = document.getElementById('profile-dropdown-menu');

            if (!profileMenu.classList.contains('hidden')) {
                profileMenu.classList.add('hidden');
            }
            notifMenu.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            const profileContainer = document.getElementById('profile-dropdown-container');
            const profileMenu = document.getElementById('profile-dropdown-menu');
            if (!profileContainer.contains(e.target)) {
                if (!profileMenu.classList.contains('hidden')) {
                    profileMenu.classList.add('hidden');
                }
            }

            const notifContainer = document.getElementById('notification-dropdown-container');
            const notifMenu = document.getElementById('notification-dropdown-menu');
            if (!notifContainer.contains(e.target)) {
                if (!notifMenu.classList.contains('hidden')) {
                    notifMenu.classList.add('hidden');
                }
            }
        });
    </script>
</body>

</html>