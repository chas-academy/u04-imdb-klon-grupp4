<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.admin-users-create');
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
            'username' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.admin-users-index');
    }

    // Show the form to edit an existing user
    public function editUser($user)
    {
        $fetchuser = User::where("username", $user)->first();
        return view('admin.admin-users-edit', compact('fetchuser'));
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
            'username' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        return redirect()->route('admin.admin-users-index');
    }

    // Delete user
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.admin-users-index');
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
    public function indexReviews(Request $request)
    {
        // Fetch reviews along with related user and movie data
        $reviews = Review::with('user', 'movie');

        // If there is a search query, filter the reviews by title, content, or user username
        if ($request->has('search') && $request->search != '') {
            $reviews = $reviews->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%')
                    ->orWhereHas('user', function ($query) use ($request) {
                        $query->where('username', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Fetch the reviews after applying any filters
        $reviews = $reviews->get();

        // Pass reviews to the view
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

    // Report management
    public function storeReport(Request $request)
    {
        $validated = $request->validate([
            'review_id' => 'nullable|exists:reviews,id',
            'flags' => 'required|array',
            'flags.*' => 'string',
            'description' => 'nullable|string|max:500',
        ]);

        Report::create([
            'user_id' => Auth::id(),
            'review_id' => $validated['review_id'] ?? null,
            'flags' => $validated['flags'],
            'description' => $validated['description'] ?? null,
        ]);

        return back()->with('success', 'Report submitted successfully.');
    }
    //Admin-reported-reviews
    public function showReportedReviews()
    {
        // Get all reported reviews
        $reportedReviews = Report::with('review') // Assuming 'review' is a relationship
            ->whereNotNull('review_id')
            ->get();

        return view('admin.admin-reviews-reported', compact('reportedReviews'));
    }

    public function acceptReview($reportId)
{
    $report = Report::findOrFail($reportId);
    $review = $report->review; // Assuming 'review' is a relationship

    $review->status = 'accepted';
    $review->save();

    $report->delete(); // Optionally, delete the report after action

    return redirect()->route('admin.admin.reviews.reported')->with('success', 'Review accepted.');
}


    public function deleteReport($reportId)
    {
        $report = Report::findOrFail($reportId);
        $report->delete();

        return redirect()->route('admin.admin.reviews.reported')->with('success', 'Report deleted.');
    }
}
