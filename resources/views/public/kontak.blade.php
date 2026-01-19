@extends('layouts.public')

@section('title', 'Hubungi Kami - Cek Halal Indonesia')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')

    <div class="relative pt-32 pb-16 text-center overflow-hidden">

        <div class="container px-5">
            <h1 class="text-3xl md:text-5xl font-extrabold text-navy mb-4 tracking-tight leading-tight">
                Kirim Pesan & Pertanyaan
            </h1>
            <p class="text-lg text-gray-text max-w-2xl mx-auto leading-relaxed">
                Isi formulir di bawah ini untuk terhubung dengan tim kami. Kami siap membantu kebutuhan sertifikasi halal
                Anda.
            </p>
        </div>
    </div>

    <div class="pb-24 px-5">
        <div class="container">

            <div
                class="grid grid-cols-1 lg:grid-cols-[1.5fr_1fr] bg-white rounded-[24px] overflow-hidden shadow-[0_10px_40px_rgba(30,136,229,0.05)] border border-slate-100">

                <div class="p-8 md:p-12">
                    <div id="alertBox"></div>

                    <form id="contactForm" action="{{ route('kontak.submit') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block font-bold text-sm text-navy mb-2">Nama Lengkap</label>
                                <input type="text" name="nama"
                                    class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-navy placeholder-slate-400 focus:outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all duration-300"
                                    placeholder="Nama Anda" required>
                            </div>
                            <div>
                                <label class="block font-bold text-sm text-navy mb-2">Email</label>
                                <input type="email" name="email"
                                    class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-navy placeholder-slate-400 focus:outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all duration-300"
                                    placeholder="email@contoh.com" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block font-bold text-sm text-navy mb-2">Nomor Telepon</label>
                                <input type="tel" name="telepon"
                                    class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-navy placeholder-slate-400 focus:outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all duration-300"
                                    placeholder="0812...">
                            </div>
                            <div>
                                <label class="block font-bold text-sm text-navy mb-2">Subjek</label>
                                <div class="relative">
                                    <select name="subjek"
                                        class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-navy focus:outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 appearance-none cursor-pointer"
                                        required>
                                        <option value="" disabled selected>Pilih Keperluan</option>
                                        <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                                        <option value="Bantuan Teknis">Bantuan Teknis</option>
                                        <option value="Kerjasama">Kerjasama</option>
                                        <option value="Komplain">Komplain Layanan</option>
                                    </select>
                                    <i
                                        class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block font-bold text-sm text-navy mb-2">Pesan Anda</label>
                            <textarea name="pesan" rows="5"
                                class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-navy placeholder-slate-400 focus:outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 resize-none"
                                placeholder="Tuliskan detail pertanyaan atau pesan Anda disini..." required></textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-primary text-white py-4 rounded-full font-bold shadow-lg shadow-blue-500/30 hover:shadow-xl hover:bg-blue-600 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            <span>Kirim Pesan</span> <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

                <div class="bg-navy text-white p-8 md:p-12 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-white/5 rounded-full pointer-events-none"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-8">Informasi Kontak</h3>

                        <div class="space-y-8">
                            <div class="flex gap-5">
                                <div
                                    class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-blue-300 shrink-0">
                                    <i class="fa-solid fa-location-dot text-xl"></i>
                                </div>
                                <div>
                                    <strong class="block text-slate-300 text-sm uppercase tracking-wider mb-1">Alamat
                                        Kantor</strong>
                                    <span class="font-medium text-lg">Jl. Veteran No.10-11, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</span>
                                </div>
                            </div>

                            <div class="flex gap-5">
                                <div
                                    class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-blue-300 shrink-0">
                                    <i class="fa-solid fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <strong
                                        class="block text-slate-300 text-sm uppercase tracking-wider mb-1">Email</strong>
                                    <span class="font-medium text-lg">cekhalal@gmail.com</span>
                                </div>
                            </div>

                            <div class="flex gap-5">
                                <div
                                    class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-blue-300 shrink-0">
                                    <i class="fa-solid fa-phone text-xl"></i>
                                </div>
                                <div>
                                    <strong
                                        class="block text-slate-300 text-sm uppercase tracking-wider mb-1">Telepon</strong>
                                    <span class="font-medium text-lg">+62 8778 5711 752</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 mt-12 pt-8 border-t border-white/10">
                        <p class="text-sm text-slate-400 mb-4">Media Sosial:</p>
                        <div class="flex gap-4">
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-navy hover:border-white transition-all duration-300">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-navy hover:border-white transition-all duration-300">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-navy hover:border-white transition-all duration-300">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="mt-16 bg-gradient-to-br from-primary to-blue-400 rounded-[24px] p-8 md:p-12 text-white relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl">
                <div class="absolute -bottom-24 -right-12 w-64 h-64 bg-white/10 rounded-full pointer-events-none"></div>
                <div class="absolute -top-12 left-12 w-32 h-32 bg-white/10 rounded-full pointer-events-none"></div>

                <div class="relative z-10 max-w-xl text-center md:text-left">
                    <h2 class="text-2xl md:text-3xl font-extrabold mb-3">Punya Pertanyaan Lain?</h2>
                    <p class="text-white/90 text-lg leading-relaxed">
                        Temukan jawaban cepat atas pertanyaan yang sering diajukan di halaman Pusat Bantuan kami.
                    </p>
                </div>
                <div class="relative z-10 shrink-0">
                    <a href="{{ route('faq.index') }}"
                        class="bg-white text-primary px-8 py-3.5 rounded-full font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 inline-flex items-center gap-2">
                        Lihat FAQ <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const btn = document.getElementById('submitBtn');
            const alertBox = document.getElementById('alertBox');

            btn.disabled = true;
            const originalBtnContent = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin animate-spin"></i> Mengirim...';
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: new FormData(form)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alertBox.innerHTML = `
                        <div class="bg-blue-50 text-blue-700 px-5 py-4 rounded-xl mb-8 border border-blue-100 flex items-center gap-3 font-bold animate-[fadeIn_0.5s_ease-out]">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-check text-blue-600"></i>
                            </div>
                            <span>${data.message}</span>
                        </div>`;

                        form.reset();
                        alertBox.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                })
                .catch(err => {
                    alertBox.innerHTML = `
                    <div class="bg-red-50 text-red-700 px-5 py-4 rounded-xl mb-8 border border-red-100 flex items-center gap-3 font-bold animate-[fadeIn_0.5s_ease-out]">
                        <i class="fa-solid fa-circle-exclamation text-xl"></i>
                        <span>Terjadi kesalahan sistem. Silakan coba lagi.</span>
                    </div>`;
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerHTML = originalBtnContent;
                    btn.classList.remove('opacity-75', 'cursor-not-allowed');
                });
        });
    </script>
@endpush
