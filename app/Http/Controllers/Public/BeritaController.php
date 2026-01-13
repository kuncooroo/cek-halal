<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('penulis')
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now());

        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('konten', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan kategori (jika ada sistem kategori berita)
        if ($request->filled('kategori')) {
            // Implementasi filter kategori jika diperlukan
            // $query->where('kategori', $request->kategori);
        }

        $beritas = $query->latest('tanggal_publikasi')->paginate(9);
        
        // Berita featured (terbaru)
        $featuredBerita = Berita::where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->latest('tanggal_publikasi')
            ->first();

        return view('public.berita.index', compact('beritas', 'featuredBerita'));
    }

    public function show($slug)
    {
        $berita = Berita::with('penulis')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->firstOrFail();

        // Berita terkait
        $relatedBeritas = Berita::where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->where('id', '!=', $berita->id)
            ->latest('tanggal_publikasi')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('berita', 'relatedBeritas'));
    }
}