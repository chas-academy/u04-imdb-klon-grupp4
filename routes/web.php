<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ListMovieUserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AwardController;

// Genre Routes
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::post('/genres/{id}/watchlist/{movie_id}', [GenreController::class, 'addToWatchlist'])
    ->middleware('auth')
    ->name('genres.addToWatchlist');

Route::get('/sign-in', [AuthenticatedSessionController::class, 'signIn'])->name('sign-in');

// Award Routes
Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');
Route::get('/awards/{id}', [AwardController::class, 'show'])->name('awards.show');
Route::get('/awards/create', [AwardController::class, 'create'])->name('awards.create');
Route::post('/awards', [AwardController::class, 'store'])->name('awards.store');
Route::get('/awards/{id}/edit', [AwardController::class, 'edit'])->name('awards.edit');
Route::put('/awards/{id}', [AwardController::class, 'update'])->name('awards.update');
Route::delete('/awards/{id}', [AwardController::class, 'destroy'])->name('awards.destroy');

// Attach and detach awards to movies
Route::post('/movies/{movieId}/awards', [AwardController::class, 'attachToMovie'])->name('movies.awards.attach');
Route::delete('/movies/{movieId}/awards', [AwardController::class, 'detachFromMovie'])->name('movies.awards.detach');

// Pages
Route::get('/', function () { return view('home'); });
Route::get('/admin', function () { return view('admin.index'); });
Route::get('/movies', function () { return view('movies'); });
Route::get('/ratings', function () { return view('ratings'); });
Route::get('/recently-viewed', [ReviewController::class, 'recentReviews'])->name('recently-viewed');
Route::get('/specific-movie/{id}', [ReviewController::class, 'showMovieReviews'])->name('specific-movie');
Route::get('/top-titles', function () { return view('top-titles'); });
Route::get('/user', [UserController::class, 'show'])->name('users.index');
Route::get('/watchlist', [ReviewController::class, 'watchlist'])->name('user.watchlist');

// Manage Reviews
Route::get('/reviews/create/{movie_id}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Manage Ratings
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/ratings/{id}', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('/ratings/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');

// Manage Lists
Route::middleware('auth')->group(function () {
    Route::get('/lists', [ListMovieUserController::class, 'index'])->name('lists.index');
    Route::post('/lists/create', [ListMovieUserController::class, 'store'])->name('lists.store');
    Route::delete('/lists/{list}/delete', [ListMovieUserController::class, 'destroy'])->name('lists.destroy');

    Route::post('/lists/{list}/add', [ListMovieUserController::class, 'addMovie'])->name('lists.addMovie');
    Route::delete('/lists/{list}/remove/{movie}', [ListMovieUserController::class, 'removeMovie'])->name('lists.removeMovie');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
  
    // User Management
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create-account');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.delete-account');

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

    // Rating Management
    Route::get('/ratings', [AdminController::class, 'indexRatings'])->name('ratings.index');
    Route::delete('/ratings/{id}', [AdminController::class, 'destroyRating'])->name('ratings.destroy');
});

// Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

// Show login form
Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('users.log-in');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');



require __DIR__.'/auth.php';
