<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders'; // Nama tabel di database

    // Kolom yang bisa diisi melalui form
    protected $fillable = ['gambar', 'judul', 'deskripsi'];
}
