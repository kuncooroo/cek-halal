<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'konten',
        'user_id',
        'tanggal_publikasi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}