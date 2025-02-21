<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'is_admin',
        'display_name',
        'profile_image',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];



      // Relations
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function lists()
    {
        return $this->hasMany(MovieList::class);
    }
     
}