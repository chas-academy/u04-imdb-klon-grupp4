<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    /**
     * Display all reviews for a specific movie.
     */
    public function index($movie_id)
    {
        // Fetch the movie and its reviews
        $movie = Movie::with('reviews.user')->findOrFail($movie_id);
        return view('reviews.index', compact('movie'));
    }


    /**
     * Show the form for creating a new review.
     */
    public function create($movie_id)
    {
        // Pass the movie ID to the view
        $movie = Movie::findOrFail($movie_id);
        return view('reviews.create', compact('movie'));
    }


    /**
     * Store a newly created review in the database.
     */
    public function store(Request $request, $movie_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:10',
        ]);
    
        // Store the review data in session
        session()->put('temporary_review', [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);
    
        return redirect()->route('reviews.index', ['movie_id' => $movie_id])->with('success', 'Review saved temporarily!');
    }


    /**
     * Show the form for editing the specified review.
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);


        // Ensure the user is authorized to edit the review
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        return view('reviews.edit', compact('review'));
    }


    /**
     * Update the specified review in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:10',
        ]);


        $review = Review::findOrFail($id);


        // Ensure the user is authorized to update the review
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        $review->update([
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
            'own_rating' => $request->input('own_rating', null),
        ]);


        return redirect()->route('reviews.index', $review->movie_id)->with('success', 'Review updated successfully!');
    }


    /**
     * Remove the specified review from the database.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);


        // Ensure the user is authorized to delete the review
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        $review->delete();


        return redirect()->back()->with('success', 'Review deleted successfully!');
    }


    /**
     * Redirect to the genres page.
     */
    public function genres()
    {
        return redirect()->route('genres.index');
    }


    /**
     * Redirect to the user's watchlist.
     */
    public function watchlist()
    {
        return redirect()->route('watchlist.index');
    }


    /**
     * Redirect to the sign-in page if not authenticated.
     */
    public function signIn()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        return redirect()->route('dashboard');
    }


    /**
     * Show the user's recent reviews.
     */
    public function recentReviews()
    {
        $reviews = Review::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();


        return view('reviews.recent', compact('reviews'));
    }
}
