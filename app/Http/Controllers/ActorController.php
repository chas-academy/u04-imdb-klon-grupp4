<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use App\Models\Movie;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function show(Movie $movie)
    {
    $actors = $movie->actors()->limit(3)->get();
    
    return view('actors.show', compact('movie', 'actors'));
    }
}