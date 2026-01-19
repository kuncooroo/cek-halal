@extends('layouts.public')

@section('title', 'FAQ - Pertanyaan Yang Sering Diajukan')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')

    <div class="relative pt-32 pb-12 text-center overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[radial-gradient(circle,rgba(30,136,229,0.05)_0%,transparent_70%)] -z-10 pointer-events-none rounded-full"></div>

        <div class="container px-5 max-w-4xl"> 
            <h1 class="text-3xl md:text-5xl font-extrabold text-navy mb-4 tracking-tight leading-tight">
                Pertanyaan Yang Sering Diajukan
            </h1>
            <p class="text-lg text-gray-text max-w-2xl mx-auto leading-relaxed">
                Cari jawaban instan untuk pertanyaan Anda seputar layanan dan sertifikasi halal kami.
            </p>
        </div>
    </div>

    <div class="px-5 mb-16 relative z-10">
        <div class="container max-w-2xl">
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-primary text-lg group-focus-within:text-blue-600 transition-colors"></i>
                </div>
                <input type="text" id="searchFaq" 
                    class="block w-full pl-14 pr-6 py-4 bg-white border border-gray-200 rounded-full text-navy placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-blue-500/10 shadow-[0_10px_30px_rgba(30,136,229,0.08)] transition-all duration-300"
                    placeholder="Ketik kata kunci pertanyaan (misal: Biaya, Syarat)...">
            </div>
        </div>
    </div>

    <div class="pb-24 px-5">
        <div class="container max-w-4xl"> 
            
            @if ($faqs->count() > 0)
                @foreach ($faqGroups as $categoryName => $categoryFaqs)
                    @if ($categoryFaqs->count() > 0)
                        <div class="faq-section mb-10" data-category="{{ $categoryName }}">
                            <h2 class="text-xl md:text-2xl font-bold text-navy mb-6 pl-4 border-l-4 border-primary">
                                {{ $categoryName }}
                            </h2>

                            <div class="space-y-4">
                                @foreach ($categoryFaqs as $faq)
                                    <div class="faq-item group bg-white border border-gray-100 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-md hover:border-blue-200" 
                                         data-faq-id="{{ $faq->id }}">
                                        
                                        <button class="faq-question w-full flex justify-between items-center p-6 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                            <span class="font-bold text-navy text-lg pr-4 group-hover:text-primary transition-colors">
                                                {{ $faq->pertanyaan }}
                                            </span>
                                            <div class="faq-icon w-8 h-8 rounded-full bg-blue-50 text-primary flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary group-hover:text-white">
                                                <i class="fa-solid fa-chevron-down text-sm transition-transform duration-300"></i>
                                            </div>
                                        </button>

                                        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white">
                                            <div class="p-6 pt-2 text-gray-text leading-relaxed border-t border-dashed border-gray-100">
                                                {!! $faq->jawaban !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="text-center py-16 text-gray-400">
                    <i class="fa-regular fa-folder-open text-5xl mb-4 text-gray-300"></i>
                    <h3 class="text-xl font-bold text-navy">Belum Ada FAQ</h3>
                    <p>Pertanyaan umum akan segera ditambahkan.</p>
                </div>
            @endif

            <div class="mt-16 relative bg-gradient-to-br from-primary to-blue-400 rounded-[24px] p-10 md:p-12 text-center text-white overflow-hidden shadow-xl shadow-blue-500/20">
                <div class="absolute top-0 right-0 w-48 h-full bg-white/10 -skew-x-[20deg] translate-x-20 pointer-events-none"></div>

                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-extrabold mb-3">Masih butuh bantuan?</h3>
                    <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                        Jika Anda tidak menemukan jawaban yang Anda cari, tim kami siap membantu Anda secara langsung.
                    </p>
                    <a href="{{ route('kontak.index') }}" 
                       class="inline-flex items-center gap-2 bg-white text-primary px-8 py-3.5 rounded-full font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <i class="fa-regular fa-envelope"></i> Hubungi Kami
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function toggleFAQ(button) {
            const faqItem = button.parentElement;
            const answer = faqItem.querySelector('.faq-answer');
            const icon = faqItem.querySelector('.faq-icon i');
            const iconWrapper = faqItem.querySelector('.faq-icon');
            
            const isActive = faqItem.classList.contains('active');

            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active', 'border-primary', 'shadow-lg');
                    item.classList.add('border-gray-100');
                    item.querySelector('.faq-answer').style.maxHeight = null;
                    
                    const otherIcon = item.querySelector('.faq-icon i');
                    const otherIconWrapper = item.querySelector('.faq-icon');
                    otherIcon.style.transform = 'rotate(0deg)';
                    otherIconWrapper.classList.remove('bg-primary', 'text-white');
                    otherIconWrapper.classList.add('bg-blue-50', 'text-primary');
                }
            });

            if (!isActive) {
                faqItem.classList.add('active', 'border-primary', 'shadow-lg'); 
                faqItem.classList.remove('border-gray-100');
                answer.style.maxHeight = answer.scrollHeight + "px";
                
                icon.style.transform = 'rotate(180deg)';
                iconWrapper.classList.remove('bg-blue-50', 'text-primary');
                iconWrapper.classList.add('bg-primary', 'text-white');
            } else {
                faqItem.classList.remove('active', 'border-primary', 'shadow-lg');
                faqItem.classList.add('border-gray-100');
                answer.style.maxHeight = null;
                
                icon.style.transform = 'rotate(0deg)';
                iconWrapper.classList.remove('bg-primary', 'text-white');
                iconWrapper.classList.add('bg-blue-50', 'text-primary');
            }
        }

        const searchInput = document.getElementById('searchFaq');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const faqItems = document.querySelectorAll('.faq-item');
                const faqSections = document.querySelectorAll('.faq-section');

                if (searchTerm === '') {
                    faqSections.forEach(section => section.style.display = 'block');
                    faqItems.forEach(item => {
                        item.style.display = 'block';
                        item.classList.remove('active', 'border-primary', 'shadow-lg');
                        item.classList.add('border-gray-100');
                        item.querySelector('.faq-answer').style.maxHeight = null;
                        item.querySelector('.faq-icon i').style.transform = 'rotate(0deg)';
                        const iconWrapper = item.querySelector('.faq-icon');
                        iconWrapper.classList.remove('bg-primary', 'text-white');
                        iconWrapper.classList.add('bg-blue-50', 'text-primary');
                    });
                    return;
                }

                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question span').textContent.toLowerCase();
                    const answerDiv = item.querySelector('.faq-answer div'); 
                    const answer = answerDiv ? (answerDiv.textContent || answerDiv.innerText) : '';

                    if (question.includes(searchTerm) || answer.toLowerCase().includes(searchTerm)) {
                        item.style.display = 'block';
                        if (!item.classList.contains('active')) {
                            item.classList.add('active', 'border-primary', 'shadow-lg');
                            item.classList.remove('border-gray-100');
                            const ans = item.querySelector('.faq-answer');
                            ans.style.maxHeight = ans.scrollHeight + "px";
                            
                            item.querySelector('.faq-icon i').style.transform = 'rotate(180deg)';
                            const iconWrap = item.querySelector('.faq-icon');
                            iconWrap.classList.remove('bg-blue-50', 'text-primary');
                            iconWrap.classList.add('bg-primary', 'text-white');
                        }
                    } else {
                        item.style.display = 'none';
                        item.classList.remove('active', 'border-primary', 'shadow-lg');
                        item.classList.add('border-gray-100');
                        item.querySelector('.faq-answer').style.maxHeight = null;
                    }
                });

                faqSections.forEach(section => {
                    const visibleItems = section.querySelectorAll('.faq-item[style="display: block;"]');
                    if (visibleItems.length === 0) {
                        section.style.display = 'none';
                    } else {
                        section.style.display = 'block';
                    }
                });
            });
        }
    </script>
@endpush