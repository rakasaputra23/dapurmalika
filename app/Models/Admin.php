<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'address',
        'birth_place',
        'birth_date'
    ];
    
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'email_verified_at' => 'datetime',
    ];

    // Accessor for profile picture URL
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture 
            ? asset('storage/'.$this->profile_picture)
            : asset('images/default-profile.png');
    }

    // Mutator for password hashing
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }
}