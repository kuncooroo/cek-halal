@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">

        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-green-900/50 dark:text-green-300 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <span class="font-medium">Berhasil!</span> {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-red-900/50 dark:text-red-300 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    <span class="font-medium">Gagal!</span> {{ session('error') }}
                </div>
            </div>
        @endif

        <x-card>
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 dark:bg-slate-700/50 dark:border-slate-700">
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $kontak->subjek }}</h2>
                        <div class="mt-2 flex flex-col gap-1 text-sm text-gray-600 dark:text-gray-400">
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-900 dark:text-white">Dari:</span>
                                <span>{{ $kontak->nama }}</span>
                                <span class="text-gray-400">&lt;{{ $kontak->email }}&gt;</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-900 dark:text-white">Waktu:</span>
                                <span>{{ $kontak->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex-shrink-0">
                        <span class="px-3 py-1 text-xs font-medium rounded-full border
                            {{ $kontak->is_read
                                ? 'bg-green-50 text-green-700 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800'
                                : 'bg-yellow-50 text-yellow-700 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-300 dark:border-yellow-800' }}">
                            {{ $kontak->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="mb-10">
                    <label class="block font-bold text-gray-700 mb-3 dark:text-gray-300 uppercase tracking-wider text-xs">
                        Isi Pesan
                    </label>
                    <div class="w-full text-gray-800 dark:text-gray-200 whitespace-pre-line leading-relaxed text-base bg-white dark:bg-slate-800 p-6 rounded-xl border border-gray-100 dark:border-slate-700 shadow-sm">
                        {{ $kontak->pesan }}
                    </div>
                </div>

                <div class="border-t border-gray-100 dark:border-slate-700 pt-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                        Balas Pesan
                    </h3>

                    <form action="{{ route('admin.kontak.reply', $kontak->id) }}" method="POST">
                        @csrf

                        <div class="mb-8">
                            <label for="balasan" class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">
                                Pesan Balasan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="balasan" rows="6" id="balasan"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                placeholder="Tulis balasan Anda di sini... (Akan dikirim ke {{ $kontak->email }})">{{ old('balasan') }}</textarea>

                            @error('balasan')
                                <p class="text-sm text-red-600 dark:text-red-400 mt-2 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('admin.kontak.index') }}"
                                class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200
                                dark:bg-transparent dark:border-slate-600 dark:text-gray-300 dark:hover:bg-slate-700">
                                Kembali
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95
                                dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white dark:border dark:border-slate-600">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Kirim Balasan
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-card>
    </div>
@endsection