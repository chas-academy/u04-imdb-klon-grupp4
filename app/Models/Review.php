<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', // Assuming reviews are linked to movies
        'user_id',  // Assuming reviews are written by users
        'rating',
        'content',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming reviews are linked to users
    }
}

