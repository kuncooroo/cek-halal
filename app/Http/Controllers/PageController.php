<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Produk;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function berita()
    {
        $beritas = Berita::latest()->get();
        return view('pages.berita', compact('beritas'));
    }

    public function beritaDetail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita-detail', compact('berita'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('pages.faq', compact('faqs'));
    }

    // Halaman Cek Produk (hanya menampilkan view)
    public function cekProduk()
    {
        return view('pages.cek-produk');
    }

    // Logika PENCARIAN (untuk AJAX)
    public function cariProduk(Request $request)
    {
        $tipe = $request->input('tipe');

        if ($tipe == 'scan') {
            $kode_produk = $request->input('kode_produk');
            $produk = Produk::where('kode_produk', $kode_produk)->first();

            if ($produk) {
                return response()->json(['data' => $produk]);
            }
        } 

        if ($tipe == 'input') {
            $query = Produk::query();

            if ($request->filled('nama_produk')) {
                $query->where('nama_produk', 'LIKE', '%' . $request->input('nama_produk') . '%');
            }
            if ($request->filled('nama_produsen')) {
                $query->where('nama_produsen', 'LIKE', '%' . $request->input('nama_produsen') . '%');
            }
            if ($request->filled('nomor_sertifikat')) {
                $query->where('nomor_sertifikat', $request->input('nomor_sertifikat'));
            }

            $produks = $query->get();

            if ($produks->isNotEmpty()) {
                return response()->json(['data' => $produks]);
            }
        }

        // Jika tidak ditemukan
        return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
    }
}