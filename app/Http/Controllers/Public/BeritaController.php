<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // Menggunakan whereDate agar berita hari ini langsung muncul tanpa peduli jam
        $query = Berita::with('penulis')
            ->where('status', 'published')
            ->whereDate('tanggal_publikasi', '<=', now()->toDateString());

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('konten', 'like', '%' . $search . '%');
            });
        }

        // Urutkan dari yang terbaru berdasarkan tanggal publikasi
        $beritas = $query->latest('tanggal_publikasi')->paginate(9);

        return view('public.berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::with('penulis')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereDate('tanggal_publikasi', '<=', now()->toDateString())
            ->firstOrFail();

        // Berita terkait (3 berita terbaru lainnya)
        $relatedBeritas = Berita::where('status', 'published')
            ->whereDate('tanggal_publikasi', '<=', now()->toDateString())
            ->where('id', '!=', $berita->id)
            ->latest('tanggal_publikasi')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('berita', 'relatedBeritas'));
    }
}