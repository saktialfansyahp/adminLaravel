<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'cover',
        'terbit',
        'kategori_1',
        'kategori_2',
        'rating',
        'jenis',
        'penulis',
        'deskripsi',
        'isi',
    ];
}
