<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::latest()->paginate(10);
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);

        if (!$kontak->is_read) {
            $kontak->update(['is_read' => true]);
        }

        return view('admin.kontak.show', compact('kontak'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string'
        ], [
            'balasan.required' => 'Pesan balasan wajib diisi'
        ]);

        $kontak = Kontak::findOrFail($id);

        try {
            Mail::raw($request->balasan, function ($message) use ($kontak) {
                $message->to($kontak->email)
                        ->subject('Balasan: ' . $kontak->subjek);
            });

            return redirect()
                ->route('admin.kontak.show', $id)
                ->with('success', 'Balasan berhasil dikirim ke email pengirim');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal mengirim email: ' . $e->getMessage() . '. Pastikan konfigurasi SMTP benar.');
        }
    }

    public function destroy($id)
    {
        Kontak::findOrFail($id)->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}