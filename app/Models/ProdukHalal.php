<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukHalal extends Model
{
    protected $table = 'produk_halal';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'nama_produsen',
        'nomor_sertifikat',
        'tanggal_terbit',
        'tanggal_kadaluarsa',
    ];
}
