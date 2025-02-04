<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieDirector extends Model       //pivot table
{
    protected $table = 'movie_director';

    protected $fillable = [
        'movie_id', 'director_id'
    ];
}
