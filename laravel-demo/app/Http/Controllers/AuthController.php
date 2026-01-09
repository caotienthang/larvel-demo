<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /*------------------------
    | LOGIN
    ------------------------*/
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // QUAN TRỌNG: quay về trang user đang định vào (vd: /checkout/123)
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }

    /*------------------------
    | REGISTER
    ------------------------*/
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // If user submits password → normal registration
        if ($request->filled('password')) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'nullable|string|max:20',
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Your account has been created successfully!');
        }

        // If user submits only email → generate and send password
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $password = bin2hex(random_bytes(4)); // 8 characters
        $email = $request->email;
        $name = explode('@', $email)[0];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Send password via email
        Mail::raw(
            "Hello!\n\nYour login password is: {$password}",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your Account Information');
            }
        );

        Auth::login($user);

        return redirect('/')->with(
            'success',
            'Your account has been created! The password has been sent to your email.'
        );
    }

    /*------------------------
    | CHANGE PASSWORD (Logged in)
    ------------------------*/
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        // Update new password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'Password changed successfully!');
    }

    /*------------------------
    | FORGOT PASSWORD (Send new password to email)
    ------------------------*/
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Do not reveal whether email exists
        if (!$user) {
            return back()->with(
                'success',
                'If the email exists in our system, a new password will be sent to it.'
            );
        }

        // Generate new password
        $newPassword = Str::random(10);

        // Update password
        $user->password = Hash::make($newPassword);
        $user->save();

        // Send new password via email
        Mail::raw(
            "Hello!\n\nYour new password is: {$newPassword}\nPlease log in and change your password immediately for security reasons.",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your New Password');
            }
        );

        return back()->with(
            'success',
            'If the email exists in our system, a new password has been sent to it.'
        );
    }
}
