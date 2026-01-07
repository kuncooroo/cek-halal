@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-4xl mx-auto">

        <x-card>
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 dark:bg-slate-700/50 dark:border-slate-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Edit Produk</h2>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-400">Perbarui informasi detail produk.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Nama Produk<span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="nama_produk"
                                    value="{{ old('nama_produk', $produk->nama_produk) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    required>
                                @error('nama_produk')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Nama
                                    Produsen<span class="text-red-500">*</span></label>
                                <input type="text" name="nama_produsen"
                                    value="{{ old('nama_produsen', $produk->nama_produsen) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    required>
                                @error('nama_produsen')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Kategori</label>
                                <div class="relative">
                                    <select name="kategori_id"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ old('kategori_id', $produk->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 dark:text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Barcode<span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="barcode" value="{{ old('barcode', $produk->barcode) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 font-mono focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    required>
                                @error('barcode')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Nomor
                                    Sertifikat Halal<span class="text-red-500">*</span></label>
                                <input type="text" name="nomor_sertifikat_halal"
                                    value="{{ old('nomor_sertifikat_halal', $produk->nomor_sertifikat_halal) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 font-mono focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    required>
                                @error('nomor_sertifikat_halal')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Tanggal
                                        Terbit<span class="text-red-500">*</span></label>
                                    <input type="date" name="tanggal_terbit"
                                        value="{{ old('tanggal_terbit', $produk->tanggal_terbit) }}"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                        dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500 
                                        dark:[color-scheme:dark]">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Tanggal
                                        Kadaluarsa<span class="text-red-500">*</span></label>
                                    <input type="date" name="tanggal_kadaluarsa"
                                        value="{{ old('tanggal_kadaluarsa', $produk->tanggal_kadaluarsa) }}"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                        dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500
                                        dark:[color-scheme:dark]">
                                    @error('tanggal_kadaluarsa')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Status
                                    Produk</label>
                                <div class="relative">
                                    <select name="status"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200 
                                        dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">
                                        <option value="aktif"
                                            {{ old('status', $produk->status) == 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="tidak_aktif"
                                            {{ old('status', $produk->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak
                                            Aktif</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 dark:text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Deskripsi
                                Lengkap</label>
                            <textarea name="deskripsi" rows="4"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        </div>

                    </div>

                    <div
                        class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4 dark:border-slate-700">
                        <a href="{{ route('admin.produk.index') }}"
                            class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200 
                            dark:bg-transparent dark:border-slate-600 dark:text-gray-300 dark:hover:bg-slate-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95 
                            dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white dark:border dark:border-slate-600">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
@endsection
