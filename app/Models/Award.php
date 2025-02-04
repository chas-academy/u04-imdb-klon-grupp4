<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';

    protected $fillable = [
        'genre_id', 'movie_id'
    ];

    // Relation till Genre-modellen
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Relation till Movie-modellen
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
