<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable, CanResetPassword;

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
        'password'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    // Nonaktifkan remember_token jika tidak ada kolomnya
    public function getRememberTokenName()
    {
        return null; // Disable remember token functionality
    }

    // Accessor for profile picture URL
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture 
            ? asset('storage/'.$this->profile_picture)
            : asset('images/default-profile.png');
    }

    // PENTING: Hapus mutator password yang otomatis hash
    // Biarkan controller yang handle hashing manual
    
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}