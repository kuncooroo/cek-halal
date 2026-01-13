<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class KontakController extends Controller
{
    public function index()
    {
        return view('public.kontak');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'subjek' => 'required|string',
            'pesan' => 'required|string'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'subjek.required' => 'Subjek wajib dipilih',
            'pesan.required' => 'Pesan wajib diisi'
        ]);

        // Kirim email (opsional)
        // Mail::to('admin@cekhalal.id')->send(new ContactMail($validated));

        // Atau simpan ke database jika ada tabel kontak
        // Kontak::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.'
        ]);
    }
}