<?php


namespace App\Http\Controllers;


use App\Models\Award;
use App\Models\Movie;
use Illuminate\Http\Request;


class AwardController extends Controller
{
    // Display a list of all awards
    public function index()
    {
        $awards = Award::all();
        return view('awards.index', compact('awards'));
    }


    // Show details of a specific award
    public function show($id)
    {
        $award = Award::findOrFail($id);
        return view('awards.show', compact('award'));
    }


    // Show the form to create a new award
    public function create()
    {
        return view('awards.create');
    }


    // Store a new award in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);


        Award::create($request->all());
        return redirect()->route('awards.index')->with('success', 'Award created successfully.');
    }


    // Show the form to edit an existing award
    public function edit($id)
    {
        $award = Award::findOrFail($id);
        return view('awards.edit', compact('award'));
    }


    // Update an existing award in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);


        $award = Award::findOrFail($id);
        $award->update($request->all());
        return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
    }


    // Delete an award from the database
    public function destroy($id)
    {
        $award = Award::findOrFail($id);
        $award->delete();
        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }


    // Attach an award to a movie
    public function attachToMovie(Request $request, $movieId)
    {
        $request->validate([
            'award_id' => 'required|exists:awards,id'
        ]);


        $movie = Movie::findOrFail($movieId);
        $movie->award_id = $request->award_id;
        $movie->save();


        return redirect()->route('movies.show', $movieId)->with('success', 'Award attached to movie successfully.');
    }


    // Remove an award from a movie
    public function detachFromMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->award_id = null;
        $movie->save();


        return redirect()->route('movies.show', $movieId)->with('success', 'Award detached from movie successfully.');
    }
}
