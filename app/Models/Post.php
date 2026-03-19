<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Ini dia daftar tamu yang diizinkan masuk ke database
    protected $fillable = [
        'title',
        'category',
        'image', // <-- INI YANG TADI KELUPAAN! 😭
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}