<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('pertanyaan', 'like', '%' . $search . '%')
                  ->orWhere('jawaban', 'like', '%' . $search . '%');
            });
        }

        $faqs = $query->latest()->get();

        $faqGroups = [
            'Tentang Platform' => $faqs->take(3),
            'Cara Penggunaan' => $faqs->skip(3)->take(3),
            'Sertifikasi Halal' => $faqs->skip(6)->take(4),
            'Teknis' => $faqs->skip(10)->take(3),
        ];

        return view('public.faq', compact('faqs', 'faqGroups'));
    }
}