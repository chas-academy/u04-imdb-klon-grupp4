<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'movie_id', // Assuming you have a relation to movies
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class); // Assuming awards are linked to movies
    }
}
