@extends('layouts.app')

@section('title', 'Dashboard - MyKuliah')

@section('content')
    @php
        $subjects = [
            [
                'id' => 1,
                'code' => 'CS101',
                'name' => 'Algoritma & Pemrograman',
                'color' => 'bg-blue-500',
                'lecturer' => 'Dr. Ahmad Subagyo',
            ],
            [
                'id' => 2,
                'code' => 'MTK201',
                'name' => 'Kalkulus II',
                'color' => 'bg-green-500',
                'lecturer' => 'Prof. Siti Nurhaliza',
            ],
            [
                'id' => 3,
                'code' => 'FIS101',
                'name' => 'Fisika Dasar',
                'color' => 'bg-purple-500',
                'lecturer' => 'Dr. Budi Santoso',
            ],
            [
                'id' => 4,
                'code' => 'ENG102',
                'name' => 'English for IT',
                'color' => 'bg-yellow-500',
                'lecturer' => 'Ms. Jessica Lee',
            ],
            [
                'id' => 5,
                'code' => 'DB201',
                'name' => 'Basis Data',
                'color' => 'bg-red-500',
                'lecturer' => 'Dr. Rina Kusuma',
            ],
        ];

        $todayClasses = [
            ['subject_id' => 1, 'start' => '08:00', 'end' => '10:00', 'room' => 'Lab 301'],
            ['subject_id' => 2, 'start' => '10:30', 'end' => '12:00', 'room' => 'Ruang 204'],
        ];

        $upcomingTasks = [
            ['title' => 'Tugas Algoritma Sorting', 'subject_id' => 1, 'due' => '2025-11-10', 'status' => 'due_today'],
            ['title' => 'Latihan Integral', 'subject_id' => 2, 'due' => '2025-11-08', 'status' => 'overdue'],
            ['title' => 'Lab Report Mekanika', 'subject_id' => 3, 'due' => '2025-11-15', 'status' => 'scheduled'],
            ['title' => 'Essay Technology Impact', 'subject_id' => 4, 'due' => '2025-11-12', 'status' => 'scheduled'],
            ['title' => 'Project ERD Design', 'subject_id' => 5, 'due' => '2025-11-18', 'status' => 'scheduled'],
        ];

        $nextExams = [
            ['subject_id' => 1, 'date' => '2025-11-20', 'room' => 'Lab 301'],
            ['subject_id' => 2, 'date' => '2025-11-22', 'room' => 'Ruang 204'],
            ['subject_id' => 3, 'date' => '2025-11-25', 'room' => 'Lab Fisika'],
        ];

        $completedTasks = 3;
        $totalTasks = 5;
        $progressPercentage = ($completedTasks / $totalTasks) * 100;
    @endphp

    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <p class="mt-2 text-sm text-gray-700">Senin, 10 November 2025</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
            <!-- Task Progress Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-900">Tasks Progress</h3>
                    <span class="text-2xl font-bold text-primary-600">{{ number_format($progressPercentage, 0) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-primary-600 h-2 rounded-full transition-all duration-300"
                        style="width: {{ $progressPercentage }}%"></div>
                </div>
                <p class="mt-2 text-xs text-gray-600">{{ $completedTasks }} of {{ $totalTasks }} tasks completed</p>
            </div>

            <!-- Classes Today Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Classes Today</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ count($todayClasses) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Upcoming Exams Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Upcoming Exams</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ count($nextExams) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Classes Today -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Classes Today</h3>
                </div>
                <div class="p-6 space-y-4">
                    @forelse($todayClasses as $class)
                        @php
                            $subject = collect($subjects)->firstWhere('id', $class['subject_id']);
                        @endphp
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="{{ $subject['color'] }} h-12 w-1 rounded-full"></div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">{{ $subject['name'] }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ $class['start'] }} - {{ $class['end'] }}</p>
                                <p class="text-sm text-gray-500">{{ $class['room'] }} • {{ $subject['lecturer'] }}</p>
                            </div>
                            <span class="text-xs font-medium text-gray-500">{{ $subject['code'] }}</span>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-500">No classes scheduled today</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Upcoming Tasks -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Upcoming Tasks</h3>
                    <a href="{{ route('tasks') }}" class="text-sm font-medium text-primary-600 hover:text-primary-700">View
                        all</a>
                </div>
                <div class="p-6 space-y-3">
                    @foreach ($upcomingTasks as $task)
                        @php
                            $subject = collect($subjects)->firstWhere('id', $task['subject_id']);
                            $statusBadges = [
                                'overdue' =>
                                    '<span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Overdue</span>',
                                'due_today' =>
                                    '<span class="px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800">Due Today</span>',
                                'scheduled' =>
                                    '<span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Scheduled</span>',
                            ];
                        @endphp
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="{{ $subject['color'] }} h-8 w-1 rounded-full"></div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate">{{ $task['title'] }}</p>
                                <p class="text-sm text-gray-600">{{ $subject['code'] }} • {{ $task['due'] }}</p>
                            </div>
                            {!! $statusBadges[$task['status']] !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Next Exams Section -->
        <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Next Exams</h3>
                <a href="{{ route('exams') }}" class="text-sm font-medium text-primary-600 hover:text-primary-700">View
                    all</a>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($nextExams as $exam)
                        @php
                            $subject = collect($subjects)->firstWhere('id', $exam['subject_id']);
                            $today = strtotime('2025-11-10');
                            $examDate = strtotime($exam['date']);
                            $daysUntil = floor(($examDate - $today) / (60 * 60 * 24));
                        @endphp
                        <div class="p-4 bg-gray-50 rounded-xl border-l-4 {{ $subject['color'] }}">
                            <div class="flex items-start justify-between mb-2">
                                <h4 class="font-semibold text-gray-900">{{ $subject['name'] }}</h4>
                                <span
                                    class="text-xs font-medium px-2 py-1 bg-white rounded-full text-gray-600">H-{{ $daysUntil }}</span>
                            </div>
                            <p class="text-sm text-gray-600">{{ $subject['code'] }}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ date('d M Y', $examDate) }} • {{ $exam['room'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
