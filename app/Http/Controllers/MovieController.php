<?php
namespace app\Http\Controllers;

<<<<<<< HEAD
use App\Models\movie;
=======
use app\Models\movie;
>>>>>>> d2afa69461078fd9855889825e39def999605242
use app\Models\genre;
use Illuminate\Http\Request;

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

