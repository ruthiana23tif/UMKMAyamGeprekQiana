<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'promo';

    // Kolom yang bisa diisi secara massal
    protected $fillable = ['title', 'description', 'discount', 'start_date', 'end_date', 'gambar'];

}
