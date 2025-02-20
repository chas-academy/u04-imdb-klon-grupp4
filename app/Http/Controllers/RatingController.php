<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Store a new rating in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id', // Ensure the movie exists
            'user_id' => 'required|exists:users,id',   // Ensure the user exists
            'rating' => 'required|integer|min:1|max:10', // Rating between 1 and 10
            'content' => 'nullable|string',             // Optional review content
        ]);

        // Create a new review with the rating
        $review = Review::create([
            'movie_id' => $validated['movie_id'],
            'user_id' => $validated['user_id'],
            'rating' => $validated['rating'],
            'content' => $validated['content'] ?? null, // Use null if no content is provided
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'Rating created successfully', 'review' => $review], 201);
    }

    /**
     * Update an existing rating.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:10', // Rating between 1 and 10
            'content' => 'nullable|string',             // Optional review content
        ]);

        // Update the review with new data
        $review->update([
            'rating' => $validated['rating'],
            'content' => $validated['content'] ?? $review->content, // Keep existing content if not updated
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'Rating updated successfully', 'review' => $review], 200);
    }

    /**
     * Delete an existing rating.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Delete the review from the database
        $review->delete();

        // Return a response indicating success
        return response()->json(['message' => 'Rating deleted successfully'], 200);
    }
}