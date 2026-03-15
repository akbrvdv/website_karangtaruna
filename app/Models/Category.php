<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model // Ganti nama class sesuai file (Category / Committee)
{
    protected $guarded = ['id'];
    public function posts(): HasMany
    {
        // Artinya: Kategori ini memiliki banyak Post (Berita)
        return $this->hasMany(Post::class);
    }
}
