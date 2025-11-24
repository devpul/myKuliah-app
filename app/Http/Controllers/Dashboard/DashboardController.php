<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Schedule;
use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now();
        $tasksCategory = Category::where('name', 'Tasks')->first();
        $examsCategory = Category::where('name', 'Exams')->first();

        // Get today's classes
        $todayClasses = Schedule::where('user_id', $user->id)
            ->where('day_of_week', $today->dayOfWeekIso)
            ->with('subject')
            ->orderBy('start_time')
            ->get();

        // Get upcoming tasks (not completed, due in the future or today)
        $upcomingTasks = Todolist::where('user_id', $user->id)
            ->where('category_id', $tasksCategory->id)
            ->where('status', '!=', 'done')
            ->whereDate('due_date', '>=', $today)
            ->with('subject')
            ->orderBy('due_date')
            ->orderBy('priority', 'desc')
            ->limit(5)
            ->get();
        
        // Get upcoming exams
        $nextExams = Todolist::where('user_id', $user->id)
            ->where('category_id', $examsCategory->id)
            ->whereDate('due_date', '>=', $today)
            ->with('subject')
            ->orderBy('due_date')
            ->limit(3)
            ->get();

        // Task progress
        $totalTasks = Todolist::where('user_id', $user->id)->where('category_id', $tasksCategory->id)->count();
        $completedTasks = Todolist::where('user_id', $user->id)->where('category_id', $tasksCategory->id)->where('status', 'done')->count();
        $progressPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        return view('dashboard', [
            'todayClasses' => $todayClasses,
            'upcomingTasks' => $upcomingTasks,
            'nextExams' => $nextExams,
            'completedTasks' => $completedTasks,
            'totalTasks' => $totalTasks,
            'progressPercentage' => $progressPercentage,
        ]);
    }
}
