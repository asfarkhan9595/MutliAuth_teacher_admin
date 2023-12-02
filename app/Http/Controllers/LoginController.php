<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user is authenticated and has a role
            if ($user && $user->role) {
                // Check the user's role and redirect accordingly
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
                } elseif ($user->role === 'teacher') {
                    return redirect()->route('teacher.dashboard')->with('success', 'Login successful!');
                }
                
            }
            

            // Default redirect for users without a role or in case of an issue
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Logout successful!');
    }
}
