@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <h1>Selamat Datang di Website Cek Halal</h1>
    <p>Silakan gunakan halaman <a href="{{ route('cek-produk') }}">Cek Produk</a> untuk memulai.</p>
@endsection