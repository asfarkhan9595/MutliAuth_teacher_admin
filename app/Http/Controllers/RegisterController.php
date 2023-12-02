<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view("users.register");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,teacher',
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);
    
    }

    
    public function getRedirectPath()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            if ($userRole === 'admin') {
                return route('admin.dashboard');
            } elseif ($userRole === 'teacher') {
                return route('teacher.dashboard');
            }
        }

        
        return route('dashboard');
    }
}
