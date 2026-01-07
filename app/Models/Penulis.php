<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';

    protected $fillable = [
        'nama',
        'email',
        'bio',
        'foto',
        'aktif',
    ];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
