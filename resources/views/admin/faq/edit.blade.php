@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
<div class="max-w-4xl mx-auto">

    <nav class="flex mb-6 text-sm text-gray-500">
        <a href="{{ route('admin.faq.index') }}" class="hover:text-black transition-colors">FAQ</a>
        <span class="mx-3">/</span>
        <span class="text-gray-900 font-medium">Edit Data</span>
    </nav>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        {{-- Header Form --}}
        <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
            <h2 class="text-xl font-bold text-gray-900">Edit FAQ</h2>
            <p class="text-sm text-gray-600 mt-1">Perbarui konten pertanyaan dan jawaban.</p>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    
                    {{-- Pertanyaan --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pertanyaan</label>
                        <input type="text" name="pertanyaan" value="{{ old('pertanyaan', $faq->pertanyaan) }}" 
                            class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200" required>
                        @error('pertanyaan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Jawaban --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jawaban</label>
                        <textarea name="jawaban" rows="6" 
                            class="block w-full rounded-lg border-gray-400 bg-gray-50 px-4 py-3 text-gray-900 focus:bg-white focus:border-black focus:ring-black sm:text-sm shadow-sm transition-all duration-200" required>{{ old('jawaban', $faq->jawaban) }}</textarea>
                        @error('jawaban') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                </div>

                {{-- Action Buttons --}}
                <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.faq.index') }}" 
                       class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50 transition-all duration-200">
                       Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all duration-200 shadow-md transform active:scale-95">
                        Update FAQ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection