<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('search')) {
            $query->where('pertanyaan', 'like', '%' . $request->search . '%')
                ->orWhere('jawaban', 'like', '%' . $request->search . '%');
        }

        $faqs = $query->latest()->paginate(10)->withQueryString();

        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'pertanyaan' => 'required|string|max:255',
                'jawaban'    => 'required|string',
            ],
            [
                'pertanyaan.required' => 'Pertanyaan wajib diisi.',
                'pertanyaan.max'      => 'Pertanyaan maksimal 255 karakter.',
                'jawaban.required'    => 'Jawaban wajib diisi.',
            ]
        );

        Faq::create($validated);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'pertanyaan' => 'required|string|max:255',
                'jawaban'    => 'required|string',
            ],
            [
                'pertanyaan.required' => 'Pertanyaan wajib diisi.',
                'pertanyaan.max'      => 'Pertanyaan maksimal 255 karakter.',
                'jawaban.required'    => 'Jawaban wajib diisi.',
            ]
        );

        $faq = Faq::findOrFail($id);
        $faq->update($validated);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
