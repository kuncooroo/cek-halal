@extends('layouts.admin')
@section('title', 'Manajemen Produk Halal')

@section('content')
    <a href="{{ route('admin.produk.create') }}" 
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mb-6">
       Tambah Produk Baru
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left">Kode Produk</th>
                    <th class="py-3 px-4 text-left">Nama Produk</th>
                    <th class="py-3 px-4 text-left">Produsen</th>
                    <th class="py-3 px-4 text-left">No. Sertifikat</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($produks as $produk)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $produk->kode_produk }}</td>
                    <td class="py-3 px-4">{{ $produk->nama_produk }}</td>
                    <td class="py-3 px-4">{{ $produk->nama_produsen }}</td>
                    <td class="py-3 px-4">{{ $produk->nomor_sertifikat }}</td>
                    <td class="py-3 px-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                               Edit
                            </a>
                            <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-3 px-4 text-center text-gray-500">Tidak ada data produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection