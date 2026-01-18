<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // 1. Tangkap semua inputan dari form Home
        $querySearch = $request->input('q');
        $produsen = $request->input('produsen');
        $nomorSertifikat = $request->input('no');

        $produk = null;

        // 2. Jika ada salah satu input, jalankan pencarian otomatis saat halaman dimuat
        if ($querySearch || $produsen || $nomorSertifikat) {
            $query = Produk::where('status', 'aktif');

            if ($querySearch) {
                $query->where('nama_produk', 'like', '%' . $querySearch . '%');
            }
            if ($produsen) {
                $query->where('nama_produsen', 'like', '%' . $produsen . '%');
            }
            if ($nomorSertifikat) {
                $query->where('nomor_sertifikat_halal', $nomorSertifikat);
            }

            // Kita ambil hasil pertama untuk ditampilkan detailnya
            $produk = $query->first();

            if ($produk) {
                // Tambahkan attribute status_halal secara dinamis
                $tanggalKadaluarsa = Carbon::parse($produk->tanggal_kadaluarsa);
                $produk->is_expired = $tanggalKadaluarsa->isPast();
                $produk->label_status = $produk->is_expired ? 'Kadaluarsa' : 'Aktif';
            }
        }

        // 3. Kirim data ke view agar bisa autofill di input form
        return view('public.produk', [
            'produk' => $produk,
            'old_q' => $querySearch,
            'old_produsen' => $produsen,
            'old_no' => $nomorSertifikat
        ]);
    }

    // Fungsi search (AJAX) tetap dipertahankan jika kamu butuh pencarian tanpa reload di halaman produk
    public function search(Request $request)
    {
        $searchType = $request->input('search_type');
        $searchValue = $request->input('search_value');

        if (!$searchValue) {
            return response()->json(['success' => false, 'message' => 'Silakan masukkan kata kunci']);
        }

        $query = Produk::where('status', 'aktif');

        switch ($searchType) {
            case 'nama_produk':
                $query->where('nama_produk', 'like', '%' . $searchValue . '%');
                break;
            case 'nama_produsen':
                $query->where('nama_produsen', 'like', '%' . $searchValue . '%');
                break;
            case 'nomor_sertifikat':
                $query->where('nomor_sertifikat_halal', $searchValue);
                break;
            case 'barcode':
                $query->where('barcode', $searchValue);
                break;
        }

        $produk = $query->first();

        if ($produk) {
            $tanggalKadaluarsa = Carbon::parse($produk->tanggal_kadaluarsa);
            $isExpired = $tanggalKadaluarsa->isPast();

            return response()->json([
                'success' => true,
                'found' => true,
                'data' => [
                    'nama_produk' => $produk->nama_produk,
                    'nama_produsen' => $produk->nama_produsen,
                    'nomor_sertifikat' => $produk->nomor_sertifikat_halal,
                    'tanggal_terbit' => Carbon::parse($produk->tanggal_terbit)->format('d F Y'),
                    'tanggal_kadaluarsa' => $tanggalKadaluarsa->format('d F Y'),
                    'status_sertifikat' => $isExpired ? 'Kadaluarsa' : 'Aktif',
                    'is_expired' => $isExpired,
                    'kategori' => $produk->kategori ? $produk->kategori->nama_kategori : '-',
                    'deskripsi' => $produk->deskripsi
                ]
            ]);
        }

        return response()->json(['success' => true, 'found' => false, 'message' => 'Produk tidak ditemukan']);
    }

    // Scan Barcode tetap sama
    public function scanBarcode(Request $request)
    {
        $barcode = $request->input('barcode');
        if (!$barcode)
            return response()->json(['success' => false, 'message' => 'Barcode tidak valid']);

        $produk = Produk::where('barcode', $barcode)->where('status', 'aktif')->first();

        if ($produk) {
            $tanggalKadaluarsa = Carbon::parse($produk->tanggal_kadaluarsa);
            return response()->json([
                'success' => true,
                'found' => true,
                'data' => [
                    'nama_produk' => $produk->nama_produk,
                    'status_sertifikat' => $tanggalKadaluarsa->isPast() ? 'Kadaluarsa' : 'Aktif',
                    // ... data lainnya
                ]
            ]);
        }

        return response()->json(['success' => true, 'found' => false, 'message' => 'Barcode tidak terdaftar']);
    }
}