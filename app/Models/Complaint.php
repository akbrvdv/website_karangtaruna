<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Izinkan 3 kolom ini untuk diisi dari form
    protected $fillable = [
        'name',
        'title',
        'description',
    ];
}