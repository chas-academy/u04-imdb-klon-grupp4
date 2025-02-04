<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie', 'movie_id', 'genre_id')->withTimestamps();
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id')->withTimestamps();
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movie', 'movie_id', 'director_id')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_movie', 'movie_id', 'user_id')->withTimestamps();
    }
    
    public function movieLists()
    {
        return $this->belongsToMany(MovieList::class, 'movie_movie_list', 'movie_id', 'movie_list_id')->withTimestamps();
    }
}