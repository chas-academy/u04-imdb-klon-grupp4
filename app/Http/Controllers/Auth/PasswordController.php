<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    // Show the form to change the password
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    // Handle the password change logic
    public function changePassword(Request $request)
{
    // Validate the new password inputs
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    // Check if the current password is correct
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // Update the user's password
    $user = Auth::user();
    $user->password = Hash::make($request->new_password);  // Hash the new password
    $user->save();  // Save the user model with the updated password

    return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
}


    // Show the form for password reset (Forgot Password)
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Handle the password reset link request
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send reset link email using Laravel's built-in password reset functionality
        $status = Password::sendResetLink($request->only('email'));

        // Check if the link was sent
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'Unable to send reset link.']);
    }

    // Show the form to reset the password after the link is clicked
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Handle the password reset logic
    public function resetPassword(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required|exists:password_resets,token',
        ]);

        // Perform the password reset using the token
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => 'Unable to reset password.']);
    }
}
