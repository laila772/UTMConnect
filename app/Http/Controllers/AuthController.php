<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        dd($user->role); // Check what role is being retrieved
        
        if ($user->role === 'admin') {
            return redirect()->route('admin');
        } elseif ($user->role === 'student') {
            return redirect()->route('dashboard');
        }
    }
    

    return back()->withErrors(['login' => 'Invalid credentials']);
}


public function logout(Request $request)
{
    Auth::logout();  // Logs the user out

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the CSRF token for security
    $request->session()->regenerateToken();

    // Redirect to the homepage or login page
    return redirect()->route('home')->with('success', 'You have been logged out.');
}
}
