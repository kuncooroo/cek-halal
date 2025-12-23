@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="max-w-4xl mx-auto">

        <nav class="flex mb-6 text-sm text-gray-500">
            <a href="{{ route('admin.berita.index') }}" class="hover:text-black transition-colors">Berita</a>
            <span class="mx-3">/</span>
            <span class="text-gray-900 font-medium">Edit Data</span>
        </nav>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h2 class="text-xl font-bold text-gray-900">Edit Berita</h2>
                <p class="text-sm text-gray-600 mt-1">Perbarui informasi dan konten berita.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
                                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                                    class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200"
                                    required>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tgl Publikasi</label>
                                    <input type="datetime-local" name="tanggal_publikasi"
                                        value="{{ old('tanggal_publikasi', \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('Y-m-d\TH:i')) }}"
                                        class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                                    <div class="relative">
                                        <select name="status"
                                            class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm appearance-none transition-all duration-200">
                                            <option value="draft" {{ $berita->status === 'draft' ? 'selected' : '' }}>Draft
                                            </option>
                                            <option value="published"
                                                {{ $berita->status === 'published' ? 'selected' : '' }}>Published</option>
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
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Konten Berita</label>
                            <textarea name="konten" rows="8"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200">{{ old('konten', $berita->konten) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.berita.index') }}"
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
