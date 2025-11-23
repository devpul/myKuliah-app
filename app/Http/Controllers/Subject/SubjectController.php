<?php

namespace App\Http\Controllers\Subject;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subject.subject');
    }

    public function create()
    {
        return view('subject.create_subject');
    }

    public function validateStoreAndUpdate(Request $request)
    {
        try {
            return $request->validate([
                'subject_code.*'  => 'required|string|max:7|min:1',
                'subject_name.*'  => 'required|string|max:50|min:6',
                'semester.*'      => 'required|numeric|min:1|max:8',
                'credits.*'       => 'required|integer|min:1|max:5',
                'description.*'   => 'nullable|string',
                'color.*'         => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return $errors;
        }
    }

    public function store(Request $request)
    {
        $validated = $this->validateStoreAndUpdate($request);

        if (! is_array($validated)) {
            return back()->with('error', $validated);
        }

        for ($i = 0; $i < count($validated['subject_code']); $i++) {
            $subject = Subject::create([
                'subject_code'  => $validated['subject_code'][$i],
                'subject_name'  => $validated['subject_name'][$i],
                'semester'      => $validated['semester'][$i],
                'credits'       => $validated['credits'][$i],
                'description'   => $validated['description'][$i] ?? null,
                'color'         => $validated['color'][$i] ?? null,
            ]);
        }

        return redirect()->route('subjects')->with('success', 'Berhasil menambahkan mata kuliah baru.');
    }   
}
