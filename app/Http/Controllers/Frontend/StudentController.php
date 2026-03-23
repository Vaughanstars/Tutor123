<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        return view('frontend.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            //'dob' => 'required|date|before_or_equal:today',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(3)->format('Y-m-d'),
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|string',
            'phone' => 'required|string|max:20',
            'grade' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'medical_condition' => 'nullable|string|max:255',
            'performance' => 'required|string',
            'schedule' => 'required|array',
            'terms' => 'accepted', // checkbox validation
        ]);

    // Convert terms checkbox to boolean
    $data['terms'] = $request->has('terms'); // true if checked, false if not

    // Auto-generate student_id like admin panel
    $lastStudent = Student::latest('id')->first();
    $number = $lastStudent ? ((int) substr($lastStudent->student_id, 1)) + 1 : 1;
    $data['student_id'] = 'S' . str_pad($number, 4, '0', STR_PAD_LEFT);

    // Leave password empty
    $data['password'] = null;
    $data['status'] = 0; 

    // Save to database
    Student::create($data);

    return response()->json([
        'success' => true,
        'message' => 'Registration successful!'
    ]);

    //return redirect()->back()->with('success', 'Registration successful!');
}
public function terms()
{
    return view('frontend.terms');
}

}