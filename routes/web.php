<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ListMovieUserController;
use App\Http\Controllers\ReviewController; 


// (GET) Pages
Route::get('/', function () { return view('homepage'); });
Route::get('/admin', function () { return view('admin'); });
Route::get('/admin-settings', function () { return view('admin-settings'); });
Route::get('/genres', [ReviewController::class, 'genres'])->name('genres'); // Updated to use ReviewController
Route::get('/movies', function () { return view('movies'); });
Route::get('/ratings', function () { return view('ratings'); });
Route::get('/recently-viewed', [ReviewController::class, 'recentReviews'])->name('recently-viewed'); // Updated
Route::get('/specific-movie/{id}', [ReviewController::class, 'showMovieReviews'])->name('specific-movie'); // Updated for specific movie
Route::get('/top-titles', function () { return view('top-titles'); });
Route::get('/user', [UserController::class, 'show'])->name('user.show');
Route::get('/watchlist', [ReviewController::class, 'watchlist'])->name('user.watchlist'); // Updated to ReviewController


// Manage Reviews
Route::get('/reviews/create/{movie_id}', [ReviewController::class, 'create'])->name('reviews.create'); // Form to create a review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // Save a new review
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit'); // Form to edit a review
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update'); // Update an existing review
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy'); // Delete a review


// Manage user
Route::get('/sign-in', [AuthenticatedSessionController::class, 'signIn'])->name('sign-in'); // Updated
Route::post('/sign-in', [AuthenticatedSessionController::class, 'login'])->name('auth.login');
Route::post('/log-out', [AuthenticatedSessionController::class, 'logout'])->name('auth.logout');


Route::get('/create-account', function () { return view('create-account'); });
Route::post('/create-account', [RegisteredUserController::class, 'register'])->name('auth.register');


Route::get('/delete-account', function () { return view('delete-account'); });
Route::delete('/delete-account', [UserController::class, 'delete'])->name('user.delete');


Route::get('/user-settings', function () { return view('user-settings'); });
Route::put('/user-settings', [UserController::class, 'updateSettings'])->name('user.updateSettings');


Route::get('/change-user-info', function () { return view('change-user-info'); });
Route::patch('/change-user-info', [UserController::class, 'update'])->name('user.update');


// Manage lists
Route::get('/create-list', function () { return view('create-list'); });
Route::post('/create-list', [ListMovieUserController::class, 'store'])->name('list.create');


// Admin-routes
Route::delete('/admin-delete-titles', [AdminController::class, 'deleteTitle'])->name('admin.deleteTitle');
Route::delete('/admin-delete-rating', [AdminController::class, 'deleteRating'])->name('admin.deleteRating');
Route::post('/admin-manage-user', [AdminController::class, 'manageUser'])->name('admin.manageUser');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile management (auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';