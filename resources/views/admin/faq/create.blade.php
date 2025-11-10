@extends('layouts.admin')
@section('title', 'Tambah FAQ Baru')

@section('content')
    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div>
            <label>Pertanyaan:</label>
            <input type="text" name="pertanyaan" required>
        </div>
        <div>
            <label>Jawaban:</label>
            <textarea name="jawaban" rows="5" required></textarea>
        </div>
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
