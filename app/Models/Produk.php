<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    protected $fillable = [
        'kategori_id', 
        'nama_produk',
        'nama_produsen',
        'nomor_sertifikat_halal',
        'barcode',
        'tanggal_terbit',
        'tanggal_kadaluarsa',
        'deskripsi',
        'status',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}