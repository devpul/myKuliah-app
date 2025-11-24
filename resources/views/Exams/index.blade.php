@extends('layouts.app')

@section('title', 'Exams - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Header -->
                <div class="sm:flex sm:items-center sm:justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Exams</h1>
                        <p class="mt-2 text-sm text-gray-700">Track your upcoming exams and revisions</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('exams.create') }}"
                            class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Exam
                        </a>
                    </div>
                </div>

                <!-- Exams List -->
                <div class="space-y-4">
                    @forelse ($exams as $exam)
                        @php
                            $examDate = \Carbon\Carbon::parse($exam->due_date);
                            $isPassed = $examDate->isPast();

                            if ($isPassed) {
                                $statusText = 'Passed';
                                $statusColor = 'text-gray-500';
                            } elseif ($examDate->isToday()) {
                                $statusText = 'Today';
                                $statusColor = 'text-red-600';
                            } elseif ($examDate->diffInDays($today) == 1) {
                                $statusText = 'Tomorrow';
                                $statusColor = 'text-amber-600';
                            } else {
                                $statusText = 'Upcoming';
                                $statusColor = 'text-blue-600';
                            }
                        @endphp

                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="{{ $exam->subject->color ?? 'bg-gray-500' }} h-full w-1 rounded-full"></div>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $exam->title ?? 'N/A' }}
                                                </h3>
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $exam->subject->color ?? 'bg-gray-500' }} bg-opacity-10 text-gray-900">
                                                    {{ $exam->subject->name ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-4">{{ $exam->subject->code ?? 'N/A' }}</p>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $examDate->format('d M Y') }}
                                                </div>
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($exam->time)->format('H:i') }}
                                                </div>
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $exam->room ?? 'N/A' }}
                                                </div>
                                            </div>

                                            @if ($exam->description)
                                                <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                                    <p class="text-sm text-amber-900">
                                                        <svg class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        {{ $exam->description }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex flex-col items-end gap-3">
                                            <div class="text-right">
                                                <div class="text-2xl font-bold {{ $statusColor }}">{{ $statusText }}
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('exams.edit', $exam->id) }}"
                                                    class="p-2 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-gray-50">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('exams.destroy', $exam->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you absolutely sure? This cannot be undone.')"
                                                        class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-50">
                                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No exams scheduled</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by adding a new exam.</p>
                            <div class="mt-6">
                                <a href="{{ route('exams.create') }}"
                                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Exam
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Sidebar - Mini Calendar & Stats -->
            <div class="mt-8 lg:mt-0">
                <!-- Mini Calendar -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ $today->format('F Y') }}</h3>
                    <div class="grid grid-cols-7 gap-1 text-center text-xs">
                        @foreach (['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $day)
                            <div class="font-semibold text-gray-600 py-2">{{ $day }}</div>
                        @endforeach

                        @php
                            $firstDayOfMonth = \Carbon\Carbon::parse($today->format('Y-m-01'));
                            $dayOfWeek = $firstDayOfMonth->dayOfWeek; // Sunday = 0, Monday = 1, ...
                            // Adjust to make Monday first day (1=Mon, ..., 7=Sun)
                            if ($dayOfWeek === 0) {
                                $dayOfWeek = 7;
                            }
                            $emptyDays = $dayOfWeek - 1; // Number of empty cells before the 1st day

                            $daysInMonth = $today->daysInMonth;
                        @endphp

                        @for ($i = 0; $i < $emptyDays; $i++)
                            <div class="py-2 text-gray-400"></div>
                        @endfor

                        @for ($day = 1; $day <= $daysInMonth; $day++)
                            @php
                                $date = \Carbon\Carbon::createFromDate($today->year, $today->month, $day);
                                $hasExam = $exams->contains(
                                    fn($e) => \Carbon\Carbon::parse($e->due_date)->format('Y-m-d') ==
                                        $date->format('Y-m-d'),
                                );
                                $isToday = $date->isSameDay($today);
                            @endphp
                            <div
                                class="py-2 {{ $isToday ? 'bg-primary-600 text-white rounded-full font-bold' : ($hasExam ? 'bg-green-100 text-green-900 rounded-full font-semibold' : 'text-gray-700') }}">
                                {{ $day }}
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Stats -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Exam Statistics</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Total Exams</span>
                            <span class="text-lg font-bold text-gray-900">{{ $exams->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">This Month</span>
                            <span
                                class="text-lg font-bold text-blue-600">{{ $exams->filter(fn($e) => \Carbon\Carbon::parse($e->due_date)->isSameMonth($today))->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Next 7 Days</span>
                            @php
                                $next7DaysCount = $exams
                                    ->filter(function ($e) use ($today) {
                                        $examDate = \Carbon\Carbon::parse($e->due_date);
                                        return $examDate->isBetween($today, $today->copy()->addDays(7), true);
                                    })
                                    ->count();
                            @endphp
                            <span class="text-lg font-bold text-amber-600">{{ $next7DaysCount }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
