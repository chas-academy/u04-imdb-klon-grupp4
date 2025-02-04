<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'name'
    ];

    // Relation till Movie-modellen via movie_genre-tabellen
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }
}
