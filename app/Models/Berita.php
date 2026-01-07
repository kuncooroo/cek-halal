<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'penulis_id',
        'judul',
        'slug',
        'thumbnail',
        'konten',
        'tanggal_publikasi',
        'status',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
}
