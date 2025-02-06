<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login with username and password
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:255', // Validate username instead of email
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->route('dashboard')->with('success', 'You are logged in.');
        }

        return back()->withErrors(['username' => 'Invalid credentials.'])->withInput();
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have logged out.');
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration with username, email, and password
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users', 
            'email' => 'required|email|unique:users',            
            'password' => 'required|min:6|confirmed',             
        ]);
        
    //Save Username,Email, Hash & save password
        $user = User::create([
            'username' => $data['username'], 
            'email' => $data['email'],       
            'password' => Hash::make($data['password']), 
        ]);

        Auth::login($user); // Log the user in immediately after registration

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
