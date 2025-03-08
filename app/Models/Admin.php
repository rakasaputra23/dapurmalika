<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'birth_place', // Gunakan underscore
        'birth_date'
    ];
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
