<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
      * Display a listing of the resource.
     */
    public function showProfile()
    {
        $user = Auth::user(); // retrieve the logged in user
        return view('user.profile', compact('user'));
    }

    public function showUserProfile($username)
    {
        $user = User::where('username', $username)->first();
    
        if (!$user) {
            abort(404, 'User not found');
        }
    
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
    $user = Auth::user();
    return view('user.edit', compact('user'));
    }
    /**
    * Display the user's watchlist.
     */
    public function showWatchlist()
    {
        $user = Auth::user();
        $watchlist = $user->watchlist()->with('movies')->get(); // Assume a relationship between user and watchlist
        return view('user.watchlist', compact('watchlist'));
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
