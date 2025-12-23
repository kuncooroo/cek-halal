<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('user')->latest()->paginate(10);
        
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul'             => 'required|string|max:255',
            'konten'            => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'status'            => 'required|in:draft,published',
        ]);


        Berita::create([
            'judul'             => $request->judul,
            'konten'            => $request->konten,
            'user_id'           => Auth::id(), 
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status'            => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'             => 'required|string|max:255',
            'konten'            => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'status'            => 'required|in:draft,published',
        ]);

        $berita = Berita::findOrFail($id);
        
        $berita->update([
            'judul'             => $request->judul,
            'konten'            => $request->konten,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status'            => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}