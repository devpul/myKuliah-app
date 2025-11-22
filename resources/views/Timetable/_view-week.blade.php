@php
    $days = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    $timeSlots = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
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

                    @for ($day = 1; $day <= 5; $day++)
                        <div class="p-2 border-l border-gray-200 relative">
                            @php
                                $dayClasses = collect($classes)->filter(function ($class) use ($day, $time) {
                                    return $class['day'] == $day && $class['start'] == $time;
                                });
                            @endphp

                            @foreach ($dayClasses as $class)
                                @php
                                    $subject = collect($subjects)->firstWhere('id', $class['subject_id']);
                                @endphp
                                <div
                                    class="p-3 rounded-lg {{ $subject['color'] }} bg-opacity-10 border-l-4 {{ $subject['color'] }} hover:shadow-md transition-shadow cursor-pointer h-full">
                                    <div class="font-semibold text-sm text-gray-900">{{ $subject['code'] }}</div>
                                    <div class="text-xs text-gray-700 mt-1 line-clamp-2">{{ $subject['name'] }}</div>
                                    <div class="text-xs text-gray-600 mt-1">{{ $class['room'] }}</div>
                                    <div class="text-xs text-gray-500 mt-1">{{ $class['start'] }} - {{ $class['end'] }}
                                    </div>
                                </div>
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
                <div class="h-4 w-4 rounded {{ $subject['color'] }}"></div>
                <span class="text-sm text-gray-700">{{ $subject['code'] }} - {{ $subject['name'] }}</span>
            </div>
        @endforeach
    </div>
</div>
