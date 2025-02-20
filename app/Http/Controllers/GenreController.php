<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Routing\Controller;

class GenreController extends Controller
{
    // Display a list of all genres and their movies
    public function index()
    {
        // Retrieve all genres with their associated movies
        $genres = Genre::with('movies')->get();

        // Return a view with the genres and movies data
        return view('genres.index', compact('genres'));
    }

    // Show movies by a specific genre
    public function show($id)
    {
        // Find the genre by its ID and load associated movies
        $genre = Genre::with('movies')->findOrFail($id);

        // Return a view with the genre and its movies
        return view('genres.show', compact('genre'));
    }

    // Add a movie to the user's watchlist
    public function addToWatchlist(Request $request, $movieId)
    {
        // Assume the user is authenticated and retrieve the user
        $user = $request->user();

        // Attach the movie to the user's watchlist if not already added
        if (!$user->watchlist->contains($movieId)) {
            $user->watchlist()->attach($movieId);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Movie added to your watchlist!');
    }

    // Redirect to the sign-in page if the user is not authenticated
    public function redirectToSignIn()
    {
        return redirect()->route('login');
    }
}
