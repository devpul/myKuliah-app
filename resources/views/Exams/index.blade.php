@extends('layouts.app')

@section('title', 'Exams - MyKuliah')

@section('content')
    @php
        $subjects = [
            ['id' => 1, 'code' => 'CS101', 'name' => 'Algoritma & Pemrograman', 'color' => 'bg-blue-500'],
            ['id' => 2, 'code' => 'MTK201', 'name' => 'Kalkulus II', 'color' => 'bg-green-500'],
            ['id' => 3, 'code' => 'FIS101', 'name' => 'Fisika Dasar', 'color' => 'bg-purple-500'],
            ['id' => 4, 'code' => 'ENG102', 'name' => 'English for IT', 'color' => 'bg-yellow-500'],
            ['id' => 5, 'code' => 'DB201', 'name' => 'Basis Data', 'color' => 'bg-red-500'],
        ];

        $exams = [
            [
                'id' => 1,
                'subject_id' => 1,
                'date' => '2025-11-20',
                'time' => '08:00',
                'room' => 'Lab 301',
                'notes' => 'UTS - Bawa kalkulator',
                'type' => 'UTS',
            ],
            [
                'id' => 2,
                'subject_id' => 2,
                'date' => '2025-11-22',
                'time' => '10:00',
                'room' => 'Ruang 204',
                'notes' => 'UTS - Closed book',
                'type' => 'UTS',
            ],
            [
                'id' => 3,
                'subject_id' => 3,
                'date' => '2025-11-25',
                'time' => '13:00',
                'room' => 'Lab Fisika',
                'notes' => 'Praktikum - Bawa jas lab',
                'type' => 'Praktikum',
            ],
            [
                'id' => 4,
                'subject_id' => 4,
                'date' => '2025-11-18',
                'time' => '14:00',
                'room' => 'Ruang 105',
                'notes' => 'Speaking test',
                'type' => 'Quiz',
            ],
            [
                'id' => 5,
                'subject_id' => 5,
                'date' => '2025-12-05',
                'time' => '08:00',
                'room' => 'Lab 302',
                'notes' => 'UAS - Bawa laptop',
                'type' => 'UAS',
            ],
        ];

        $currentDate = strtotime('2025-11-10');
    @endphp

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
                        <button onclick="openModal('add-exam-modal')"
                            class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Exam
                        </button>
                    </div>
                </div>

                <!-- Exams List -->
                <div class="space-y-4">
                    @foreach ($exams as $exam)
                        @php
                            $subject = collect($subjects)->firstWhere('id', $exam['subject_id']);
                            $examDate = strtotime($exam['date']);
                            $daysUntil = floor(($examDate - $currentDate) / (60 * 60 * 24));

                            if ($daysUntil < 0) {
                                $countdownText = 'Passed';
                                $countdownColor = 'text-gray-500';
                            } elseif ($daysUntil == 0) {
                                $countdownText = 'Today';
                                $countdownColor = 'text-red-600';
                            } elseif ($daysUntil == 1) {
                                $countdownText = 'Tomorrow';
                                $countdownColor = 'text-amber-600';
                            } else {
                                $countdownText = 'H-' . $daysUntil;
                                $countdownColor = 'text-blue-600';
                            }
                        @endphp

                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="{{ $subject['color'] }} h-full w-1 rounded-full"></div>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $subject['name'] }}</h3>
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $subject['color'] }} bg-opacity-10 text-gray-900">
                                                    {{ $exam['type'] }}
                                                </span>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-4">{{ $subject['code'] }}</p>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ date('d M Y', $examDate) }}
                                                </div>
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $exam['time'] }}
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
                                                    {{ $exam['room'] }}
                                                </div>
                                            </div>

                                            @if ($exam['notes'])
                                                <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                                    <p class="text-sm text-amber-900">
                                                        <svg class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        {{ $exam['notes'] }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex flex-col items-end gap-3">
                                            <div class="text-right">
                                                <div class="text-2xl font-bold {{ $countdownColor }}">{{ $countdownText }}
                                                </div>
                                                @if ($daysUntil > 0)
                                                    <div class="text-xs text-gray-500 mt-1">{{ $daysUntil }} days left
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex gap-2">
                                                <button
                                                    class="p-2 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-gray-50">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <button
                                                    class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-50">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar - Mini Calendar & Stats -->
            <div class="mt-8 lg:mt-0">
                <!-- Mini Calendar -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">November 2025</h3>
                    <div class="grid grid-cols-7 gap-1 text-center text-xs">
                        @foreach (['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $day)
                            <div class="font-semibold text-gray-600 py-2">{{ $day }}</div>
                        @endforeach

                        @for ($i = 0; $i < 6; $i++)
                            <div class="py-2 text-gray-400">{{ $i == 0 ? '' : $i }}</div>
                        @endfor

                        @for ($day = 1; $day <= 30; $day++)
                            @php
                                $hasExam = collect($exams)->contains(
                                    fn($e) => date('d', strtotime($e['date'])) == $day,
                                );
                                $isToday = $day == 10;
                            @endphp
                            <div
                                class="py-2 {{ $isToday ? 'bg-primary-600 text-white rounded-full font-bold' : ($hasExam ? 'bg-red-100 text-red-700 rounded-full font-semibold' : 'text-gray-700') }}">
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
                            <span class="text-lg font-bold text-gray-900">{{ count($exams) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">This Month</span>
                            <span
                                class="text-lg font-bold text-blue-600">{{ collect($exams)->filter(fn($e) => date('m', strtotime($e['date'])) == '11')->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Next 7 Days</span>
                            @php
                                $next7Days = collect($exams)
                                    ->filter(function ($e) use ($currentDate) {
                                        $examDate = strtotime($e['date']);
                                        return $examDate >= $currentDate &&
                                            $examDate <= $currentDate + 7 * 24 * 60 * 60;
                                    })
                                    ->count();
                            @endphp
                            <span class="text-lg font-bold text-amber-600">{{ $next7Days }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
