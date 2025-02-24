<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MovieList extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'title', 'user_id'];
    protected $table = 'lists';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'list_movie', 'list_id', 'movie_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
