<?php

namespace App\Http\Controllers\Timetable;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $schedules = Schedule::where('user_id', $user->id)
            ->with(['subject']) // Eager load subject and its lecture
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();

        $subjects = Subject::all(); // Needed for displaying legend or other subject info

        $today = Carbon::now();

        return view('timetable.index', compact('schedules', 'subjects', 'today'));
    }
}
