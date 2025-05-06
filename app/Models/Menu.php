<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'price',
        'foto',
        'is_popular',
    ];

    // Relasi dengan kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}