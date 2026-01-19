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
        $stats = [
            'total_produk' => Produk::where('status', 'aktif')->count(),
            'total_produsen' => Produk::where('status', 'aktif')->distinct('nama_produsen')->count('nama_produsen'),
        ];

        return view('public.produk', compact('stats'));
    }

    public function search(Request $request)
    {
        $searchType = $request->input('search_type');
        $searchValue = $request->input('search_value');

        if (!$searchValue) {
            return response()->json([
                'success' => false, 
                'message' => 'Silakan masukkan kata kunci atau scan barcode.'
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
                $query->where('nomor_sertifikat_halal', 'like', '%' . $searchValue . '%');
                break;
                
            case 'barcode':
                $query->where('barcode', $searchValue);
                break;
                
            default:
                $query->where('nama_produk', 'like', '%' . $searchValue . '%');
                break;
        }

        $products = $query->limit(50)->orderBy('nama_produk', 'asc')->get();

        if ($products->count() > 0) {
            $data = $products->map(function ($item) {
                $tglTerbit = $item->tanggal_terbit ? Carbon::parse($item->tanggal_terbit) : null;
                $tglKadaluarsa = $item->tanggal_kadaluarsa ? Carbon::parse($item->tanggal_kadaluarsa) : null;
                
                $isExpired = $tglKadaluarsa ? $tglKadaluarsa->isPast() : false;

                return [
                    'nama_produk' => $item->nama_produk,
                    'nama_produsen' => $item->nama_produsen,
                    'nomor_sertifikat' => $item->nomor_sertifikat_halal,
                    'barcode' => $item->barcode, 
                    'tanggal_terbit' => $tglTerbit ? $tglTerbit->format('d F Y') : '-',
                    'tanggal_kadaluarsa' => $tglKadaluarsa ? $tglKadaluarsa->format('d F Y') : '-',
                    'is_expired' => $isExpired,
                    'status_label' => $isExpired ? 'Kadaluarsa' : 'Halal'
                ];
            });

            return response()->json([
                'success' => true,
                'found' => true,
                'data' => $data 
            ]);
        }

        return response()->json([
            'success' => true, 
            'found' => false, 
            'message' => 'Produk tidak ditemukan di database kami.'
        ]);
    }
}