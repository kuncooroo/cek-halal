@extends('layouts.public')

@section('title', 'FAQ - Pertanyaan Yang Sering Diajukan')

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
        max-width: 1000px;
        margin: 0 auto;
        padding: 5rem 2rem;
    }

    /* Search Box */
    .search-faq {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .search-input {
        width: 100%;
        padding: 1.2rem 1.5rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: 'Poppins', sans-serif;
    }

    .search-input:focus {
        outline: none;
        border-color: #2d7b7b;
        box-shadow: 0 0 0 3px rgba(45, 123, 123, 0.1);
    }

    /* FAQ Sections */
    .faq-section {
        background: white;
        border-radius: 15px;
        padding: 2.5rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-bottom: 2.5rem;
    }

    .faq-category-title {
        color: #1a4444;
        font-size: 1.8rem;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #2d7b7b;
        font-weight: 800;
    }

    .faq-item {
        border-bottom: 2px solid #f0f0f0;
        padding: 1.8rem 0;
    }

    .faq-item:last-child {
        border-bottom: none;
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-weight: 600;
        color: #1a4444;
        font-size: 1.1rem;
        gap: 1.5rem;
        transition: color 0.3s;
    }

    .faq-question:hover {
        color: #2d7b7b;
    }

    .faq-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: transform 0.3s;
        flex-shrink: 0;
    }

    .faq-item.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        color: #666;
        line-height: 1.8;
    }

    .faq-answer-content {
        padding-top: 1.5rem;
        font-size: 1rem;
    }

    .faq-item.active .faq-answer {
        max-height: 600px;
    }

    /* Help Section */
    .help-section {
        background: linear-gradient(135deg, #2d7b7b 0%, #1e5555 100%);
        color: white;
        padding: 4rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    }

    .help-section h3 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 800;
    }

    .help-section p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
    }

    .help-btn {
        padding: 1.2rem 3rem;
        background: white;
        color: #2d7b7b;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .help-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .no-results {
        text-align: center;
        padding: 3rem;
        color: #999;
    }

    @media (max-width: 768px) {
        .page-hero h1 {
            font-size: 2rem;
        }

        .faq-question {
            font-size: 1rem;
        }

        .faq-section {
            padding: 2rem;
        }

        .help-section {
            padding: 3rem 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <h1>Pertanyaan Yang Sering Diajukan</h1>
    <p>Temukan jawaban atas pertanyaan Anda seputar sertifikasi halal</p>
</section>

<div class="content-wrapper">
    <!-- Search FAQ -->
    <div class="search-faq">
        <input type="text" class="search-input" id="searchFaq" placeholder="🔍 Cari pertanyaan atau jawaban...">
    </div>

    @if($faqs->count() > 0)
        @foreach($faqGroups as $categoryName => $categoryFaqs)
            @if($categoryFaqs->count() > 0)
            <div class="faq-section" data-category="{{ $categoryName }}">
                <h2 class="faq-category-title">{{ $categoryName }}</h2>
                
                @foreach($categoryFaqs as $faq)
                <div class="faq-item" data-faq-id="{{ $faq->id }}">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>{{ $faq->pertanyaan }}</span>
                        <span class="faq-icon">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            {{ $faq->jawaban }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @endforeach
    @else
        <div class="faq-section">
            <div class="no-results">
                <h3>Belum Ada FAQ</h3>
                <p>FAQ akan segera ditambahkan. Silakan kembali lagi nanti.</p>
            </div>
        </div>
    @endif

    <!-- Help Section -->
    <div class="help-section">
        <h3>Masih Ada Pertanyaan?</h3>
        <p>Tim kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
        <a href="{{ route('kontak.index') }}" class="help-btn">Hubungi Kami</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleFAQ(element) {
        const faqItem = element.parentElement;
        const isActive = faqItem.classList.contains('active');
        
        // Close all other FAQ items
        document.querySelectorAll('.faq-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // Toggle current item
        if (!isActive) {
            faqItem.classList.add('active');
        }
    }

    // Search functionality
    const searchInput = document.getElementById('searchFaq');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const faqItems = document.querySelectorAll('.faq-item');
        const faqSections = document.querySelectorAll('.faq-section');
        
        if (searchTerm === '') {
            faqSections.forEach(section => section.style.display = 'block');
            faqItems.forEach(item => item.style.display = 'block');
            return;
        }
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer-content').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // Hide sections with no visible items
        faqSections.forEach(section => {
            const visibleItems = section.querySelectorAll('.faq-item[style="display: block;"]');
            if (visibleItems.length === 0) {
                section.style.display = 'none';
            } else {
                section.style.display = 'block';
            }
        });
    });
</script>
@endpush