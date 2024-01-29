<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       $this->middleware('permission:edit-student|read-student', ['only' => ['index','update']]);
    }
    public function index()
    {
        $classrooms = Classroom::all();
        $students = Student::all();
        return view('students.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'classrooms' => 'required|array',
            'grade' => 'required|string',
            'father_name' => 'required|string',
            'address' => 'required|string',
        ]);

        $classrooms = $request->input('classrooms', []);

        $student = Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'grade' => $request->input('grade'),
            'father_name' => $request->input('father_name'),
            'address' => $request->input('address'),
            'classrooms' => implode(',', $classrooms),
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, Student $student)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'classrooms' => 'required|array',
            'grade' => 'required|string',
            'father_name' => 'required|string',
            'address' => 'required|string',
        ]);

        $classrooms = $request->input('classrooms', []);
        // Update the student
        $student->update([
            'name'        => $request->input('name'),
            'email'       => $request->input('email'),
            'phone'       => $request->input('phone'),
            'gender'      => $request->input('gender'),
            'age'         => $request->input('age'),
            'grade'       => $request->input('grade'),
            'father_name' => $request->input('father_name'),
            'address'     => $request->input('address'),
            'classrooms'  => implode(',', $classrooms),
        ]);


        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
