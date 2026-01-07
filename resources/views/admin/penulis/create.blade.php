@extends('layouts.admin')

@section('title', 'Tambah Penulis')

@section('content')
    <div class="max-w-4xl mx-auto">

        <x-card>
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 dark:bg-slate-700/50 dark:border-slate-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Form Tambah Penulis</h2>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-400">Lengkapi data penulis di bawah ini.</p>
            </div>

            <div class="p-8">

                <form action="{{ route('admin.penulis.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Nama Lengkap
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    placeholder="Masukkan nama lengkap..." required>
                                @error('nama')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    placeholder="contoh@email.com">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Foto
                                    Profil</label>
                                <div
                                    class="p-2 border border-dashed border-gray-300 rounded-lg bg-gray-50 dark:bg-slate-800 dark:border-slate-600">
                                    <input type="file" name="foto"
                                        class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-black file:text-white
                                        hover:file:bg-gray-800 dark:file:bg-slate-600 dark:file:text-white">
                                </div>
                                <p class="text-xs text-gray-500 mt-2 dark:text-gray-400">Format: JPG, PNG, Max: 2MB</p>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Status <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="aktif"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200 
                                        dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">
                                        <option value="1" {{ old('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('aktif') == '0' ? 'selected' : '' }}>Non-Aktif
                                        </option>
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
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Biografi
                                Singkat</label>
                            <textarea name="bio" rows="4"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                placeholder="Tulis biografi singkat penulis...">{{ old('bio') }}</textarea>
                        </div>

                    </div>

                    <div
                        class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4 dark:border-slate-700">
                        <a href="{{ route('admin.penulis.index') }}"
                            class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200 
                            dark:bg-transparent dark:border-slate-600 dark:text-gray-300 dark:hover:bg-slate-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95 
                            dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white dark:border dark:border-slate-600">
                            Simpan Penulis
                        </button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
@endsection
