<?php
namespace app\Http\Controllers;

use App\Models\movie;
use app\Models\genre;
use Illuminate\Http\Request;

class MovieController extends Controller
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

