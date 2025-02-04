<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';

    protected $fillable = [
        'first_name', 'last_name', 'nationality', 'birthdate'
    ];

    // Relation till Movie-modellen via movie_actor-tabellen
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor');
    }
}
