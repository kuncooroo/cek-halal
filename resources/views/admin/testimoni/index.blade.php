@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
    <div class="space-y-6">

        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-green-900/50 dark:text-green-300 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div><span class="font-medium">Berhasil!</span> {{ session('success') }}</div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Manajemen Testimoni
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Kelola testimoni yang masuk dari pengguna.
                </p>
            </div>
        </div>

        <x-card>
            <div class="p-4 border-b border-gray-100 dark:border-slate-700">
                <form method="GET" class="flex flex-col sm:flex-row gap-3">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="w-full sm:w-64 p-2 text-sm border rounded-lg bg-gray-50 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
                        placeholder="Cari nama / email / pesan">

                    <select
                        name="status"
                        class="p-2 text-sm border rounded-lg bg-gray-50 dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>

                    <button
                        type="submit"
                        class="px-4 py-2 text-sm bg-black text-white rounded-lg hover:bg-gray-800 dark:bg-slate-600">
                        Filter
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600 dark:bg-slate-700 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Nama</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Rating</th>
                            <th class="px-6 py-4">Pesan</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y dark:divide-slate-700">
                        @forelse ($testimonis as $index => $testimoni)
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30">
                                <td class="px-6 py-4">
                                    {{ $testimonis->firstItem() + $index }}
                                </td>

                                <td class="px-6 py-4 font-semibold">
                                    {{ $testimoni->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                    {{ $testimoni->email }}
                                </td>

                                <td class="px-6 py-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $testimoni->rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                            ★
                                        </span>
                                    @endfor
                                </td>

                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                    {{ \Illuminate\Support\Str::limit($testimoni->message, 50) }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($testimoni->status === 'approved')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-50 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                            Disetujui
                                        </span>
                                    @elseif ($testimoni->status === 'rejected')
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-50 text-red-700 dark:bg-red-900/30 dark:text-red-400">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-50 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                            Menunggu
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        @if ($testimoni->status === 'pending')
                                            <form action="{{ route('admin.testimoni.approve', $testimoni->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-gray-400 hover:text-green-600 transition-colors"
                                                    title="Setujui">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.testimoni.reject', $testimoni->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-gray-400 hover:text-yellow-600 transition-colors"
                                                    title="Tolak">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="text-gray-400 hover:text-red-600 transition-colors dark:hover:text-red-400"
                                                title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                    Tidak ada data testimoni
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($testimonis->hasPages())
                <div class="px-6 py-4 border-t dark:border-slate-700">
                    {{ $testimonis->links() }}
                </div>
            @endif
        </x-card>
    </div>
@endsection