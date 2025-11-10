@extends('layouts.admin')
@section('title', 'Tambah Berita Baru')

@section('content')
    <form action="{{ route('admin.berita.store') }}" method="POST">
        @csrf
        <div>
            <label>Judul Berita:</label>
            <input type="text" name="judul" required>
        </div>
        <div>
            <label>Isi Berita:</label>
            <textarea name="isi" rows="6" required></textarea>
        </div>
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>
        <div>
            <label>Penulis:</label>
            <input type="text" name="penulis" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
