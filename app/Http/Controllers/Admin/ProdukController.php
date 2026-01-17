<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('nama_produsen', 'like', "%{$search}%")
                    ->orWhere('nomor_sertifikat_halal', 'like', "%{$search}%")
                    ->orWhere('barcode', 'like', "%{$search}%");
            });
        }

        $produks = $query->latest()->paginate(10);

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_produk' => 'required|string|max:255',
                'nama_produsen' => 'required|string|max:255',
                'nomor_sertifikat_halal' => 'required|string|max:100|unique:produks,nomor_sertifikat_halal',
                'barcode' => 'nullable|string|max:100|unique:produks,barcode',
                'tanggal_terbit' => 'required|date',
                'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
                'kategori_id' => 'nullable|exists:kategoris,id',
                'deskripsi' => 'nullable|string',
                'status' => 'required|in:aktif,tidak_aktif',
            ],
            [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'nama_produsen.required' => 'Nama produsen wajib diisi.',
                'nomor_sertifikat_halal.required' => 'Nomor sertifikat halal wajib diisi.',
                'nomor_sertifikat_halal.unique' => 'Nomor sertifikat halal sudah digunakan.',
                'barcode.required' => 'Bardcode wajib diisi.',
                'barcode.unique' => 'Barcode sudah digunakan.',
                'tanggal_terbit.required' => 'Tanggal terbit wajib diisi.',
                'tanggal_kadaluarsa.required' => 'Tanggal kadaluarsa wajib diisi.',
                'tanggal_kadaluarsa.after_or_equal' => 'Tanggal kadaluarsa tidak boleh lebih awal dari tanggal terbit.',
                'kategori_id.exists' => 'Kategori tidak valid.',
                'status.required' => 'Status produk wajib dipilih.',
            ]
        );

        $produk = Produk::create($validated);

        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();
        
        if ($user) {
            $user->notify(new AdminNotification(
                'Produk baru "' . $produk->nama_produk . '" berhasil ditambahkan.',
                'medium', 
                route('admin.produk.index')
            ));
        }

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        $kategoris = Kategori::all();

        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate(
            [
                'nama_produk' => 'required|string|max:255',
                'nama_produsen' => 'required|string|max:255',
                'nomor_sertifikat_halal' => 'required|string|max:100|unique:produks,nomor_sertifikat_halal,' . $produk->id,
                'barcode' => 'nullable|string|max:100|unique:produks,barcode,' . $produk->id,
                'tanggal_terbit' => 'required|date',
                'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_terbit',
                'kategori_id' => 'nullable|exists:kategoris,id',
                'deskripsi' => 'nullable|string',
                'status' => 'required|in:aktif,tidak_aktif',
            ],
            [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'nama_produsen.required' => 'Nama produsen wajib diisi.',
                'nomor_sertifikat_halal.required' => 'Nomor sertifikat halal wajib diisi.',
                'nomor_sertifikat_halal.unique' => 'Nomor sertifikat halal sudah digunakan.',
                'barcode.unique' => 'Barcode sudah digunakan.',
                'tanggal_terbit.required' => 'Tanggal terbit wajib diisi.',
                'tanggal_kadaluarsa.required' => 'Tanggal kadaluarsa wajib diisi.',
                'tanggal_kadaluarsa.after_or_equal' => 'Tanggal kadaluarsa tidak boleh lebih awal dari tanggal terbit.',
                'kategori_id.exists' => 'Kategori tidak valid.',
                'status.required' => 'Status produk wajib dipilih.',
            ]
        );

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