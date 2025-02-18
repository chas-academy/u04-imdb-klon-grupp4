<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'is_admin',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];
  
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'user_movie', 'user_id', 'movie_id')->withTimestamps();
    }
    public function movieLists()
    {
        return $this->belongsToMany(MovieList::class, 'lists', 'user_id', 'list_id')->withTimestamps();
    }
}