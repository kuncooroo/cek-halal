<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk',
        'nama_produsen',
        'nomor_sertifikat_halal',
        'barcode',
        'tanggal_terbit',
        'tanggal_kadaluarsa',
        'kategori',
        'deskripsi',
        'status',
    ];
}