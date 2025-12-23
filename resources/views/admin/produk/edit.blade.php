@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-4xl mx-auto">

        <nav class="flex mb-6 text-sm text-gray-500">
            <a href="{{ route('admin.produk.index') }}" class="hover:text-black transition-colors">Produk</a>
            <span class="mx-3">/</span>
            <span class="text-gray-900 font-medium">Edit Data</span>
        </nav>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h2 class="text-xl font-bold text-gray-900">Edit Produk</h2>
                <p class="text-sm text-gray-600 mt-1">Perbarui informasi detail produk.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Produk</label>
                                <input type="text" name="nama_produk"
                                    value="{{ old('nama_produk', $produk->nama_produk) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Produsen</label>
                                <input type="text" name="nama_produsen"
                                    value="{{ old('nama_produsen', $produk->nama_produsen) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                                <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Barcode</label>
                                <input type="text" name="barcode" value="{{ old('barcode', $produk->barcode) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 font-mono focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200"
                                    required>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Sertifikat Halal</label>
                                <input type="text" name="nomor_sertifikat_halal"
                                    value="{{ old('nomor_sertifikat_halal', $produk->nomor_sertifikat_halal) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 font-mono focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200"
                                    required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tgl Terbit</label>
                                    <input type="date" name="tanggal_terbit"
                                        value="{{ old('tanggal_terbit', $produk->tanggal_terbit) }}"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tgl Kadaluarsa</label>
                                    <input type="date" name="tanggal_kadaluarsa"
                                        value="{{ old('tanggal_kadaluarsa', $produk->tanggal_kadaluarsa) }}"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Status Produk</label>
                                <div class="relative">
                                    <select name="status"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200">
                                        <option value="aktif" {{ $produk->status === 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="nonaktif" {{ $produk->status === 'nonaktif' ? 'selected' : '' }}>
                                            Nonaktif</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Lengkap</label>
                            <textarea name="deskripsi" rows="4"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.produk.index') }}"
                            class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
