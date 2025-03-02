<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //USER CRUD
    // Display all users
    public function indexUsers()
    {
        $users = User::all();
        return view('admin.admin-users-index', compact('users'));
    }

    // Show the form to create a new user
    public function createUser()
    {
        return view('admin.users.create');
    }

    // Store a new user
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.users.index');
    }

    // Show the form to edit an existing user
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update an existing user
    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        return redirect()->route('admin.users.index');
    }

    // Delete user
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    //Movies CRUD
    // Display all movies
    public function indexMovies()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    // Show the form to create a new movie
    public function createMovie()
    {
        return view('admin.movies.create');
    }

    // Store a new movie
    public function storeMovie(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'rating' => 'required|numeric|between:0,10',
        ]);

        Movie::create([
            'title' => $validated['title'],
            'genre' => $validated['genre'],
            'release_year' => $validated['release_year'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('admin.movies.index');
    }

    // Show the form to edit an existing movie
    public function editMovie(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    // Update an existing movie
    public function updateMovie(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'rating' => 'required|numeric|between:0,10',
        ]);

        $movie->update([
            'title' => $validated['title'],
            'genre' => $validated['genre'],
            'release_year' => $validated['release_year'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('admin.movies.index');
    }

    // Delete a movie
    public function destroyMovie(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }
    //REVIEW CRUD 
    public function indexReviews()
    {
        //Show all Reviews
        $reviews = Review::all();
        return view('admin.admin-reviews-index', compact('reviews'));
    }

    public function createReview()
    {
        //Create review
        $movies = Movie::all();
        $users = User::all();
        return view('admin.reviews.create', compact('movies', 'users'));
    }

    public function storeReview(Request $request)
    {
        //Store created review in storage
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|numeric|between:0,10',
            'comment' => 'required|string|max:500',
        ]);

        Review::create($validated);
        return redirect()->route('admin.reviews.index');
    }

    public function editReview(Review $review)
    {
        //Edit Review
        $movies = Movie::all();
        $users = User::all();
        return view('admin.reviews.edit', compact('review', 'movies', 'users'));
    }

    public function updateReview(Request $request, Review $review)
    {
        //Update edited review
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|numeric|between:0,10',
            'comment' => 'required|string|max:500',
        ]);

        $review->update($validated);
        return redirect()->route('admin.reviews.index');
    }

    public function destroyReview(Review $review)
    {
        //Destroy/delete Review
        $review->delete();
        return redirect()->route('admin.reviews.index');
    }
}
