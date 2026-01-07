<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user('admin');

        return $user && $user->role === 'superadmin';
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'    => ['nullable', 'string', 'max:20'],
            'role'     => ['required', 'in:admin,superadmin'],
            'avatar'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama admin wajib diisi.',
            'name.string'   => 'Nama admin harus berupa teks.',
            'name.max'      => 'Nama admin maksimal 100 karakter.',

            'email.required' => 'Email admin wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah digunakan oleh admin lain.',

            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',

            'phone.max' => 'Nomor telepon maksimal 20 karakter.',

            'role.required' => 'Role admin wajib dipilih.',
            'role.in'       => 'Role admin tidak valid.',

            'avatar.image' => 'Avatar harus berupa file gambar.',
            'avatar.mimes' => 'Avatar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'avatar.max'   => 'Ukuran avatar maksimal 2 MB.',
        ];
    }
}
