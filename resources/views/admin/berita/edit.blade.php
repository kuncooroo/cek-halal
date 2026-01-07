@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="max-w-5xl mx-auto">

        <x-card>
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 dark:bg-slate-700/50 dark:border-slate-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Edit Berita</h2>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-400">Perbarui konten berita.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
                    novalidate>
                    @csrf @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Judul
                                    Berita<span class="text-red-500">*</span></label>
                                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                    required>
                                @error('judul')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Konten
                                    Berita<span class="text-red-500">*</span></label>
                                <textarea name="konten" rows="15"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">{{ old('konten', $berita->konten) }}</textarea>
                                @error('konten')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div
                                class="p-6 border border-gray-200 rounded-xl bg-white dark:bg-slate-800 dark:border-slate-600 shadow-sm">
                                <h3
                                    class="text-sm font-bold text-gray-900 mb-4 dark:text-white border-b pb-2 border-gray-100 dark:border-slate-700">
                                    Publikasi</h3>

                                <div class="space-y-4">
                                    <div>
                                        <label
                                            class="block text-xs font-bold text-gray-600 mb-1.5 dark:text-gray-400">Penulis<span
                                                class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <select name="penulis_id"
                                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-2.5 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200 
                                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                                required>
                                                @foreach ($penulis as $p)
                                                    <option value="{{ $p->id }}"
                                                        {{ old('penulis_id', $berita->penulis_id) == $p->id ? 'selected' : '' }}>
                                                        {{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 dark:text-gray-400">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-gray-600 mb-1.5 dark:text-gray-400">Tanggal
                                            Publikasi</label>
                                        <input type="datetime-local" name="tanggal_publikasi" id="tanggal_publikasi"
                                            value="{{ old('tanggal_publikasi') }}"
                                            class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-2.5 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
    dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500 dark:[color-scheme:dark]">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-bold text-gray-600 mb-1.5 dark:text-gray-400">Status</label>
                                        <div class="relative">
                                            <select name="status"
                                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-2.5 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200 
                                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500">
                                                <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>
                                                    Draft</option>
                                                <option value="published"
                                                    {{ $berita->status == 'published' ? 'selected' : '' }}>Published
                                                </option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 dark:text-gray-400">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-6 border border-gray-200 rounded-xl bg-white dark:bg-slate-800 dark:border-slate-600 shadow-sm">
                                <h3
                                    class="text-sm font-bold text-gray-900 mb-4 dark:text-white border-b pb-2 border-gray-100 dark:border-slate-700">
                                    Media</h3>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-600 mb-1.5 dark:text-gray-400">Thumbnail</label>
                                    @if ($berita->thumbnail)
                                        <div class="mb-3">
                                            <div class="relative group">
                                                <img src="{{ asset('storage/' . $berita->thumbnail) }}"
                                                    class="w-full h-40 object-cover rounded-lg border border-gray-200 shadow-sm">
                                                <div
                                                    class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <span class="text-white text-xs font-bold">Gambar Saat Ini</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div
                                        class="p-2 border border-dashed border-gray-300 rounded-lg bg-gray-50 dark:bg-slate-800 dark:border-slate-600">
                                        <input type="file" name="thumbnail"
                                            class="block w-full text-xs text-gray-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0
                                            file:text-xs file:font-semibold
                                            file:bg-black file:text-white
                                            hover:file:bg-gray-800 dark:file:bg-slate-600 dark:file:text-white">
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2 dark:text-gray-400">Biarkan kosong jika tidak ingin
                                        mengubah gambar.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end gap-4 dark:border-slate-700">
                        <a href="{{ route('admin.berita.index') }}"
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
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const input = document.getElementById('tanggal_publikasi');

                        if (!input.value) {
                            const now = new Date();

                            const year = now.getFullYear();
                            const month = String(now.getMonth() + 1).padStart(2, '0');
                            const day = String(now.getDate()).padStart(2, '0');
                            const hours = String(now.getHours()).padStart(2, '0');
                            const minutes = String(now.getMinutes()).padStart(2, '0');

                            input.value = `${year}-${month}-${day}T${hours}:${minutes}`;
                        }
                    });
                </script>
            </div>
        </x-card>
    </div>
@endsection
