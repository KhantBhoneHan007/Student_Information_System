<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'unique:classrooms|required|string|max:255',
        ]);

        // Create a new Classroom
        Classroom::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Classroom created successfully');
    }

    public function show(Classroom $Classroom)
    {
        return view('classrooms.show', compact('Classroom'));
    }

    public function edit(Classroom $Classroom)
    {
        return view('classrooms.edit', compact('Classroom'));
    }

    public function update(Request $request, Classroom $Classroom)
    {
        // Validate request
        $request->validate([
            'name' => 'unique:classrooms,name,' . $Classroom->id . '|required|string|max:255',
        ]);

        // Update the Classroom
        $Classroom->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Classroom updated successfully');
    }

    public function destroy(Classroom $Classroom)
    {
        $Classroom->delete();
        return redirect()->route('classrooms.index')->with('deleted', 'classroom deleted successfully');
    }
}
