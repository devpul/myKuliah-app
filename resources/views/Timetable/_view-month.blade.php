@php
    $month = 'November 2025';
    $daysInMonth = 30;
    $startDay = 6; // Saturday (1=Senin, ..., 6=Sabtu, 0=Minggu)
    $dayNames = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];

    // Create calendar grid
    $calendar = [];
    $currentWeek = [];

    // Fill empty days at start
    for ($i = 1; $i < $startDay; $i++) {
        $currentWeek[] = null;
    }

    // Fill days
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $currentWeek[] = $day;
        if (count($currentWeek) == 7) {
            $calendar[] = $currentWeek;
            $currentWeek = [];
        }
    }

    // Fill remaining empty days
    while (count($currentWeek) > 0 && count($currentWeek) < 7) {
        $currentWeek[] = null;
    }
    if (count($currentWeek) > 0) {
        $calendar[] = $currentWeek;
    }
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-gray-200">
    <!-- Calendar Header -->
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <h3 class="text-lg font-semibold text-gray-900">{{ $month }}</h3>
        </div>
        <div class="flex gap-2">
            <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Calendar Grid -->
    <div class="p-6">
        <!-- Day Names -->
        <div class="grid grid-cols-7 gap-px mb-2">
            @foreach ($dayNames as $dayName)
                <div class="text-center text-sm font-semibold text-gray-700 py-2">{{ $dayName }}</div>
            @endforeach
        </div>

        <!-- Calendar Days -->
        <div class="grid grid-cols-7 gap-px bg-gray-200 border border-gray-200 rounded-lg overflow-hidden">
            @foreach ($calendar as $week)
                @foreach ($week as $day)
                    @php
                        $isToday = $day == 10;
                        $hasClasses = false;
                        $classDots = [];

                        if ($day) {
                            // Map day number to day of week (simplified)
                            $dayOfWeek = ($day + $startDay - 1) % 7;
                            if ($dayOfWeek == 0) {
                                $dayOfWeek = 7;
                            }

                            // Check if there are classes on this day
                            $dayClasses = collect($classes)->filter(fn($c) => $c['day'] == $dayOfWeek);
                            $hasClasses = $dayClasses->count() > 0;

                            // Get unique subjects for this day
                            $classDots = $dayClasses
                                ->take(3)
                                ->map(function ($c) use ($subjects) {
                                    $subject = collect($subjects)->firstWhere('id', $c['subject_id']);
                                    return $subject['color'];
                                })
                                ->unique()
                                ->toArray();
                        }
                    @endphp

                    <div
                        class="bg-white min-h-[100px] p-3 {{ $isToday ? 'ring-2 ring-primary-600 ring-inset' : '' }} hover:bg-gray-50 transition-colors">
                        @if ($day)
                            <div class="flex flex-col h-full">
                                <span
                                    class="text-sm font-semibold {{ $isToday ? 'bg-primary-600 text-white h-6 w-6 rounded-full flex items-center justify-center' : 'text-gray-900' }}">
                                    {{ $day }}
                                </span>

                                @if ($hasClasses)
                                    <div class="mt-2 space-y-1">
                                        @foreach ($classDots as $color)
                                            <div class="flex items-center gap-1">
                                                <div class="{{ $color }} h-2 w-2 rounded-full"></div>
                                                <div class="flex-1 h-1 {{ $color }} bg-opacity-20 rounded"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

    <!-- Legend -->
    <div class="px-6 pb-6">
        <div class="flex items-center gap-6 text-sm text-gray-600">
            <div class="flex items-center gap-2">
                <div
                    class="h-6 w-6 rounded-full bg-primary-600 flex items-center justify-center text-white text-xs font-semibold">
                    10</div>
                <span>Today</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex gap-1">
                    <div class="h-2 w-2 rounded-full bg-blue-500"></div>
                    <div class="h-2 w-2 rounded-full bg-green-500"></div>
                </div>
                <span>Has Classes</span>
            </div>
        </div>
    </div>
</div>
