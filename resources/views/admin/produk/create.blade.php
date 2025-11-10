@extends('layouts.admin')
@section('title', 'Tambah Produk Baru')

@section('content')
    <form action="{{ route('admin.produk.store') }}" method="POST" class="space-y-6 max-w-2xl">
        @csrf
        
        <div>
            <label for="kode_produk" class="block text-sm font-medium text-gray-700">Kode Produk (Barcode)</label>
            <input type="text" name="kode_produk" id="kode_produk" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div>
            <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="nama_produsen" class="block text-sm font-medium text-gray-700">Nama Produsen</label>
            <input type="text" name="nama_produsen" id="nama_produsen" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="nomor_sertifikat" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</Sertifikat></label>
            <input type="text" name="nomor_sertifikat" id="nomor_sertifikat" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_terbit" class="block text-sm font-medium text-gray-700">Tanggal Terbit</label>
                <input type="date" name="tanggal_terbit" id="tanggal_terbit" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="tanggal_kadaluarsa" class="block text-sm font-medium text-gray-700">Tanggal Kadaluarsa</Sertifikat></label>
                <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        
        <div class="pt-4">
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Simpan Produk
            </button>
            <a href="{{ route('admin.produk.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">
                Batal
            </a>
        </div>
    </form>
@endsection