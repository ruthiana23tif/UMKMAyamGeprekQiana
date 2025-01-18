<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geser extends Model
{
    use HasFactory;

    protected $table  = 'geser'; //nama tabel yg digunakan

    public $timestamps = false; //menonaktifkan timestamps

    protected $fillable = [
        'gambar',
    ];

}
