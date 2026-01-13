<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Statistik untuk homepage
        $totalProduk = Produk::where('status', 'aktif')->count();
        $totalProdusen = Produk::where('status', 'aktif')
            ->distinct('nama_produsen')
            ->count('nama_produsen');
        
        // Berita terbaru untuk preview
        $beritas = Berita::where('status', 'published')
            ->latest('tanggal_publikasi')
            ->take(3)
            ->get();

        return view('public.home', compact('totalProduk', 'totalProdusen', 'beritas'));
    }
}
