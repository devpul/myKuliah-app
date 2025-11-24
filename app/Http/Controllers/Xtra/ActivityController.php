<?php

namespace App\Http\Controllers\Xtra;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $activities = Activity::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();
        
        $currentDate = Carbon::now();

        return view('xtra.index', compact('activities', 'currentDate'));
    }
}
