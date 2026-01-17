<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Notifications\AdminNotification;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('penulis');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('konten', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $beritas = $query->latest()->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $penulis = Penulis::where('aktif', true)->get();
        return view('admin.berita.create', compact('penulis'));
    }

      public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'penulis_id'        => 'required|exists:penulis,id',
                'judul'             => 'required|string|max:255',
                'konten'            => 'required|string',
                'thumbnail'         => 'nullable|image|max:2048',
                'tanggal_publikasi' => 'required|date',
                'status'            => 'required|in:draft,published',
            ],
            [
                'penulis_id.required' => 'Penulis wajib dipilih.',
                'penulis_id.exists'   => 'Penulis tidak valid.',
                'judul.required'      => 'Judul berita wajib diisi.',
                'judul.max'           => 'Judul berita maksimal 255 karakter.',
                'konten.required'     => 'Konten berita wajib diisi.',
                'thumbnail.image'     => 'Thumbnail harus berupa gambar.',
                'thumbnail.max'       => 'Ukuran thumbnail maksimal 2 MB.',
                'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
                'tanggal_publikasi.date'     => 'Format tanggal publikasi tidak valid.',
                'status.required'     => 'Status berita wajib dipilih.',
                'status.in'           => 'Status berita tidak valid.',
            ]
        );

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;

        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $data = [
            'penulis_id'        => $validated['penulis_id'],
            'judul'             => $validated['judul'],
            'slug'              => $slug,
            'konten'            => $validated['konten'],
            'tanggal_publikasi' => $validated['tanggal_publikasi'],
            'status'            => $validated['status'],
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        $berita = Berita::create($data);

        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();
        if ($user) {
            $user->notify(new AdminNotification(
                'Berita baru "' . $berita->judul . '" berhasil diterbitkan.',
                'normal', 
                route('admin.berita.index')
            ));
        }

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita  = Berita::findOrFail($id);
        $penulis = Penulis::where('aktif', true)->get();

        return view('admin.berita.edit', compact('berita', 'penulis'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate(
            [
                'penulis_id'        => 'required|exists:penulis,id',
                'judul'             => 'required|string|max:255',
                'konten'            => 'required|string',
                'thumbnail'         => 'nullable|image|max:2048',
                'tanggal_publikasi' => 'required|date',
                'status'            => 'required|in:draft,published',
            ],
            [
                'penulis_id.required' => 'Penulis wajib dipilih.',
                'penulis_id.exists'   => 'Penulis tidak valid.',

                'judul.required'      => 'Judul berita wajib diisi.',
                'judul.max'           => 'Judul berita maksimal 255 karakter.',

                'konten.required'     => 'Konten berita wajib diisi.',

                'thumbnail.image'     => 'Thumbnail harus berupa gambar.',
                'thumbnail.max'       => 'Ukuran thumbnail maksimal 2 MB.',

                'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
                'tanggal_publikasi.date'     => 'Format tanggal publikasi tidak valid.',

                'status.required'     => 'Status berita wajib dipilih.',
                'status.in'           => 'Status berita tidak valid.',
            ]
        );

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Berita::where('slug', $slug)
            ->where('id', '!=', $berita->id)
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $data = [
            'penulis_id'        => $validated['penulis_id'],
            'judul'             => $validated['judul'],
            'slug'              => $slug,
            'konten'            => $validated['konten'],
            'tanggal_publikasi' => $validated['tanggal_publikasi'],
            'status'            => $validated['status'],
        ];

        if ($request->hasFile('thumbnail')) {
            if ($berita->thumbnail) {
                Storage::disk('public')->delete($berita->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->thumbnail) {
            Storage::disk('public')->delete($berita->thumbnail);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
