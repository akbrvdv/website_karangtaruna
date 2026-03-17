<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    // Pastikan ketiga kolom ini ada di dalam array!
    protected $fillable = [
        'name',
        'position',
        'photo' 
    ];
}