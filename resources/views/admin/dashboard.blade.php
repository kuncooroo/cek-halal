@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    <p>Anda login sebagai: <strong>{{ Auth::user()->role }}</strong></p>
@endsection