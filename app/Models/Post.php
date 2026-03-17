<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar data berita tidak diblokir saat disimpan
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id'
    ];

    // Relasi ke Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke User (Penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}