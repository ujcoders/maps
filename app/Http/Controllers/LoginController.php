<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->name)->first();

        // Check if user exists and password matches
        if ($user && $request->password === $user->password) {
            // Store the user in session
            Session::put('user', $user);
            if ($user->role == 1) {
                return redirect()->route('admin.questions.index')->with('success', 'Login successful!');
            }
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    public function dashboard()
    {
        // Check if user is logged in
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        return view('dashboard');
    }

    public function logout()
    {
        // Remove the user from session and redirect to login page
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
   
}
