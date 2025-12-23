<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('nama_produk', 'like', "%{$search}%")
                ->orWhere('nama_produsen', 'like', "%{$search}%")
                ->orWhere('nomor_sertifikat_halal', 'like', "%{$search}%")
                ->orWhere('barcode', 'like', "%{$search}%");
        }

        $produks = $query->latest()->paginate(10);

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'nama_produsen' => 'required|string|max:255',
            'nomor_sertifikat_halal' => 'required|string|max:100|unique:produks,nomor_sertifikat_halal',
            'barcode' => 'nullable|string|max:100|unique:produks,barcode',
            'tanggal_terbit' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        Produk::create($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'nama_produsen' => 'required|string|max:255',
            'nomor_sertifikat_halal' =>
            'required|string|max:100|unique:produks,nomor_sertifikat_halal,' . $produk->id,
            'barcode' =>
            'nullable|string|max:100|unique:produks,barcode,' . $produk->id,
            'tanggal_terbit' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $produk->update($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
