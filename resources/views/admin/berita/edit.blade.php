@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Berita:</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required>
        </div>
        <div>
            <label>Isi Berita:</label>
            <textarea name="isi" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}" required>
        </div>
        <div>
            <label>Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}" required>
        </div>
        <br>
        <button type="submit">Update</button>
    </form>
@endsection
