<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Email wajib diisi.',
                'email.email'    => 'Format email tidak valid.',

                'password.required' => 'Password wajib diisi.',
                'password.min'      => 'Password minimal 6 karakter.',
            ]
        );

        if (Auth::guard('admin')->attempt(
            $credentials,
            $request->filled('remember') 
        )) {
            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Berhasil login sebagai admin.');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Berhasil logout.');
    }
}
