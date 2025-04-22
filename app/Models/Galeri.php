<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul', 'foto'];
    
    // If your table name is not 'galeris', specify the table name:
    // protected $table = 'galeri'; 
}