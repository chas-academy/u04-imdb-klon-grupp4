<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieList;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    /**
     * Display the user's watchlist.
     */
    public function index()
    {
        // Get the authenticated user's watchlist
        $watchlist = MovieList::where('name', 'watchlist')
            ->whereHas('users', function ($query) {
                $query->where('id', Auth::id());
            })
            ->with('movies')
            ->first();

        // If the user doesn't have a watchlist, return an empty array
        $movies = $watchlist ? $watchlist->movies : [];

        return view('watchlist.index', compact('movies'));
    }

    /**
     * Add a movie to the user's watchlist.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Find or create the user's watchlist
        $watchlist = MovieList::firstOrCreate(
            ['name' => 'watchlist'],
            ['user_id' => $user->id]
        );

        // Attach the movie to the watchlist if it's not already added
        if (!$watchlist->movies()->where('movie_id', $request->movie_id)->exists()) {
            $watchlist->movies()->attach($request->movie_id);
        }

        return redirect()->back()->with('success', 'Movie added to your watchlist.');
    }

    /**
     * Remove a movie from the user's watchlist.
     */
    public function destroy($movieId)
    {
        $user = Auth::user();
        
        // Get the user's watchlist
        $watchlist = MovieList::where('name', 'watchlist')
            ->whereHas('users', function ($query) use ($user) {
                $query->where('id', $user->id);
            })
            ->first();

        // Detach the movie if it exists in the watchlist
        if ($watchlist) {
            $watchlist->movies()->detach($movieId);
        }

        return redirect()->back()->with('success', 'Movie removed from your watchlist.');
    }
}
