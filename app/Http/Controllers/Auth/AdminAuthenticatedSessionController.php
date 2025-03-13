<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.admin-login');
    }

    public function store(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        if (Auth::user()->is_admin) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            Auth::logout();
            return back()->withErrors([
                'username' => 'You do not have admin access.',
            ])->onlyInput('username');
        }
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->onlyInput('username');
}

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}