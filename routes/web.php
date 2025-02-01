<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});
Route::get('/admin_delete_ratings', function () {
    return view('Delete ratings');
});
Route::get('/admin_delete_titles', function () {
    return view('Delete titles');
});
Route::get('/admin_delete_ratings', function () {
    return view('Delete ratings');
});
Route::get('/admin_manage_user', function () {
    return view('Manage user');
});
Route::get('/admin_settings', function () {
    return view('Admin settings');
});
Route::get('/admin', function () {
    return view('Admin');
});
Route::get('/change_user_info', function () {
    return view('Change information');
});
Route::get('/create_account', function () {
    return view('Create account');
});
Route::get('/create_list', function () {
    return view('Create new list');
});
Route::get('/delete_account', function () {
    return view('Delete your account');
});
Route::get('/genres', function () {
    return view('Genres');
});
Route::get('/log_out', function () {
    return view('Log out from account');
});
Route::get('/movies', function () {
    return view('Movies');
});
Route::get('/ratings', function () {
    return view('Ratings');
});
Route::get('/recently_viewed', function () {
    return view('Recently viewed');
});
Route::get('/sign_in', function () {
    return view('Sign in to your account');
});
Route::get('/signed_in', function () {
    return view('Signed in');
});
Route::get('/specific_movie', function () {
    return view('Specific movies');
});
Route::get('/top_titles', function () {
    return view('Top titles');
});
Route::get('/user_settings', function () {
    return view('User settings');
});
Route::get('/user', function () {
    return view('User');
});
Route::get('/watchlist', function () {
    return view('+Watchlist');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
