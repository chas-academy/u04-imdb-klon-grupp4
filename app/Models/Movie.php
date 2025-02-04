<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release_year',
        'rating_id',
        'plot',
        'movie_length',
    ];

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
    // Relation till Genre-modellen via movie_genre-tabellen
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    // Relation till Director-modellen via movie_director-tabellen
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'movie_director');
    }

    // Relation till Actor-modellen via movie_actor-tabellen
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor');
    }

    // Relation till Award-modellen
    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
