<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimoni::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('message', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $testimonis = $query->latest()->paginate(10);

        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function approve($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $testimoni->update([
            'status' => 'approved',
        ]);

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil disetujui.');
    }

    public function reject($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $testimoni->update([
            'status' => 'rejected',
        ]);

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditolak.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->image) {
            $imagePath = str_replace('storage/', '', $testimoni->image);
            Storage::disk('public')->delete($imagePath);
        }

        $testimoni->delete();

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
