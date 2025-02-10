<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AwardController;


// Genre Routes
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index'); // Shows all genres with movies
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show'); // Shows movies of a specific genre
Route::post('/genres/{id}/watchlist/{movie_id}', [GenreController::class, 'addToWatchlist']) // Adds a movie to the user's watchlist
->middleware('auth')
->name('genres.addToWatchlist');
Route::get('/sign-in', [AuthenticatedSessionController::class, 'signIn'])->name('sign-in'); // Redirects to sign-in if non-users try to use +watchlist


// Award Routes
Route::get('/awards', [AwardController::class, 'index'])->name('awards.index'); // Show all awards
Route::get('/awards/{id}', [AwardController::class, 'show'])->name('awards.show'); // Show specific award
Route::get('/awards/create', [AwardController::class, 'create'])->name('awards.create'); // Form to create an award
Route::post('/awards', [AwardController::class, 'store'])->name('awards.store'); // Store a new award
Route::get('/awards/{id}/edit', [AwardController::class, 'edit'])->name('awards.edit'); // Edit an award
Route::put('/awards/{id}', [AwardController::class, 'update'])->name('awards.update'); // Update an award
Route::delete('/awards/{id}', [AwardController::class, 'destroy'])->name('awards.destroy'); // Delete an award


// Attach and detach awards to movies
Route::post('/movies/{movieId}/awards', [AwardController::class, 'attachToMovie'])->name('movies.awards.attach'); // Attach an award to a movie
Route::delete('/movies/{movieId}/awards', [AwardController::class, 'detachFromMovie'])->name('movies.awards.detach'); // Detach an award from a movie


// (GET) Pages
Route::get('/', function () { return view('home'); });
Route::get('/admin', function () { return view('admin'); });
Route::get('/admin-settings', function () { return view('admin-settings'); });
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