<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
