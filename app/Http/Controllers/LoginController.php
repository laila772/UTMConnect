<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Create a login Blade file if you haven't
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $user->password === $request->password) {
            Auth::login($user);

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin');
            } elseif ($user->role === 'student') {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
