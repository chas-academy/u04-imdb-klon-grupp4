<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the profile of the authenticated user.
     */
    public function showProfile()
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->with(['movieLists', 'reviews'])->firstOrFail();
        $lists = $user->movieLists->take(3);
        $reviews = $user->reviews->take(3);

        return view('users.profile', compact('user', 'lists', 'reviews'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Display the user's watchlist.
     */
    public function showWatchlist()
    {
        $user = Auth::user();
        $watchlist = $user->watchlist()->with('movies')->get(); // Assume a relationship between user and watchlist
        return view('users.watchlist', compact('watchlist'));
    }

    /**
     * Update the user's information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('user.profile')->with('success', 'Dina uppgifter har uppdaterats.');
    }

    /**
     * Update the user's settings.
     */
    public function updateSettings(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'is_admin' => 'boolean',
        ]);

        $user->update($validatedData);

        return redirect()->route('user.profile')->with('success', 'Inställningarna har uppdaterats.');
    }

    /**
     * Delete the user's account.
     */
    public function delete()
    {
        $user = Auth::user();
        $user->delete();

        return redirect('/')->with('success', 'Ditt konto har tagits bort.');
    }
}
