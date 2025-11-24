@php
    $days = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']; // For column headers
    $timeSlots = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00']; // For row headers
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <div class="min-w-[800px]">
            <!-- Header Row -->
            <div class="grid grid-cols-6 border-b border-gray-200 bg-gray-50">
                <div class="p-4 font-semibold text-gray-900 text-sm">Time</div>
                @foreach (array_slice($days, 1) as $day)
                    <div class="p-4 font-semibold text-gray-900 text-center text-sm border-l border-gray-200">
                        {{ $day }}</div>
                @endforeach
            </div>

            <!-- Time Slots -->
            @foreach ($timeSlots as $time)
                <div class="grid grid-cols-6 border-b border-gray-200 min-h-[80px]">
                    <div class="p-4 text-sm text-gray-600 font-medium border-r border-gray-200 bg-gray-50">
                        {{ $time }}</div>

                    @for ($dayOfWeekIso = 1; $dayOfWeekIso <= 5; $dayOfWeekIso++) {{-- Monday to Friday --}}
                        <div class="p-2 border-l border-gray-200 relative">
                            @php
                                $daySchedules = $schedules->filter(function ($schedule) use ($dayOfWeekIso, $time) {
                                    return $schedule->day_of_week == $dayOfWeekIso && 
                                           \Carbon\Carbon::parse($schedule->start_time)->format('H:i') <= $time &&
                                           \Carbon\Carbon::parse($schedule->end_time)->format('H:i') > $time; // Check if class overlaps this hour
                                });
                            @endphp

                            @foreach ($daySchedules as $schedule)
                                @php
                                    // Calculate height and top position for stacked classes if necessary
                                    // For simplicity, this assumes a class slot occupies the entire hour if it starts within it
                                    $startHour = \Carbon\Carbon::parse($schedule->start_time)->hour;
                                    $endHour = \Carbon\Carbon::parse($schedule->end_time)->hour;
                                    $durationHours = $endHour - $startHour;

                                    $classTop = (\Carbon\Carbon::parse($schedule->start_time)->minute / 60) * 100;
                                    $classHeight = ($durationHours + (\Carbon\Carbon::parse($schedule->end_time)->minute / 60) - (\Carbon\Carbon::parse($schedule->start_time)->minute / 60)) * 100;
                                    // Make sure it doesn't overlap the next hour slot, limit to 100% height per cell
                                    $classHeight = min($classHeight, 100); 
                                @endphp
                                @if (\Carbon\Carbon::parse($schedule->start_time)->format('H:i') == $time)
                                <div
                                    class="absolute w-[calc(100%-16px)] left-2 p-3 rounded-lg {{ $schedule->subject->color ?? 'bg-gray-400' }} bg-opacity-10 border-l-4 {{ $schedule->subject->color ?? 'border-gray-400' }} hover:shadow-md transition-shadow cursor-pointer"
                                    style="top: {{ $classTop }}%; height: {{ $classHeight }}%;">
                                    <div class="font-semibold text-sm text-gray-900">{{ $schedule->subject->code ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-700 mt-1 line-clamp-2">{{ $schedule->subject->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-600 mt-1">{{ $schedule->room ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Legend -->
<div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-sm font-semibold text-gray-900 mb-4">Subject Legend</h3>
    <div class="flex flex-wrap gap-4">
        @foreach ($subjects as $subject)
            <div class="flex items-center gap-2">
                <div class="h-4 w-4 rounded {{ $subject->color ?? 'bg-gray-400' }}"></div>
                <span class="text-sm text-gray-700">{{ $subject->code ?? 'N/A' }} - {{ $subject->name }}</span>
            </div>
        @endforeach
    </div>
</div>
