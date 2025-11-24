<?php

namespace App\Http\Controllers\Todolists;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subject;
use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    /**
     * Display a listing of tasks.
     */
    public function indexTasks(Request $request)
    {
        $user = Auth::user();
        $tasksCategory = Category::where('name', 'Tasks')->first();
        $tasks = Todolist::where('user_id', $user->id)
            ->where('category_id', $tasksCategory->id)
            ->with('subject', 'category')
            ->orderBy('due_date')
            ->get();

        $today = Carbon::today();

        // Prepare data for badges (can be moved to a helper or service)
        $statusBadges = []; // Will be set in the view logic, based on dynamic data
        $priorityBadges = [
            'high' => ['text' => 'text-red-700', 'icon' => '!!!'],
            'medium' => ['text' => 'text-yellow-700', 'icon' => '!!'],
            'low' => ['text' => 'text-gray-700', 'icon' => '!'],
        ];

        return view('tasks.index', compact('tasks', 'today', 'statusBadges', 'priorityBadges'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function createTask()
    {
        $tasksCategory = Category::where('name', 'Tasks')->first();
        $subjects = Subject::all(); // Assuming a user can assign a task to any subject
        return view('tasks.create', compact('tasksCategory', 'subjects'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function storeTask(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'nullable|exists:subjects,id',
            'type' => 'required|in:quiz,assignment,project',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = Auth::id();

        Todolist::create($validated);

        $category = Category::find($validated['category_id']);
        $redirectRoute = $category->name === 'Exams' ? 'exams.index' : 'tasks.index';


        return redirect()->route($redirectRoute)->with('success', 'Item created successfully.');
    }

    /**
     * Show the form for editing the specified task.
     */
    public function editTask(Todolist $task)
    {
        // Ensure the authenticated user owns the task
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $subjects = Subject::all();
        return view('tasks.edit', compact('task', 'subjects'));
    }

    /**
     * Update the specified task in storage.
     */
    public function updateTask(Request $request, Todolist $task)
    {
        // Ensure the authenticated user owns the task
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'nullable|exists:subjects,id',
            'type' => 'required|in:quiz,assignment,project',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroyTask(Todolist $task)
    {
        // Ensure the authenticated user owns the task
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * Display a listing of exams.
     */
    public function indexExams()
    {
        $user = Auth::user();
        $examsCategory = Category::where('name', 'Exams')->first();
        $exams = Todolist::where('user_id', $user->id)
            ->where('category_id', $examsCategory->id)
            ->with('subject')
            ->orderBy('due_date')
            ->get();

        $today = Carbon::today();

        // Fetch subjects for the add-exam modal
        $subjects = Subject::all();

        return view('exams.index', compact('exams', 'today', 'subjects'));
    }

    /**
     * Show the form for creating a new exam.
     */
    public function createExam()
    {
        $examsCategory = Category::where('name', 'Exams')->first();
        $subjects = Subject::all();
        return view('exams.create', compact('examsCategory', 'subjects'));
    }

    /**
     * Store a newly created exam in storage.
     */
    public function storeExam(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'nullable|exists:subjects,id',
            'type' => 'required|in:quiz,assignment,project',
            'due_date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'room' => 'nullable|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = Auth::id();

        Todolist::create($validated);

        return redirect()->route('exams.index')->with('success', 'Exam created successfully.');
    }

    /**
     * Show the form for editing the specified exam.
     */
    public function editExam(Todolist $exam)
    {
        // Ensure the authenticated user owns the exam
        if ($exam->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $subjects = Subject::all();
        return view('exams.edit', compact('exam', 'subjects'));
    }

    /**
     * Update the specified exam in storage.
     */
    public function updateExam(Request $request, Todolist $exam)
    {
        // Ensure the authenticated user owns the exam
        if ($exam->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'nullable|exists:subjects,id',
            'type' => 'required|in:quiz,assignment,project',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
        ]);

        $exam->update($validated);

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully.');
    }

    /**
     * Remove the specified exam from storage.
     */
    public function destroyExam(Todolist $exam)
    {
        // Ensure the authenticated user owns the exam
        if ($exam->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $exam->delete();

        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully.');
    }
}
