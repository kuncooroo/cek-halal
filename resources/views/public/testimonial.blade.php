@extends('layouts.public')

@section('title', 'Testimoni - Cek Halal Indonesia')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --dark-green: #1a4444;
            --soft-green: #e6fffa;
            --text-gray: #718096;
        }

        /* Page Hero Modern */
        .page-hero {
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%);
            padding: 8rem 2rem 6rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.1;
        }

        .page-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
        }

        .page-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: -4rem auto 5rem;
            padding: 0 1.5rem;
            position: relative;
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 5rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            border: 1px solid #edf2f7;
            transition: 0.3s;
        }

        .stat-card:hover { transform: translateY(-5px); }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-green);
            display: block;
        }

        .stat-label {
            color: var(--text-gray);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Testimonials Grid */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }

        .testimonial-card {
            background: white;
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
            border: 1px solid #edf2f7;
            position: relative;
            transition: 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .quote-icon {
            position: absolute;
            top: 2rem;
            right: 2rem;
            font-size: 3rem;
            color: #f1f5f9;
            z-index: 0;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: var(--soft-green);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-weight: 700;
            font-size: 1.5rem;
            overflow: hidden;
        }

        .testimonial-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .testimonial-info h4 { color: var(--dark-green); margin: 0; font-weight: 700; }

        .testimonial-rating { color: #f59e0b; font-size: 0.8rem; margin-top: 4px; }

        .testimonial-message {
            color: #4a5568;
            font-size: 1.05rem;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        /* Form Section Modern */
        .form-section {
            background: white;
            padding: 4rem;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            max-width: 850px;
            margin: 0 auto;
            border: 1px solid #edf2f7;
        }

        .form-section h2 {
            color: var(--dark-green);
            font-size: 2.2rem;
            text-align: center;
            font-weight: 800;
            margin-bottom: 3rem;
        }

        .form-group { margin-bottom: 1.8rem; }
        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: var(--dark-green);
            font-size: 0.95rem;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            transition: 0.3s;
            background: #f8fafc;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-green);
            background: white;
            box-shadow: 0 0 0 4px rgba(45, 138, 106, 0.1);
        }

        /* Star Rating Modern */
        .rating-input {
            display: flex;
            gap: 0.5rem;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }
        .rating-input input { display: none; }
        .rating-input label {
            cursor: pointer;
            font-size: 2rem;
            color: #e2e8f0;
            transition: 0.2s;
        }
        .rating-input input:checked ~ label,
        .rating-input label:hover,
        .rating-input label:hover ~ label { color: #f59e0b; }

        /* File Input Modern */
        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 2rem;
            background: #f8fafc;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            color: var(--text-gray);
        }
        .file-input-label:hover { border-color: var(--primary-green); background: var(--soft-green); }

        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--dark-green);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .submit-btn:hover { background: var(--primary-green); transform: translateY(-2px); }

        /* Responsive */
        @media (max-width: 968px) {
            .stats-section { grid-template-columns: repeat(2, 1fr); }
            .page-hero h1 { font-size: 2.5rem; }
            .form-section { padding: 2rem; }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero">
        <h1>Testimoni Pengguna</h1>
        <p>Bergabunglah dengan ribuan pengguna yang telah mempercayakan pengecekan halal bersama kami.</p>
    </section>

    <div class="content-wrapper">
        <div class="stats-section">
            <div class="stat-card">
                <span class="stat-number">{{ $approvedTestimonials->count() }}</span>
                <span class="stat-label">Pengguna Puas</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">{{ $approvedTestimonials->count() > 0 ? number_format($approvedTestimonials->avg('rating'), 1) : '5.0' }}</span>
                <span class="stat-label">Rating Rata-rata</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">24/7</span>
                <span class="stat-label">Layanan Aktif</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">100%</span>
                <span class="stat-label">Data Akurat</span>
            </div>
        </div>

        @if($approvedTestimonials->count() > 0)
            <div class="testimonials-grid">
                @foreach($approvedTestimonials as $testimonial)
                    <div class="testimonial-card">
                        <i class="fa-solid fa-quote-right quote-icon"></i>
                        <div class="testimonial-header">
                            <div class="testimonial-avatar">
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                                @else
                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                @endif
                            </div>
                            <div class="testimonial-info">
                                <h4>{{ $testimonial->name }}</h4>
                                <div class="testimonial-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa-{{ $i <= $testimonial->rating ? 'solid' : 'regular' }} fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="testimonial-message">"{{ $testimonial->message }}"</p>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; background: white; padding: 5rem; border-radius: 30px; margin-bottom: 4rem;">
                <i class="fi fi-rr-comment-dots" style="font-size: 4rem; color: var(--primary-green); margin-bottom: 1rem; display: block;"></i>
                <h3>Belum Ada Testimoni</h3>
                <p style="color: var(--text-gray)">Jadilah orang pertama yang berbagi pengalaman positif!</p>
            </div>
        @endif

        <div class="form-section">
            <h2>Bagikan Pengalaman Anda</h2>

            @if(session('success'))
                <div style="background: #d1fae5; color: #065f46; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #a7f3d0;">
                    <i class="fa-solid fa-circle-check" style="margin-right: 10px;"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" placeholder="Contoh: Ahmad Fauzi" required>
                    </div>
                    <div class="form-group">
                        <label>Email Aktif</label>
                        <input type="email" name="email" placeholder="ahmad@email.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Berikan Rating Anda</label>
                    <div class="rating-input">
                        <input type="radio" id="star5" name="rating" value="5" required /><label for="star5"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"><i class="fa-solid fa-star"></i></label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Pesan Testimoni</label>
                    <textarea name="message" rows="4" placeholder="Tuliskan pengalaman Anda menggunakan layanan Cek Halal..." required></textarea>
                </div>

                <div class="form-group">
                    <label>Foto Profil (Opsional)</label>
                    <input type="file" name="image" id="imageInput" hidden onchange="updateFileName(this)">
                    <label for="imageInput" class="file-input-label" id="fileLabel">
                        <i class="fi fi-rr-camera"></i>
                        <span id="fileName">Klik untuk unggah foto</span>
                    </label>
                </div>

                <button type="submit" class="submit-btn">Kirim Testimoni Sekarang</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateFileName(input) {
            const fileName = input.files[0].name;
            document.getElementById('fileName').textContent = fileName;
            document.getElementById('fileLabel').style.background = '#e6fffa';
            document.getElementById('fileLabel').style.borderColor = '#2d8a6a';
        }
    </script>
@endpush