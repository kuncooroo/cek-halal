@extends('layouts.public')

@section('title', 'Tentang Kami - Cek Halal Indonesia')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <section class="relative bg-primary pt-32 pb-24 px-5 text-center text-white overflow-hidden"
        style="background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(135deg, #1e88e5, #42a5f5);
            background-size: 40px 40px, 40px 40px, 100% 100%;">

        <div
            class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-[radial-gradient(circle,rgba(255,255,255,0.15)_0%,rgba(255,255,255,0)_70%)] pointer-events-none">
        </div>
        <div class="absolute bottom-5 -right-12 w-48 h-48 rounded-full bg-white/10 pointer-events-none"></div>
        <div class="absolute top-[20%] right-[15%] w-12 h-12 rounded-full bg-[#ffd740]/20 animate-float pointer-events-none">
        </div>

        <div class="relative z-10">
            <h1 class="text-4xl md:text-[3.5rem] font-extrabold mb-4 drop-shadow-md">Tentang Kami</h1>
            <p class="text-xl md:text-[1.3rem] max-w-3xl mx-auto opacity-95">Mengenal lebih dekat platform verifikasi
                sertifikasi halal terpercaya di Indonesia</p>
        </div>

        <div class="absolute -bottom-12 left-0 right-0 h-24 bg-bg-light rounded-[50%_50%_0_0/100%_100%_0_0] z-20"></div>
    </section>

    <div class="bg-bg-light w-full">
        <section class="container py-20 grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-[2.5rem] font-extrabold text-navy mb-6 leading-tight">
                    Platform Cek <span class="text-primary">Sertifikasi Halal</span> Indonesia
                </h2>
                <p class="text-gray-text text-lg leading-relaxed mb-6">
                    Cek Halal adalah platform digital yang hadir untuk memudahkan masyarakat Indonesia dalam memverifikasi
                    status sertifikasi halal produk. Kami berkomitmen memberikan informasi yang akurat, cepat, dan
                    terpercaya untuk mendukung gaya hidup halal masyarakat muslim Indonesia.
                </p>
                <p class="text-gray-text text-lg leading-relaxed">
                    Platform Cek Halal dikembangkan sebagai solusi digital untuk menjawab kebutuhan masyarakat dalam
                    mengakses informasi sertifikasi halal produk dengan cepat dan mudah. Dengan database yang terintegrasi
                    dengan sistem resmi BPJPH (Badan Penyelenggara Jaminan Produk Halal), kami memastikan setiap informasi
                    yang disajikan adalah yang paling akurat dan terkini.
                </p>
            </div>

            <div class="relative group">
                <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop"
                    alt="Produk Supermarket Halal"
                    class="w-full h-auto max-h-[500px] object-cover rounded-3xl shadow-[0_30px_60px_rgba(30,136,229,0.15)] transition-transform duration-500 group-hover:scale-[1.02]">

                <div
                    class="absolute bottom-8 left-8 bg-white py-5 px-8 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] flex items-center gap-4 animate-float">
                    <i class="fa-solid fa-shield-halved text-3xl text-primary"></i>
                    <div>
                        <h4 class="m-0 font-extrabold text-navy text-lg">Terpercaya</h4>
                        <p class="m-0 text-gray-text text-sm">Data BPJPH Resmi</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="relative py-20 px-5 text-white overflow-hidden bg-gradient-to-br from-primary to-blue-400">
        <div class="absolute -top-12 left-0 right-0 h-24 bg-bg-light rounded-[0_0_50%_50%/0_0_100%_100%] z-10"></div>

        <div class="container relative z-20 pt-10">
            <h2 class="text-3xl md:text-[2.5rem] font-extrabold text-center mb-12">Nilai - Nilai Kami</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach ([['icon' => 'fa-shield-halved', 'title' => 'Kepercayaan', 'desc' => 'Kami berkomitmen menyajikan informasi yang akurat dan dapat dipercaya'], ['icon' => 'fa-clock', 'title' => 'Kecepatan', 'desc' => 'Memberikan layanan verifikasi yang cepat dan responsif'], ['icon' => 'fa-handshake', 'title' => 'Integritas', 'desc' => 'Menjaga transparansi dan kejujuran dalam setiap layanan'], ['icon' => 'fa-lightbulb', 'title' => 'Inovasi', 'desc' => 'Terus berinovasi untuk pengalaman pengguna yang lebih baik']] as $val)
                    <div
                        class="text-center p-8 bg-white/10 rounded-3xl backdrop-blur-md border border-white/20 transition-all duration-300 hover:-translate-y-2 hover:bg-white/20 hover:shadow-lg">
                        <i class="fa-solid {{ $val['icon'] }} text-[3.5rem] mb-5 block"></i>
                        <h3 class="text-xl font-bold mb-3">{{ $val['title'] }}</h3>
                        <p class="opacity-90 text-sm leading-relaxed">{{ $val['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div
                    class="group relative p-12 rounded-3xl overflow-hidden bg-gradient-to-br from-pastel-blue to-blue-100 transition-all hover:shadow-xl hover:-translate-y-1">
                    <div
                        class="absolute -top-1/2 -right-1/2 w-[200%] h-[200%] bg-[radial-gradient(circle,rgba(255,255,255,0.4)_0%,transparent_70%)] opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <i class="fa-solid fa-bullseye text-5xl text-primary mb-5 block relative z-10"></i>
                    <h3 class="text-2xl font-extrabold text-navy mb-4 relative z-10">Visi</h3>
                    <p class="text-gray-text text-lg leading-relaxed relative z-10">
                        Menjadi platform terdepan dalam penyediaan informasi sertifikasi halal yang mudah diakses, akurat,
                        dan terpercaya untuk seluruh masyarakat Indonesia.
                    </p>
                </div>

                <div
                    class="group relative p-12 rounded-3xl overflow-hidden bg-gradient-to-br from-navy to-[#1a2744] text-white transition-all hover:shadow-xl hover:-translate-y-1">
                    <div
                        class="absolute -top-1/2 -right-1/2 w-[200%] h-[200%] bg-[radial-gradient(circle,rgba(255,255,255,0.1)_0%,transparent_70%)] opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <i class="fa-solid fa-rocket text-5xl text-white mb-5 block relative z-10"></i>
                    <h3 class="text-2xl font-extrabold mb-4 relative z-10">Misi</h3>
                    <p class="opacity-90 text-lg leading-relaxed relative z-10">
                        Memberikan layanan verifikasi halal yang cepat dan mudah, meningkatkan kesadaran masyarakat tentang
                        pentingnya produk halal, serta mendukung implementasi UU Jaminan Produk Halal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-bg-light">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-[2.5rem] font-extrabold text-navy mb-4">Mengapa Memilih <span
                        class="text-primary">Platform Kami</span></h2>
                <p class="text-gray-text text-lg max-w-3xl mx-auto">Keunggulan dan komitmen kami untuk memberikan layanan
                    terbaik bagi masyarakat Indonesia</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ([['icon' => 'fa-database', 'title' => 'Database Terintegrasi', 'desc' => 'Database terintegrasi langsung dengan sistem resmi BPJPH untuk akurasi data terjamin'], ['icon' => 'fa-magnifying-glass', 'title' => 'Pencarian Fleksibel', 'desc' => 'Fitur pencarian fleksibel dengan 4 metode: nama produk, produsen, nomor sertifikat, dan scan barcode'], ['icon' => 'fa-users', 'title' => 'User-Friendly', 'desc' => 'Antarmuka yang user-friendly dan mudah digunakan oleh semua kalangan'], ['icon' => 'fa-sync', 'title' => 'Update Berkala', 'desc' => 'Update data secara berkala untuk memastikan informasi selalu terkini'], ['icon' => 'fa-hand-holding-dollar', 'title' => 'Gratis Selamanya', 'desc' => 'Akses gratis tanpa biaya apapun untuk seluruh masyarakat Indonesia'], ['icon' => 'fa-mobile-screen', 'title' => 'Multi Platform', 'desc' => 'Dapat diakses dari berbagai perangkat (desktop, tablet, smartphone)']] as $feat)
                    <div
                        class="bg-white p-9 rounded-3xl flex items-start gap-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-16 h-16 bg-pastel-blue text-primary rounded-2xl flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid {{ $feat['icon'] }}"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-navy mb-2">{{ $feat['title'] }}</h4>
                            <p class="text-gray-text leading-relaxed">{{ $feat['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach ([['icon' => 'fa-box', 'num' => number_format($stats['total_produk'] ?? 0) . '+', 'label' => 'Produk Terdaftar'], ['icon' => 'fa-building', 'num' => number_format($stats['total_produsen'] ?? 0) . '+', 'label' => 'Produsen'], ['icon' => 'fa-users', 'num' => '100K+', 'label' => 'Pengguna Aktif']] as $stat)
                    <div
                        class="text-center p-10 bg-bg-light rounded-3xl transition-all duration-300 hover:bg-pastel-blue hover:-translate-y-2 group">
                        <i
                            class="fa-solid {{ $stat['icon'] }} text-5xl text-primary mb-5 group-hover:scale-110 transition-transform"></i>
                        <div class="text-5xl font-extrabold text-primary mb-3">{{ $stat['num'] }}</div>
                        <div class="text-navy font-bold text-lg">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pb-20 px-5 bg-white">
        <div class="container">
            <div
                class="relative bg-gradient-to-br from-primary to-blue-400 rounded-3xl p-16 text-center text-white overflow-hidden shadow-2xl">
                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/10 rounded-full pointer-events-none"></div>

                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-[2.5rem] font-extrabold mb-4">Mulai Gunakan Platform Kami</h2>
                    <p class="text-xl opacity-95 mb-10">Verifikasi status halal produk Anda sekarang dengan mudah dan cepat
                    </p>

                    <div class="flex flex-col sm:flex-row gap-5 justify-center">
                        <a href="{{ route('produk.index') }}"
                            class="inline-flex items-center justify-center gap-3 bg-white text-primary px-10 py-4 rounded-full font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all">
                            <i class="fa-solid fa-magnifying-glass"></i> Cek Produk Sekarang
                        </a>
                        <a href="{{ route('kontak.index') }}"
                            class="inline-flex items-center justify-center gap-3 bg-transparent text-white border-2 border-white px-10 py-4 rounded-full font-bold hover:bg-white hover:text-primary transition-all">
                            <i class="fa-solid fa-envelope"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
