@extends('layouts.admin')
@section('title', 'Manajemen FAQ')

@section('content')
    <a href="{{ route('admin.faq.create') }}">Tambah FAQ Baru</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
            <tr>
                <td>{{ $faq->id }}</td>
                <td>{{ $faq->pertanyaan }}</td>
                <td>{{ Str::limit($faq->jawaban, 50) }}</td>
                <td>
                    <a href="{{ route('admin.faq.edit', $faq->id) }}">Edit</a>
                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus FAQ ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada FAQ.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
