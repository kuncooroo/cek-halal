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
            ->whereDate('tanggal_publikasi', '<=', now()->toDateString());

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('konten', 'like', '%' . $search . '%');
            });
        }

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

        $relatedBeritas = Berita::where('status', 'published')
            ->whereDate('tanggal_publikasi', '<=', now()->toDateString())
            ->where('id', '!=', $berita->id)
            ->latest('tanggal_publikasi')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('berita', 'relatedBeritas'));
    }
}