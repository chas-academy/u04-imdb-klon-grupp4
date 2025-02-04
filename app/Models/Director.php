<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directors';

    protected $fillable = [
        'first_name', 'last_name', 'nationality', 'birthdate'
    ];

    // Relation till Movie-modellen via movie_director-tabellen
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_director');
    }
}
