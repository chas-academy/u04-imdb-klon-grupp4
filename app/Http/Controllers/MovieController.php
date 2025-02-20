<?php
namespace app\Http\Controllers;

use app\Models\movie;
use app\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class movieController extends Controller
{
    // Show all movies in a specific genre
    public function index(genre $genre)
    {
        $movies = $genre->movies; // Fetch movies that belong to this genre
        return view('movies.index', compact('movies', 'genre'));
    }

    // Show a single movie's details
    public function show(movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
}
