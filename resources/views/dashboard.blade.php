@extends('layouts.app')

@section('title', 'Dashboard - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <p class="mt-2 text-sm text-gray-700">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
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
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $todayClasses->count() }}</p>
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
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $nextExams->count() }}</p>
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
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="{{ $class->subject->color ?? 'bg-gray-500' }} h-12 w-1 rounded-full"></div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">{{ $class->subject->name }}</h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ \Carbon\Carbon::parse($class->start_time)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($class->end_time)->format('H:i') }}</p>
                                <p class="text-sm text-gray-500">{{ $class->room }} •
                                    {{ $class->subject->lecture_name ?? 'N/A' }}</p>
                            </div>
                            <span class="text-xs font-medium text-gray-500">{{ $class->subject->code }}</span>
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
                    <a href="{{ route('tasks.index') }}"
                        class="text-sm font-medium text-primary-600 hover:text-primary-700">View all</a>
                </div>
                <div class="p-6 space-y-3">
                    @forelse ($upcomingTasks as $task)
                        @php
                            $dueDate = \Carbon\Carbon::parse($task->due_date);
                            $isOverdue = $dueDate->isPast() && !$dueDate->isToday();
                            $isDueToday = $dueDate->isToday();

                            $statusClass = 'bg-blue-100 text-blue-800';
                            $statusText = 'Scheduled';
                            if ($isOverdue) {
                                $statusClass = 'bg-red-100 text-red-800';
                                $statusText = 'Overdue';
                            } elseif ($isDueToday) {
                                $statusClass = 'bg-amber-100 text-amber-800';
                                $statusText = 'Due Today';
                            }
                        @endphp
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="{{ $task->subject->color ?? 'bg-gray-500' }} h-8 w-1 rounded-full"></div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate">{{ $task->title }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ $task->type }} • {{ $task->subject->name ?? 'N/A' }} •
                                    {{ $dueDate->format('d M Y') }}</p>
                            </div>
                            <span
                                class="px-2 py-1 text-xs font-medium rounded-full {{ $statusClass }}">{{ $statusText }}</span>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-500">No upcoming tasks. You're all clear!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Next Exams Section -->
        <div class="mt-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Next Exams</h3>
                <a href="{{ route('exams.index') }}"
                    class="text-sm font-medium text-primary-600 hover:text-primary-700">View all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($nextExams as $exam)
                    @php
                        $examDate = \Carbon\Carbon::parse($exam->due_date);
                        $now = \Carbon\Carbon::now();
                        $daysUntil = $now->startOfDay()->diffInDays($examDate->startOfDay(), false);

                        $statusClass = '';
                        $statusText = '';

                        if ($daysUntil < 0) {
                            $statusClass = 'bg-gray-100 text-gray-700';
                            $statusText = 'Passed';
                        } elseif ($daysUntil == 0) {
                            $statusClass = 'bg-amber-100 text-amber-800';
                            $statusText = 'Today';
                        } else {
                            $statusClass = 'bg-blue-100 text-blue-800';
                            $statusText = 'H-' . $daysUntil;
                        }
                    @endphp
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="h-2 w-full {{ $exam->subject->color ?? 'bg-gray-200' }}"></div>
                        <div class="p-5">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-600">{{ $exam->subject->code ?? 'N/A' }}</p>
                                <span class="text-xs font-bold px-3 py-1 rounded-full {{ $statusClass }}">
                                    {{ $statusText }}
                                </span>
                            </div>
                            <h4
                                class="mt-2 text-lg font-semibold text-gray-800 group-hover:text-primary-600 transition-colors duration-300">
                                {{ $exam->subject->name ?? 'N/A' }}</h4>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ $examDate->format('d M Y') }}</span>
                                <span class="mx-2 text-gray-300">|</span>
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $exam->room ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">No upcoming exams. Keep up the good work!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
