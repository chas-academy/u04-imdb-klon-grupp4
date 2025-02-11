<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ListMovieUserController;
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


// Manage lists (Logged in)
Route::middleware('auth')->group(function () {
    Route::get('/lists', [ListMovieUserController::class, 'index'])->name('lists.index');
    Route::post('/lists/create', [ListMovieUserController::class, 'store'])->name('lists.store');
    Route::delete('/lists/{list}/delete', [ListMovieUserController::class, 'destroy'])->name('lists.destroy');

    Route::post('/lists/{list}/add', [ListMovieUserController::class, 'addMovie'])->name('lists.addMovie');
    Route::delete('/lists/{list}/remove/{movie}', [ListMovieUserController::class, 'removeMovie'])->name('lists.removeMovie');
});


// Admin-routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // User Management
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Movie Management
    Route::get('/movies', [AdminController::class, 'indexMovies'])->name('movies.index');
    Route::get('/movies/create', [AdminController::class, 'createMovie'])->name('movies.create');
    Route::post('/movies', [AdminController::class, 'storeMovie'])->name('movies.store');
    Route::get('/movies/{movie}/edit', [AdminController::class, 'editMovie'])->name('movies.edit');
    Route::put('/movies/{movie}', [AdminController::class, 'updateMovie'])->name('movies.update');
    Route::delete('/movies/{movie}', [AdminController::class, 'destroyMovie'])->name('movies.destroy');

    // Review Management
    Route::get('/reviews', [AdminController::class, 'indexReviews'])->name('reviews.index');
    Route::get('/reviews/create', [AdminController::class, 'createReview'])->name('reviews.create');
    Route::post('/reviews', [AdminController::class, 'storeReview'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [AdminController::class, 'editReview'])->name('reviews.edit');
    Route::put('/reviews/{review}', [AdminController::class, 'updateReview'])->name('reviews.update');
    Route::delete('/reviews/{review}', [AdminController::class, 'destroyReview'])->name('reviews.destroy');
});

// Profile management (auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';