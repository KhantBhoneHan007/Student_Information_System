<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Certification;
use App\Models\Classroom;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $certifications = Certification::all();
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers', 'classrooms', 'certifications'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $certifications = Certification::all();
        return view('teachers.create', compact('certifications', 'classrooms'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'age' => 'required|integer',
            'classrooms' => 'required|array',
            'certifications' => 'array',
            'certifications.*' => 'string|max:255',
            'specialist' => 'required|string',
            'designation' => 'required|string|max:255',
        ]);

        $classrooms = $request->input('classrooms', []);
        $certifications = $request->input('certifications', []);

        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'specialist' => $request->input('specialist'),
            'designation' => $request->input('designation'),
            'certifications' => implode(',', $certifications),
            'classrooms' => implode(',', $classrooms),
        ]);
        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher created successfully');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $classrooms = Classroom::all();
        $certifications = Certification::all();
        return view('teachers.edit', compact('teacher', 'classrooms', 'certifications'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'age' => 'required|integer',
            'classrooms' => 'required|array|max:255',
            'certifications' => 'array',
            'specialist' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);

        $classrooms = $request->input('classrooms', []);
        $certifications = $request->input('certifications', []);

        // Update the teacher
        $teacher->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'certifications' => implode(',', $certifications),
            'specialist' => $request->input('specialist'),
            'classrooms' => implode(',', $classrooms),
            'designation' => $request->input('designation'),
        ]);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher updated successfully');

    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher deleted successfully');
    }
}
