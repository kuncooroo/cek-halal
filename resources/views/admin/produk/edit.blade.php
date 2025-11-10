@extends('layouts.admin')
@section('title', 'Edit Produk')

@section('content')
    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Kode Produk (Barcode):</label>
            <input type="text" name="kode_produk" value="{{ old('kode_produk', $produk->kode_produk) }}" required>
        </div>

        <div>
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        <div>
            <label>Nama Produsen:</label>
            <input type="text" name="nama_produsen" value="{{ old('nama_produsen', $produk->nama_produsen) }}" required>
        </div>

        <div>
            <label>Nomor Sertifikat:</label>
            <input type="text" name="nomor_sertifikat" value="{{ old('nomor_sertifikat', $produk->nomor_sertifikat) }}" required>
        </div>

        <div>
            <label>Tanggal Terbit:</label>
            <input type="date" name="tanggal_terbit" value="{{ old('tanggal_terbit', $produk->tanggal_terbit) }}" required>
        </div>

        <div>
            <label>Tanggal Kadaluarsa:</label>
            <input type="date" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $produk->tanggal_kadaluarsa) }}" required>
        </div>

        <br>
        <button type="submit">Update</button>
    </form>
@endsection
