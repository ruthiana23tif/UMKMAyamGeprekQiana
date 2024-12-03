<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'judul', // Tambahkan judul
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
