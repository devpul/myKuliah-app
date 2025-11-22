@php
    $currentDay = 1; // Senin
    $dayName = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'][$currentDay];
    $todayClasses = collect($classes)->filter(fn($c) => $c['day'] == $currentDay)->sortBy('start');
@endphp

<div class="space-y-6">
    <!-- Day Selector -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center gap-4 overflow-x-auto">
            @for ($d = 1; $d <= 7; $d++)
                @php
                    $dName = ['', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'][$d];
                    $date = 9 + $d;
                @endphp
                <button
                    class="flex-shrink-0 flex flex-col items-center justify-center p-3 rounded-lg {{ $d == $currentDay ? 'bg-primary-600 text-white' : 'bg-gray-50 text-gray-700 hover:bg-gray-100' }} transition-colors">
                    <span class="text-xs font-medium">{{ $dName }}</span>
                    <span class="text-lg font-bold mt-1">{{ $date }}</span>
                </button>
            @endfor
        </div>
    </div>

    <!-- Classes List -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">{{ $dayName }}, 10 November 2025</h3>
            <p class="text-sm text-gray-600 mt-1">{{ count($todayClasses) }} classes scheduled</p>
        </div>

        <div class="p-6">
            @forelse($todayClasses as $class)
                @php
                    $subject = collect($subjects)->firstWhere('id', $class['subject_id']);
                @endphp
                <div class="flex gap-6 p-5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors mb-4 last:mb-0">
                    <!-- Time -->
                    <div class="flex-shrink-0 text-center">
                        <div class="text-sm font-semibold text-gray-900">{{ $class['start'] }}</div>
                        <div class="text-xs text-gray-500 my-2">—</div>
                        <div class="text-sm font-semibold text-gray-900">{{ $class['end'] }}</div>
                    </div>

                    <!-- Color Bar -->
                    <div class="{{ $subject['color'] }} w-1 rounded-full"></div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <h4 class="font-semibold text-gray-900 text-lg">{{ $subject['name'] }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ $subject['code'] }} •
                                    {{ $subject['lecturer'] }}</p>
                                <div class="flex items-center gap-4 mt-3">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $class['room'] }}
                                    </div>
                                    @php
                                        $duration = (strtotime($class['end']) - strtotime($class['start'])) / 60;
                                    @endphp
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $duration }} minutes
                                    </div>
                                </div>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $subject['color'] }} bg-opacity-10 text-gray-900">
                                {{ $subject['code'] }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No classes today</h3>
                    <p class="mt-1 text-sm text-gray-500">Enjoy your free day!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
