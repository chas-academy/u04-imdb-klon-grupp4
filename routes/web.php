<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ListController;

// Hämta sidor (GET)
Route::get('/', function () { return view('Homepage'); });
Route::get('/admin', function () { return view('admin'); });
Route::get('/admin-settings', function () { return view('admin-settings'); });
Route::get('/genres', function () { return view('genres'); });
Route::get('/movies', function () { return view('movies'); });
Route::get('/ratings', function () { return view('ratings'); });
Route::get('/recently-viewed', function () { return view('recently-viewed'); });
Route::get('/specific-movie', function () { return view('specific-movie'); });
Route::get('/top-titles', function () { return view('top-titles'); });
Route::get('/user', [UserController::class, 'show'])->name('user.show'); // Uppdaterad för att använda UserController
Route::get('/watchlist', [UserController::class, 'watchlist'])->name('user.watchlist'); // Uppdaterad för watchlist

// Hantera användare
Route::get('/sign-in', function () { return view('sign-in'); });
Route::post('/sign-in', [AuthController::class, 'login'])->name('auth.login');
Route::post('/log-out', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/create-account', function () { return view('create-account'); });
Route::post('/create-account', [AuthController::class, 'register'])->name('auth.register');

Route::get('/delete-account', function () { return view('delete-account'); });
Route::delete('/delete-account', [UserController::class, 'delete'])->name('user.delete');

Route::get('/user-settings', function () { return view('user-settings'); });
Route::put('/user-settings', [UserController::class, 'updateSettings'])->name('user.updateSettings');

Route::get('/change-user-info', function () { return view('change-user-info'); });
Route::patch('/change-user-info', [UserController::class, 'update'])->name('user.update');

// Hantera listor
Route::get('/create-list', function () { return view('create-list'); });
Route::post('/create-list', [ListController::class, 'store'])->name('list.create');

// Admin-routes
Route::delete('/admin-delete-titles', [AdminController::class, 'deleteTitle'])->name('admin.deleteTitle');
Route::delete('/admin-delete-rating', [AdminController::class, 'deleteRating'])->name('admin.deleteRating');
Route::post('/admin-manage-user', [AdminController::class, 'manageUser'])->name('admin.manageUser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
