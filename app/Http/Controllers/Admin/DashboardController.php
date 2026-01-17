<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Testimoni;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalBerita = Berita::count();
        $totalFaq = Faq::count();
        $totalTestimoni = Testimoni::count();
        $totalPencarian = 0;
        $totalPengunjung = 0;

        $recentProduk = Produk::latest()
            ->take(5)
            ->get();

        $recentBerita = Berita::latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalBerita',
            'totalFaq',
            'totalTestimoni',
            'totalPencarian',
            'totalPengunjung',
            'recentProduk',
            'recentBerita'
        ));
    }
}
