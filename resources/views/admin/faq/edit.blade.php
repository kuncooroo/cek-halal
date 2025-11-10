@extends('layouts.admin')
@section('title', 'Edit FAQ')

@section('content')
    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Pertanyaan:</label>
            <input type="text" name="pertanyaan" value="{{ old('pertanyaan', $faq->pertanyaan) }}" required>
        </div>
        <div>
            <label>Jawaban:</label>
            <textarea name="jawaban" rows="5" required>{{ old('jawaban', $faq->jawaban) }}</textarea>
        </div>

        <br>
        <button type="submit">Update</button>
    </form>
@endsection
