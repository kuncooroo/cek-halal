@extends('layouts.admin')

@section('title', 'Edit Profil')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div
            class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden">

            <div class="p-6 border-b border-gray-100 dark:border-slate-700">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Edit Profil Saya</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Perbarui informasi akun dan foto profil Anda.</p>
            </div>

            @if (session('success'))
                <div
                    class="mx-6 mt-6 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="flex items-start space-x-6">
                    <div class="shrink-0">
                        @if ($user->avatar)
                            <img class="h-24 w-24 object-cover rounded-full border-2 border-gray-200 dark:border-slate-600"
                                src="{{ asset('storage/' . $user->avatar) }}" alt="Current profile photo">
                        @else
                            <div
                                class="h-24 w-24 rounded-full bg-gray-200 dark:bg-slate-700 flex items-center justify-center text-gray-500 text-2xl font-bold">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Foto Profil</label>
                        <input type="file" name="avatar"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-slate-700 dark:file:text-blue-400">
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, atau GIF. Maksimal 2MB.</p>
                        @error('avatar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama
                            Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-slate-600 dark:text-white p-2.5 border">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-slate-600 dark:text-white p-2.5 border">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor
                            Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-slate-600 dark:text-white p-2.5 border">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
                        <input type="text" value="{{ ucfirst($user->role) }}" disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-100 text-gray-500 dark:bg-slate-700 dark:border-slate-600 dark:text-gray-400 p-2.5 border cursor-not-allowed">
                    </div>
                </div>

                <hr class="border-gray-100 dark:border-slate-700 my-4">

                <div
                    class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg border border-yellow-100 dark:border-yellow-900/30 mb-4">
                    <h3 class="text-sm font-semibold text-yellow-800 dark:text-yellow-400 mb-2">Ubah Password (Opsional)
                    </h3>
                    <p class="text-xs text-yellow-700 dark:text-yellow-500">Biarkan kosong jika tidak ingin mengganti
                        password.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password Baru</label>
                        <input type="password" name="password" id="password"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-slate-600 dark:text-white p-2.5 border">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Konfirmasi Password
                            Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-slate-600 dark:text-white p-2.5 border">
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
