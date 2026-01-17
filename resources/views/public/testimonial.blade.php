@extends('layouts.public')

@section('title', 'Testimoni - Cek Halal Indonesia')

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

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .stat-card {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        text-align: center;
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: #2d7b7b;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #666;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2.5rem;
        margin-bottom: 4rem;
    }

    .testimonial-card {
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s;
        position: relative;
    }

    .testimonial-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .quote-icon {
        position: absolute;
        top: 1.5rem;
        right: 2rem;
        font-size: 4rem;
        color: #e0f2f2;
        font-family: Georgia, serif;
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .testimonial-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        flex-shrink: 0;
        overflow: hidden;
    }

    .testimonial-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .testimonial-info h4 {
        color: #1a4444;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }

    .testimonial-rating {
        display: flex;
        gap: 0.2rem;
    }

    .star {
        color: #ffd700;
        font-size: 1.1rem;
    }

    .star.empty {
        color: #e0e0e0;
    }

    .testimonial-message {
        color: #666;
        font-size: 1rem;
        line-height: 1.8;
        font-style: italic;
    }

    .form-section {
        background: white;
        padding: 4rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-section h2 {
        color: #1a4444;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 800;
        text-align: center;
    }

    .form-section p {
        text-align: center;
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 3rem;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.8rem;
        color: #1a4444;
        font-weight: 600;
        font-size: 1rem;
    }

    .form-group input,
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
    .form-group textarea:focus {
        outline: none;
        border-color: #2d7b7b;
        box-shadow: 0 0 0 3px rgba(45, 123, 123, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 140px;
    }

    .rating-input {
        display: flex;
        gap: 0.5rem;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating-input input {
        display: none;
    }

    .rating-input label {
        cursor: pointer;
        font-size: 2rem;
        color: #e0e0e0;
        transition: color 0.2s;
    }

    .rating-input input:checked ~ label,
    .rating-input label:hover,
    .rating-input label:hover ~ label {
        color: #ffd700;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: -9999px;
    }

    .file-input-label {
        display: block;
        padding: 1.2rem;
        background: #f8f9fa;
        border: 2px dashed #2d7b7b;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .file-input-label:hover {
        background: #e0f2f2;
    }

    .file-input-label span {
        color: #2d7b7b;
        font-weight: 600;
    }

    .preview-image {
        margin-top: 1rem;
        max-width: 200px;
        border-radius: 10px;
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

    .alert {
        padding: 1.2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        font-weight: 500;
    }

    .alert.success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 2px solid #a5d6a7;
    }

    .no-testimonials {
        text-align: center;
        padding: 5rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .no-testimonials-icon {
        font-size: 6rem;
        margin-bottom: 1.5rem;
    }

    .no-testimonials h3 {
        color: #1a4444;
        font-size: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .no-testimonials p {
        color: #666;
        font-size: 1.1rem;
    }

    @media (max-width: 968px) {
        .testimonials-grid {
            grid-template-columns: 1fr;
        }

        .page-hero h1 {
            font-size: 2rem;
        }

        .form-section {
            padding: 2.5rem 2rem;
        }

        .stats-section {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .stats-section {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<section class="page-hero">
    <h1>Testimoni Pengguna</h1>
    <p>Apa kata mereka yang telah menggunakan layanan kami</p>
</section>

<div class="content-wrapper">
    <div class="stats-section">
        <div class="stat-card">
            <div class="stat-number">{{ $approvedTestimonials->count() }}</div>
            <div class="stat-label">Total Testimoni</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $approvedTestimonials->count() > 0 ? number_format($approvedTestimonials->avg('rating'), 1) : '0' }}</div>
            <div class="stat-label">Rating Rata-rata</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $approvedTestimonials->where('rating', 5)->count() }}</div>
            <div class="stat-label">Testimoni Bintang 5</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">100%</div>
            <div class="stat-label">Kepuasan Pengguna</div>
        </div>
    </div>

    @if($approvedTestimonials->count() > 0)
        <div class="testimonials-grid">
            @foreach($approvedTestimonials as $testimonial)
            <div class="testimonial-card">
                <div class="quote-icon">"</div>
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
                                <span class="star {{ $i <= $testimonial->rating ? '' : 'empty' }}">★</span>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="testimonial-message">"{{ $testimonial->message }}"</p>
            </div>
            @endforeach
        </div>
    @else
        <div class="no-testimonials">
            <div class="no-testimonials-icon">💬</div>
            <h3>Belum Ada Testimoni</h3>
            <p>Jadilah yang pertama memberikan testimoni!</p>
        </div>
    @endif

    <div class="form-section">
        <h2>Bagikan Pengalaman Anda</h2>
        <p>Ceritakan pengalaman Anda menggunakan layanan kami</p>

        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" id="testimonialForm">
            @csrf
            
            <div class="form-group">
                <label>Nama Lengkap *</label>
                <input type="text" name="name" placeholder="Masukkan nama lengkap Anda" required value="{{ old('name') }}">
                @error('name')
                    <small style="color: #c62828;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" placeholder="nama@email.com" required value="{{ old('email') }}">
                @error('email')
                    <small style="color: #c62828;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Rating *</label>
                <div class="rating-input">
                    <input type="radio" id="star5" name="rating" value="5" required />
                    <label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1">★</label>
                </div>
                @error('rating')
                    <small style="color: #c62828;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Testimoni *</label>
                <textarea name="message" placeholder="Ceritakan pengalaman Anda..." required>{{ old('message') }}</textarea>
                @error('message')
                    <small style="color: #c62828;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Foto (Opsional)</label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(event)">
                    <label for="imageInput" class="file-input-label">
                        <span>📷 Pilih Foto</span>
                    </label>
                </div>
                <img id="imagePreview" class="preview-image" style="display: none;">
                @error('image')
                    <small style="color: #c62828;">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Kirim Testimoni</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('imagePreview');
        
        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    setTimeout(function() {
        const alert = document.querySelector('.alert.success');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>
@endpush