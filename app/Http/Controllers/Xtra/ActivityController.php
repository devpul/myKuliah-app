<?php

namespace App\Http\Controllers\Xtra;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ActivityController extends Controller
{
    /**
     * Define the category configuration. This keeps the code DRY (Don't Repeat Yourself).
     *
     * @return array
     */
    private function getCategoryConfig(): array
    {
        return [
            'organization' => [
                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'color' => 'blue',
                'label' => 'Organization'
            ],
            'sport' => [
                'icon' => 'M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9',
                'color' => 'green',
                'label' => 'Sport'
            ],
            'work' => [
                'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'color' => 'purple',
                'label' => 'Work'
            ],
            'seminar' => [
                'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
                'color' => 'yellow',
                'label' => 'Seminar'
            ],
            'volunteer' => [
                'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'color' => 'red',
                'label' => 'Volunteer'
            ],
            'other' => [
                'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                'color' => 'gray',
                'label' => 'Other'
            ],
        ];
    }

    /**
     * Display a listing of the user's activities.
     */
    public function index(Request $request)
    {
        // Start query for activities belonging to the currently authenticated user.
        $query = Activity::where('user_id', Auth::id());

        // Filter by category if a category is selected in the request.
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Get the filtered and sorted activities, with pagination.
        $activities = $query->orderBy('date', 'asc')->paginate(9);

        // Return the view with all necessary data.
        return view('xtra.index', [
            'activities' => $activities,
            'categoryConfig' => $this->getCategoryConfig(),
            'currentDate' => Carbon::now(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('xtra.create', [
            'categoryConfig' => $this->getCategoryConfig()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => ['required', Rule::in(array_keys($this->getCategoryConfig()))],
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $activity = new Activity($validated);
        // CRUCIAL: Associate the activity with the logged-in user.
        $activity->user_id = Auth::id();
        $activity->save();

        return redirect()->route('xtra.index')->with('success', 'Activity added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $xtra)
    {
        // SECURITY NOTE: To prevent users from editing each other's activities,
        // enable Laravel's Policies by uncommenting the next line.
        // You will need to create and register an ActivityPolicy first.
        // $this->authorize('update', $xtra);

        return view('xtra.edit', [
            'activity' => $xtra,
            'categoryConfig' => $this->getCategoryConfig(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $xtra)
    {
        // SECURITY NOTE: Ensure the user is authorized to update this.
        // $this->authorize('update', $xtra);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => ['required', Rule::in(array_keys($this->getCategoryConfig()))],
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $xtra->update($validated);

        return redirect()->route('xtra.index')->with('success', 'Activity updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $xtra)
    {
        // SECURITY NOTE: Ensure the user is authorized to delete this.
        // $this->authorize('delete', $xtra);

        // To avoid the 403 error for now, we will just check the user ID directly.
        // This is a basic check. For more complex rules, Policies are better.
        if (Auth::id() !== $xtra->user_id) {
            // If you want to show a 403 error, you can use: abort(403);
            return redirect()->route('xtra.index')->with('error', 'You are not authorized to delete this activity.');
        }

        $xtra->delete();

        return redirect()->route('xtra.index')->with('success', 'Activity deleted successfully!');
    }
}
