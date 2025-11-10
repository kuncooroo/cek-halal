@extends('layouts.admin')
@section('title', 'Manajemen Berita')

@section('content')
    <a href="{{ route('admin.berita.create') }}">Tambah Berita Baru</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
            <tr>
                <td>{{ $berita->id }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->tanggal }}</td>
                <td>{{ $berita->penulis }}</td>
                <td>
                    <a href="{{ route('admin.berita.edit', $berita->id) }}">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus berita ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tidak ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
