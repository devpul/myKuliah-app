<?php

namespace App\Http\Controllers\Todolist;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class TodolistController extends Controller
{
    public function index()
    {
        return view('todolist.todolist');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file_attachment' => 'required|file|mimes:docx|max:1000', // Example validation rules
            ],[
                'file_attachment.max' => 'The file attachment field must not be greater than 1MB.'
            ]);

            // Store the file
            if ($request->hasFile('file_attachment')) {
                $file = $request->file('file_attachment');

                // Store the file in the 'public' disk under a 'uploads' directory
                $path = $file->store('uploads', 'public');

                // logic masukan request file_attachment ke database..
                // $document = 
                // Document::create([
                    
                // ]);

                return back()->with('success', 'File uploaded successfully!');
            }
        } catch (ValidationException $e) {
            return back()->with('error', $e->getMessage());
        }   
    }
}
