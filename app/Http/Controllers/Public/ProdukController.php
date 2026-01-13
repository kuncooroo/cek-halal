<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProdukController extends Controller
{
    public function index()
    {
        return view('public.produk');
    }

    public function search(Request $request)
    {
        $searchType = $request->input('search_type'); // nama_produk, nama_produsen, nomor_sertifikat, barcode
        $searchValue = $request->input('search_value');

        if (!$searchValue) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan masukkan kata kunci pencarian'
            ]);
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
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Tipe pencarian tidak valid'
                ]);
        }

        $produk = $query->first();

        if ($produk) {
            // Cek apakah sertifikat masih berlaku
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

        return response()->json([
            'success' => true,
            'found' => false,
            'message' => 'Produk tidak ditemukan dalam database sertifikasi halal'
        ]);
    }

    public function scanBarcode(Request $request)
    {
        $barcode = $request->input('barcode');

        if (!$barcode) {
            return response()->json([
                'success' => false,
                'message' => 'Barcode tidak valid'
            ]);
        }

        $produk = Produk::where('barcode', $barcode)
            ->where('status', 'aktif')
            ->first();

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

        return response()->json([
            'success' => true,
            'found' => false,
            'message' => 'Produk dengan barcode ini tidak ditemukan'
        ]);
    }
}