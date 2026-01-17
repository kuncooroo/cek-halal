@extends('layouts.public')

@section('title', 'Kontak Kami - Cek Halal Indonesia')

@push('styles')
    <style>
        :root {
            --primary-green: #2d8a6a;
            --secondary-green: #216a52;
            --accent-gold: #e9c46a;
            /* Warna sidebar emas */
            --text-muted: #718096;
        }

        /* Hero Section */
        .page-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1534723452862-4c874018d66d?q=80&w=2070');
            background-size: cover;
            background-position: center;
            padding: 8rem 2rem;
            text-align: left;
            color: white;
        }

        .page-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: -5rem auto 5rem;
            padding: 0 1.5rem;
            position: relative;
            z-index: 10;
        }

        /* Main Contact Card */
        .contact-card {
            background: white;
            border-radius: 20px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Form Section (Kiri) */
        .form-section {
            padding: 4rem;
        }

        .form-section h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: #1a202c;
        }

        .contact-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: #1a202c;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            background: #f7fafc;
            border: 1px solid #edf2f7;
            border-radius: 8px;
            font-family: inherit;
        }

        .submit-btn {
            background: var(--primary-green);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: var(--secondary-green);
            transform: translateY(-2px);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Info Sidebar (Kanan - Emas) */
        .info-sidebar {
            background: var(--accent-gold);
            padding: 4rem 3rem;
            color: #1a202c;
        }

        .info-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .info-item i {
            font-size: 1.5rem;
            color: #1a202c;
        }

        .info-item h4 {
            font-weight: 800;
            margin-bottom: 0.3rem;
        }

        .info-item p,
        .info-item a {
            font-size: 0.95rem;
            color: #1a202c;
            text-decoration: none;
        }

        /* Social Icons Khusus */
        .social-icons-box {
            margin-top: 3rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 2rem;
        }

        .social-icons-box p {
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .social-list {
            display: flex;
            gap: 0.8rem;
        }

        .social-list a {
            color: white;
            background: #1a202c;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .social-list a:hover {
            transform: translateY(-3px);
            background: var(--primary-green);
        }

        /* FAQ Section */
        .faq-cta {
            background: var(--primary-green);
            margin-top: 5rem;
            padding: 4rem 2rem;
            border-radius: 20px;
            text-align: center;
            color: white;
        }

        .btn-white {
            background: white;
            color: var(--primary-green);
            padding: 0.8rem 2.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-top: 1.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }

        .alert.success {
            background: #d4edda;
            color: #155724;
            display: block;
        }

        .alert.error {
            background: #f8d7da;
            color: #721c24;
            display: block;
        }

        @media (max-width: 968px) {
            .contact-card {
                grid-template-columns: 1fr;
            }

            .contact-form {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: span 1;
            }

            .page-hero h1 {
                font-size: 2.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero">
        <h1>Kontak Kami</h1>
    </section>

    <div class="content-wrapper">
        <div class="contact-card">
            <div class="form-section">
                <h2>Kirim Pesan</h2>
                <div id="alertBox" class="alert"></div>

                <form id="contactForm" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap *</label>
                        <input type="text" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" placeholder="nama@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="tel" name="telepon" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>Subjek *</label>
                        <select name="subjek" required>
                            <option value="">Pilih subjek</option>
                            <option value="pertanyaan">Pertanyaan Umum</option>
                            <option value="bantuan">Bantuan Teknis</option>
                            <option value="kerjasama">Kerjasama</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label>Pesan *</label>
                        <textarea name="pesan" rows="5" placeholder="Tuliskan pesan Anda..." required></textarea>
                    </div>
                    <div class="full-width">
                        <button type="submit" class="submit-btn" id="submitBtn">Kirim Pesan</button>
                    </div>
                </form>
            </div>

            <div class="info-sidebar">
                <div class="info-item">
                    <i class="fi fi-rr-marker"></i>
                    <div>
                        <h4>Alamat Kantor</h4>
                        <p>Jl. Halal Thayyib No. 123, Jakarta Pusat, DKI Jakarta 10110</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fi fi-rr-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <a href="mailto:info@cekhalal.id">info@cekhalal.id</a>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fi fi-rr-phone-call"></i>
                    <div>
                        <h4>Telepon</h4>
                        <p>+62 21 1234 5678</p>
                    </div>
                </div>

                <div class="social-icons-box">
                    <p>Ikuti Kami</p>
                    <div class="social-list">
                        <a href="#"><i class="fi fi-brands-facebook"></i></a>
                        <a href="#"><i class="fi fi-brands-instagram"></i></a>
                        <a href="#"><i class="fi fi-brands-whatsapp"></i></a>
                        <a href="#"><i class="fi fi-brands-twitter-alt-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-cta">
            <h3>Punya Pertanyaan?</h3>
            <p>Cek halaman FAQ kami untuk jawaban atas pertanyaan yang sering diajukan</p>
            <a href="{{ route('faq.index') }}" class="btn-white">Lihat FAQ</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const alertBox = document.getElementById('alertBox');

        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';

            const formData = new FormData(contactForm);

            fetch('{{ route("kontak.submit") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        alertBox.className = 'alert success';
                        alertBox.textContent = result.message;
                        alertBox.style.display = 'block';
                        contactForm.reset();
                    } else {
                        throw new Error(result.message);
                    }
                })
                .catch(err => {
                    alertBox.className = 'alert error';
                    alertBox.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                    alertBox.style.display = 'block';
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Kirim Pesan';
                });
        });
    </script>
@endpush