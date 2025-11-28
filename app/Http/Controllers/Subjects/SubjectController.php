<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'room' => 'nullable|string|max:255',
            'semester' => 'required|integer|min:1|max:12',
            'credits' => 'required|integer|min:1|max:10',
            'lecture_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:255',
        ]);

        Subject::create([
            'name' => $request->name,
            'code' => $request->code,
            'room' => $request->room,
            'semester' => $request->semester,
            'credits' => $request->credits,
            'lecture_name' => $request->lecture_name,
            'description' => $request->description,
            'color' => $request->color,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'room' => 'nullable|string|max:255',
            'semester' => 'required|integer|min:1|max:12',
            'credits' => 'required|integer|min:1|max:10',
            'lecture_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function detail($id)
    {
        $subject = Subject::find($id);
        
        return view('subjects.detail', ['subject' => $subject]);
    }

    public function pertemuan($id)
    {
        $subject = Subject::find($id);
        
        return view('Subjects.pertemuan', ['subject' => $subject]);
    }
}
