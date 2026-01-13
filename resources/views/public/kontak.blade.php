@extends('layouts.public')

@section('title', 'Kontak Kami - Cek Halal Indonesia')

@push('styles')
<style>
    .page-hero {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        padding: 4rem 3rem 3rem;
        text-align: center;
        color: white;
    }

    .page-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .page-hero p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }

    .content-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 5rem 3rem;
    }

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
    }

    /* Contact Form */
    .contact-form {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .contact-form h2 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 2rem;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 1.8rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.8rem;
        color: #1a4444;
        font-weight: 600;
        font-size: 1rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 1.2rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #2d7b7b;
        box-shadow: 0 0 0 3px rgba(45, 123, 123, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 140px;
    }

    .submit-btn {
        width: 100%;
        padding: 1.3rem;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(45, 123, 123, 0.3);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Contact Info */
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .info-card {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        display: flex;
        gap: 2rem;
        align-items: flex-start;
        transition: all 0.3s;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .info-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .info-content h3 {
        color: #1a4444;
        font-size: 1.4rem;
        margin-bottom: 0.8rem;
        font-weight: 700;
    }

    .info-content p {
        color: #666;
        font-size: 1rem;
        line-height: 1.8;
    }

    .info-content a {
        color: #2d7b7b;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .info-content a:hover {
        color: #1e5555;
        text-decoration: underline;
    }

    /* Social Media */
    .social-section {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        text-align: center;
        margin-bottom: 4rem;
    }

    .social-section h3 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 1rem;
        font-weight: 800;
    }

    .social-section p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 2.5rem;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .social-btn {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .social-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .social-btn.facebook {
        background: #1877f2;
        color: white;
    }

    .social-btn.instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        color: white;
    }

    .social-btn.twitter {
        background: #1da1f2;
        color: white;
    }

    .social-btn.whatsapp {
        background: #25d366;
        color: white;
    }

    /* FAQ Quick Links */
    .faq-quick {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        padding: 4rem;
        border-radius: 20px;
        text-align: center;
    }

    .faq-quick h3 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 800;
    }

    .faq-quick p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
    }

    .faq-btn {
        padding: 1.2rem 3rem;
        background: white;
        color: #2d7b7b;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .faq-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .alert {
        padding: 1.2rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        display: none;
        font-weight: 500;
    }

    .alert.success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 2px solid #a5d6a7;
        display: block;
    }

    .alert.error {
        background: #ffebee;
        color: #c62828;
        border: 2px solid #ef9a9a;
        display: block;
    }

    @media (max-width: 968px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .social-links {
            flex-direction: column;
            align-items: stretch;
        }

        .social-btn {
            justify-content: center;
        }

        .page-hero h1 {
            font-size: 2rem;
        }

        .contact-form,
        .social-section,
        .faq-quick {
            padding: 2.5rem 2rem;
        }

        .info-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <h1>Hubungi Kami</h1>
    <p>Kami siap membantu Anda. Silakan hubungi kami melalui formulir atau kontak di bawah ini</p>
</section>

<div class="content-wrapper">
    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <div id="alertBox" class="alert"></div>
            <form id="contactForm">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap *</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" required>
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
                        <option value="laporan">Laporan Masalah</option>
                        <option value="saran">Saran & Masukan</option>
                        <option value="kerjasama">Kerjasama</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pesan *</label>
                    <textarea name="pesan" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="submit-btn" id="submitBtn">Kirim Pesan</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-card">
                <div class="info-icon">📍</div>
                <div class="info-content">
                    <h3>Alamat Kantor</h3>
                    <p>
                        Jl. Halal Thayyib No. 123<br>
                        Jakarta Pusat, DKI Jakarta 10110<br>
                        Indonesia
                    </p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon">📧</div>
                <div class="info-content">
                    <h3>Email</h3>
                    <p>
                        Umum: <a href="mailto:info@cekhalal.id">info@cekhalal.id</a><br>
                        Support: <a href="mailto:support@cekhalal.id">support@cekhalal.id</a><br>
                        Kerjasama: <a href="mailto:partnership@cekhalal.id">partnership@cekhalal.id</a>
                    </p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon">📞</div>
                <div class="info-content">
                    <h3>Telepon</h3>
                    <p>
                        Hotline: <a href="tel:+622112345678">+62 21 1234 5678</a><br>
                        WhatsApp: <a href="https://wa.me/628123456789" target="_blank">+62 812 3456 789</a><br>
                        Senin - Jumat: 09:00 - 17:00 WIB
                    </p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon">⏰</div>
                <div class="info-content">
                    <h3>Jam Operasional</h3>
                    <p>
                        Senin - Jumat: 09:00 - 17:00 WIB<br>
                        Sabtu: 09:00 - 14:00 WIB<br>
                        Minggu & Libur: Tutup
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="social-section">
        <h3>Ikuti Kami di Media Sosial</h3>
        <p>Dapatkan update terbaru seputar sertifikasi halal dan informasi menarik lainnya</p>
        <div class="social-links">
            <a href="#" class="social-btn facebook">
                <span>📘</span>
                <span>Facebook</span>
            </a>
            <a href="#" class="social-btn instagram">
                <span>📷</span>
                <span>Instagram</span>
            </a>
            <a href="#" class="social-btn twitter">
                <span>🐦</span>
                <span>Twitter</span>
            </a>
            <a href="#" class="social-btn whatsapp">
                <span>💬</span>
                <span>WhatsApp</span>
            </a>
        </div>
    </div>

    <!-- FAQ Quick Link -->
    <div class="faq-quick">
        <h3>Punya Pertanyaan?</h3>
        <p>Cek halaman FAQ kami untuk jawaban atas pertanyaan yang sering diajukan</p>
        <a href="{{ route('faq.index') }}" class="faq-btn">Lihat FAQ</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const alertBox = document.getElementById('alertBox');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Disable button
        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';
        
        // Get form data
        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData.entries());
        
        // Send AJAX request
        fetch('{{ route("kontak.submit") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Show success message
                alertBox.className = 'alert success';
                alertBox.textContent = result.message;
                
                // Reset form
                contactForm.reset();
                
                // Hide alert after 5 seconds
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 5000);
            } else {
                throw new Error(result.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            // Show error message
            alertBox.className = 'alert error';
            alertBox.textContent = 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
            console.error('Error:', error);
        })
        .finally(() => {
            // Re-enable button
            submitBtn.disabled = false;
            submitBtn.textContent = 'Kirim Pesan';
            
            // Scroll to alert
            alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });
</script>
@endpush