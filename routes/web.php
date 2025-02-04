<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});
Route::get('/admin-delete-titles', function () {
    return view('admin-delete-titles');
});
Route::get('/admin-delete-rating', function () {
    return view('admin-delete-rating');
});
Route::get('/admin-manage-user', function () {
    return view('admin-manage-user');
});
Route::get('/admin-settings', function () {
    return view('admin-settings');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/change-user-info', function () {
    return view('change-user-info');
});
Route::get('/create-account', function () {
    return view('create-account');
});
Route::get('/create-list', function () {
    return view('create-list');
});
Route::get('/delete-account', function () {
    return view('delete-account');
});
Route::get('/genres', function () {
    return view('genres');
});
Route::get('/log-out', function () {
    return view('log-out');
});
Route::get('/movies', function () {
    return view('movies');
});
Route::get('/ratings', function () {
    return view('ratings');
});
Route::get('/recently-viewed', function () {
    return view('recently-viewed');
});
Route::get('/sign-in', function () {
    return view('sign-in');
});
Route::get('/signed-in', function () {
    return view('signed-in');
});
Route::get('/specific-movie', function () {
    return view('specific-movie');
});
Route::get('/top-titles', function () {
    return view('top-titles');
});
Route::get('/user-settings', function () {
    return view('user-settings');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/watchlist', function () {
    return view('watchlist');
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
