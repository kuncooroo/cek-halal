<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Admin; 
use App\Notifications\AdminNotification; 

class KontakController extends Controller
{
    public function index()
    {
        return view('public.kontak');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'subjek'  => 'required|string|max:255',
            'pesan'   => 'required|string',
        ], [
            'nama.required'   => 'Nama wajib diisi',
            'email.required'  => 'Email wajib diisi',
            'email.email'     => 'Format email tidak valid',
            'subjek.required' => 'Subjek wajib dipilih',
            'pesan.required'  => 'Pesan wajib diisi',
        ]);

        $kontak = Kontak::create($validated);

        try {
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new AdminNotification(
                    'Pesan kontak baru dari: ' . $kontak->nama,
                    'info',
                    route('admin.kontak.show', $kontak->id) 
                ));
            }
        } catch (\Exception $e) {
        }

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Pesan Anda telah berhasil dikirim.'
        ]);
    }
}