<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];
    protected $table = 'lists';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'list_movie', 'list_id', 'movie_id')->withTimestamps();
    }
}
