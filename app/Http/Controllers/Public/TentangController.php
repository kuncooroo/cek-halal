<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Berita;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $stats = [
            'total_produk' => Produk::where('status', 'aktif')->count(),
            'total_produsen' => Produk::where('status', 'aktif')
                ->distinct('nama_produsen')
                ->count('nama_produsen'),
            'total_pengguna' => 100000, 
            'akurasi' => 99.9
        ];

        return view('public.tentang', compact('stats'));
    }
}