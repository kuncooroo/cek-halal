<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukHalal;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = ProdukHalal::latest()->get();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|unique:produk_halal',
            'nama_produk' => 'required|string|max:255',
            'nama_produsen' => 'required|string|max:255',
            'nomor_sertifikat' => 'required|string|max:100',
            'tanggal_terbit' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
        ]);

        ProdukHalal::create($validated);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(ProdukHalal $produk)
    {
        // $produk sudah otomatis diambil berdasarkan ID dari route
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, ProdukHalal $produk)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|unique:produk_halal,kode_produk,' . $produk->id,
            'nama_produk' => 'required|string|max:255',
            'nama_produsen' => 'required|string|max:255',
            'nomor_sertifikat' => 'required|string|max:100',
            'tanggal_terbit' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
        ]);

        $produk->update($validated);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(ProdukHalal $produk)
    {
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Fungsi show() tidak kita pakai, jadi bisa dikosongkan/dihapus
    public function show(ProdukHalal $produk) 
    {
        abort(404);
    }
}