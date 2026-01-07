@extends('layouts.admin')

@section('title', 'Tambah FAQ')

@section('content')
    <div class="max-w-4xl mx-auto">

        <x-card>
            <div class="p-8">
                <form action="{{ route('admin.faq.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="space-y-6">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Pertanyaan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="pertanyaan" value="{{ old('pertanyaan') }}"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                placeholder="Contoh: Bagaimana cara memesan?" required>
                            @error('pertanyaan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 dark:text-gray-300">Jawaban <span
                                    class="text-red-500">*</span></label>
                            <textarea name="jawaban" rows="6"
                                class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200 
                                dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:focus:bg-slate-800 dark:focus:border-slate-500 dark:focus:ring-slate-500"
                                placeholder="Tulis jawaban lengkap di sini..." required>{{ old('jawaban') }}</textarea>
                            @error('jawaban')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div
                        class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4 dark:border-slate-700">
                        <a href="{{ route('admin.faq.index') }}"
                            class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200
                            dark:bg-transparent dark:border-slate-600 dark:text-gray-300 dark:hover:bg-slate-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95
                            dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white dark:border dark:border-slate-600">
                            Simpan FAQ
                        </button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
@endsection
