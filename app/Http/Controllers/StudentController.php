<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class StudentController extends Controller
{
    // Display the form to create a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a new student based on the user's role
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'class' => 'required',
        ]);

        // Sanitize input by retrieving only specified fields
        $data = $request->only(['name', 'email', 'class']);

        // Determine if the logged-in user has the role of 'teacher'
        // If yes, use their ID as the teacher_id; otherwise, set it to null
        $data['teacher_id'] = auth()->user()->role === 'teacher' ? auth()->user()->id : null;

        // Create a new student using the provided data
        $student = Student::create($data);

        // Redirect the user based on the success or failure of creating the student
        if ($student) {
            return redirect()->route('students.index')->with('success', 'Student created successfully!');
        } else {
            return redirect()->route('students.index')->with('error', 'Failed to create student.');
        }
    }

    // Display a list of students based on the user's role
    public function index()
    {
        // Check the user's role
        $userRole = Auth::user()->role;

        // Fetch students based on the user's role
        if ($userRole === 'admin') {
            // For admin users, retrieve all students
            $students = Student::all();
        } elseif ($userRole === 'teacher') {
            // For teacher users, retrieve students associated with their teacher_id
            $teacherId = Auth::user()->id;
            $students = Student::where('teacher_id', $teacherId)->get();
        } else {
            // Handle other roles or unauthorized access by throwing a 403 error
            abort(403, 'Unauthorized action.');
        }

        // Display the list of students in the view
        return view('students.index', ['students' => $students]);
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}

