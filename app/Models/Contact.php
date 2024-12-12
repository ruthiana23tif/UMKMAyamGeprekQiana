<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Menentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'phone_number',
        'message',
    ];

    // Menonaktifkan fitur timestamps (created_at dan updated_at)
    public $timestamps = false;
}
