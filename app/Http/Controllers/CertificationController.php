<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::all();
        return view('certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('certifications.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'unique:certifications|required|string|max:255',
        ]);

        // Create a new Certification
        Certification::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('certifications.index')->with('success', 'Certification created successfully');
    }

    public function show(Certification $Certification)
    {
        return view('certifications.show', compact('Certification'));
    }

    public function edit(Certification $Certification)
    {
        return view('certifications.edit', compact('Certification'));
    }

    public function update(Request $request, Certification $Certification)
    {
        // Validate request
        $request->validate([
            'name' => 'unique:certifications,name,' . $Certification->id . '|required|string|max:255',
        ]);

        // Update the Certification
        $Certification->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('certifications.index')->with('success', 'Certification updated successfully');
    }

    public function destroy(Certification $Certification)
    {
        $Certification->delete();
        return redirect()->route('certifications.index')->with('deleted', 'Certification deleted successfully');
    }
}
