@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-4xl mx-auto">

        <x-card>
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 dark:bg-slate-700/50 dark:border-slate-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Edit Kategori</h2>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-400">Perbarui informasi kategori produk.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Nama Kategori <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama_kategori"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                required>
                            @error('nama_kategori')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Deskripsi
                                Kategori</label>
                            <textarea name="deskripsi" rows="4"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        </div>

                    </div>

                    <div
                        class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4 dark:border-slate-700">
                        <a href="{{ route('admin.kategori.index') }}"
                            class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200
                            dark:bg-transparent dark:border-slate-600 dark:text-gray-300 dark:hover:bg-slate-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95
                            dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white dark:border dark:border-slate-600">
                            Update Kategori
                        </button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
@endsection
