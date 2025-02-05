<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Show all movies in a specific genre
    public function index(Genre $genre)
    {
        $movies = $genre->movies; // Fetch movies that belong to this genre
        return view('movies.index', compact('movies', 'genre'));
    }

    // Show a single movie's details
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
}
