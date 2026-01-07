<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    public function index(Request $request)
    {
        $query = Penulis::withCount('beritas');

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $penulis = $query->latest()->paginate(10);

        return view('admin.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('admin.penulis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama'  => 'required|string|max:100',
                'email' => 'nullable|email|unique:penulis,email',
                'bio'   => 'nullable|string',
                'foto'  => 'nullable|image|max:2048',
                'aktif' => 'required|boolean',
            ],
            [
                'nama.required'  => 'Nama penulis wajib diisi.',
                'nama.max'       => 'Nama penulis maksimal 100 karakter.',

                'email.email'    => 'Format email tidak valid.',
                'email.unique'   => 'Email ini sudah digunakan oleh penulis lain.',

                'foto.image'     => 'File foto harus berupa gambar.',
                'foto.max'       => 'Ukuran foto maksimal 2 MB.',

                'aktif.required' => 'Status penulis wajib dipilih.',
            ]
        );

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('penulis', 'public');
        }

        Penulis::create($validated);

        return redirect()
            ->route('admin.penulis.index')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $validated = $request->validate(
            [
                'nama'  => 'required|string|max:100',
                'email' => 'nullable|email|unique:penulis,email,' . $penulis->id,
                'bio'   => 'nullable|string',
                'foto'  => 'nullable|image|max:2048',
                'aktif' => 'required|boolean',
            ],
            [
                'nama.required'  => 'Nama penulis wajib diisi.',
                'nama.max'       => 'Nama penulis maksimal 100 karakter.',

                'email.email'    => 'Format email tidak valid.',
                'email.unique'   => 'Email ini sudah digunakan oleh penulis lain.',

                'foto.image'     => 'File foto harus berupa gambar.',
                'foto.max'       => 'Ukuran foto maksimal 2 MB.',

                'aktif.required' => 'Status penulis wajib dipilih.',
            ]
        );

        if ($request->hasFile('foto')) {
            if ($penulis->foto) {
                Storage::disk('public')->delete($penulis->foto);
            }
            $validated['foto'] = $request->file('foto')->store('penulis', 'public');
        }

        $penulis->update($validated);

        return redirect()
            ->route('admin.penulis.index')
            ->with('success', 'Penulis berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);

        if ($penulis->beritas()->count() > 0) {
            return back()->with('error', 'Penulis tidak bisa dihapus karena masih memiliki berita.');
        }

        if ($penulis->foto) {
            Storage::disk('public')->delete($penulis->foto);
        }

        $penulis->delete();

        return redirect()
            ->route('admin.penulis.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }
}
