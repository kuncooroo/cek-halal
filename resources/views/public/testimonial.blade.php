@extends('layouts.public')

@section('title', 'Testimoni - Cek Halal Indonesia')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-start;
            gap: 0.25rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.3);
            transition: color 0.2s;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }
    </style>
@endpush

@section('content')
    <div class="relative pt-32 pb-16 text-center overflow-hidden">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[radial-gradient(circle,rgba(30,136,229,0.05)_0%,transparent_70%)] -z-10 pointer-events-none rounded-full">
        </div>
        <div class="container px-5">
            <h1 class="text-3xl md:text-5xl font-extrabold text-navy mb-4 tracking-tight leading-tight">
                Apa Kata Masyarakat?
            </h1>
            <p class="text-lg text-gray-text max-w-2xl mx-auto leading-relaxed">
                Pengalaman nyata dari masyarakat dan pelaku usaha yang telah menggunakan layanan verifikasi halal kami.
            </p>
        </div>
    </div>

    <div class="pb-24 px-5">
        <div class="container">

            @if (session('success'))
                <div
                    class="bg-blue-50 text-blue-700 px-6 py-4 rounded-xl mb-10 text-center font-bold border border-blue-200 shadow-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-check-circle text-xl"></i> {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 text-red-700 px-6 py-4 rounded-xl mb-10 border border-red-200 shadow-sm">
                    <ul class="list-disc list-inside space-y-1 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                @forelse($approvedTestimonials as $testimoni)
                    <div
                        class="group bg-white p-8 rounded-[24px] shadow-[0_10px_40px_rgba(0,0,0,0.05)] border border-slate-100 relative flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-blue-100">

                        <i
                            class="fa-solid fa-quote-right absolute top-8 right-8 text-4xl text-slate-100 group-hover:text-blue-50 transition-colors"></i>

                        <div>
                            <div class="flex gap-1 text-yellow-400 mb-5 text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star {{ $i <= $testimoni->rating ? '' : 'text-gray-200' }}"></i>
                                @endfor
                            </div>
                            <p class="text-gray-600 leading-relaxed relative z-10 text-[0.95rem]">
                                "{{ Str::limit($testimoni->message, 150) }}"
                            </p>
                        </div>

                        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-50">
                            <img src="{{ $testimoni->image ? asset($testimoni->image) : 'https://ui-avatars.com/api/?name=' . urlencode($testimoni->name) . '&background=random' }}"
                                class="w-12 h-12 rounded-full object-cover shadow-sm ring-2 ring-white"
                                alt="{{ $testimoni->name }}">
                            <div>
                                <h5 class="font-bold text-navy text-sm">{{ $testimoni->name }}</h5>
                                <span class="text-xs text-gray-400 font-medium">Pengguna Terverifikasi</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full text-center py-16 bg-white rounded-[24px] border border-dashed border-gray-200">
                        <i class="fa-regular fa-comment-dots text-5xl mb-4 text-gray-300"></i>
                        <p class="text-gray-500 font-medium">Belum ada testimoni yang ditampilkan saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div id="ctaCard"
                class="relative bg-gradient-to-br from-primary to-blue-400 rounded-[30px] p-8 md:p-16 text-white overflow-hidden shadow-2xl transition-all duration-500">

                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/10 rounded-full pointer-events-none"></div>

                <div id="initialState"
                    class="flex flex-col md:flex-row justify-between items-center gap-8 transition-all duration-500 ease-in-out">
                    <div class="text-center md:text-left z-10 max-w-2xl">
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">Bagikan Pengalaman Anda</h2>
                        <p class="text-white/90 text-lg">Pastikan pengalaman Anda membantu orang lain mendapatkan kepastian
                            halal.</p>
                    </div>
                    <div class="z-10 shrink-0">
                        <button type="button" onclick="toggleForm()"
                            class="bg-white text-primary px-10 py-4 rounded-full font-extrabold shadow-lg hover:shadow-xl hover:scale-105 hover:bg-blue-50 transition-all duration-300 flex items-center gap-3">
                            <i class="fa-regular fa-pen-to-square"></i> Kirim Testimoni
                        </button>
                    </div>
                </div>

                <div id="formState" class="hidden opacity-0 transition-all duration-500 ease-in-out relative z-10">
                    <div class="flex justify-between items-center mb-10 pb-6 border-b border-white/20">
                        <h2 class="text-2xl md:text-3xl font-extrabold flex items-center gap-3">
                            <i class="fa-regular fa-paper-plane"></i> Formulir Testimoni
                        </h2>
                        <button type="button" onclick="toggleForm()"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all duration-300">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block font-bold mb-2 text-sm uppercase tracking-wider text-white/80">Nama
                                    Lengkap</label>
                                <input type="text" name="name"
                                    class="w-full px-5 py-3.5 rounded-2xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:outline-none focus:bg-white focus:text-navy focus:border-white transition-all backdrop-blur-sm"
                                    placeholder="Nama Anda" value="{{ old('name') }}" required>
                            </div>
                            <div>
                                <label class="block font-bold mb-2 text-sm uppercase tracking-wider text-white/80">Alamat
                                    Email</label>
                                <input type="email" name="email"
                                    class="w-full px-5 py-3.5 rounded-2xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:outline-none focus:bg-white focus:text-navy focus:border-white transition-all backdrop-blur-sm"
                                    placeholder="email@contoh.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block font-bold mb-2 text-sm uppercase tracking-wider text-white/80">Berikan
                                Rating</label>
                            <div
                                class="bg-white/10 inline-block px-4 py-2 rounded-2xl backdrop-blur-sm border border-white/10">
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5"
                                        {{ old('rating') == 5 ? 'checked' : '' }} required /><label for="star5"
                                        title="Sempurna"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4"
                                        {{ old('rating') == 4 ? 'checked' : '' }} /><label for="star4" title="Bagus"><i
                                            class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3"
                                        {{ old('rating') == 3 ? 'checked' : '' }} /><label for="star3" title="Cukup"><i
                                            class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2"
                                        {{ old('rating') == 2 ? 'checked' : '' }} /><label for="star2" title="Kurang"><i
                                            class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1"
                                        {{ old('rating') == 1 ? 'checked' : '' }} /><label for="star1"
                                        title="Buruk"><i class="fa-solid fa-star"></i></label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold mb-2 text-sm uppercase tracking-wider text-white/80">Pesan /
                                Ulasan Anda</label>
                            <textarea name="message" rows="4"
                                class="w-full px-5 py-3.5 rounded-2xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:outline-none focus:bg-white focus:text-navy focus:border-white transition-all backdrop-blur-sm resize-none"
                                placeholder="Ceritakan pengalaman Anda..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="mb-10">
                            <label class="block font-bold mb-2 text-sm uppercase tracking-wider text-white/80">Foto Profil
                                (Opsional)</label>
                            <input type="file" name="image"
                                class="w-full px-5 py-3 rounded-2xl border-2 border-white/20 bg-white/10 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-white file:text-primary hover:file:bg-blue-50 cursor-pointer transition-all backdrop-blur-sm"
                                accept="image/*">
                        </div>

                        <button type="submit"
                            class="w-full bg-white text-primary py-4 rounded-full font-extrabold text-lg shadow-xl hover:shadow-2xl hover:scale-[1.01] hover:bg-blue-50 transition-all duration-300 flex items-center justify-center gap-3">
                            Kirim Ulasan Sekarang <i class="fa-solid fa-paper-plane"></i>
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function toggleForm() {
            const initialState = document.getElementById('initialState');
            const formState = document.getElementById('formState');

            if (formState.classList.contains('hidden')) {
                initialState.style.opacity = '0';

                setTimeout(() => {
                    initialState.classList.add('hidden');

                    formState.classList.remove('hidden');
                    setTimeout(() => {
                        formState.style.opacity = '1';
                    }, 50);
                }, 300);

            } else {
                formState.style.opacity = '0';

                setTimeout(() => {
                    formState.classList.add('hidden');

                    initialState.classList.remove('hidden');
                    setTimeout(() => {
                        initialState.style.opacity = '1';
                    }, 50);
                }, 300);
            }
        }
    </script>
@endpush
