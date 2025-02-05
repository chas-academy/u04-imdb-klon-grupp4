<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Visa användarprofil.
     */
    public function showProfile()
    {
        $user = Auth::user(); // Hämta inloggad användare
        return view('user.profile', compact('user'));
    }


    /**
     * Visa användarens watchlist.
     */
    public function showWatchlist()
    {
        $user = Auth::user();
        $watchlist = $user->watchlist()->with('movies')->get(); // Anta relation mellan användare och watchlist
        return view('user.watchlist', compact('watchlist'));
    }


    /**
     * Uppdatera användarens information.
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
     * Uppdatera användarens inställningar.
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
     * Ta bort användarens konto.
     */
    public function delete()
    {
        $user = Auth::user();
        $user->delete();


        return redirect('/')->with('success', 'Ditt konto har tagits bort.');
    }
}
