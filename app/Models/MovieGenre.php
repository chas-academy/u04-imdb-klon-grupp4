<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model      //pivot table
{
    protected $table = 'movie_genre';

    protected $fillable = [
        'movie_id', 'genre_id'
    ];
}
