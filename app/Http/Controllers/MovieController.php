<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Routing\Controller;

class MovieController extends Controller
{
    // Show all movies in a specific genre
    public function index(Genre $genre)
    {
        $movies = $genre->movies; // Fetch movies that belong to this genre
        return view('movies.index', compact('movies', 'genre'));
    }

    // Show a single movie's details
    public function show($id)
    {
        $movie = Movie::where('id', $id)->with(['genres', 'directors', 'actors', 'reviews'])->firstOrFail();

        return view('movies.show', compact('movie'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'release_date' => 'required|date',
            'plot' => 'required|string',
            'poster' => 'nullable|string',
            'duration' => 'required|integer',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'release_date' => 'required|date',
            'plot' => 'required|string',
            'poster' => 'nullable|string',
            'duration' => 'required|integer',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }
}
