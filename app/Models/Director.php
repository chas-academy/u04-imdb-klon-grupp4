<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Director extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'birthdate', 'nationality'];
    
    
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    // Relations
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'director_movie' , 'director_id', 'movie_id');
    }
}
