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
        <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Next Exams</h3>
                <a href="{{ route('exams.index') }}"
                    class="text-sm font-medium text-primary-600 hover:text-primary-700">View all</a>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @forelse ($nextExams as $exam)
                        @php
                            $examDate = \Carbon\Carbon::parse($exam->due_date);
                            $daysUntil = \Carbon\Carbon::now()->diffInDays($examDate, false);
                        @endphp
                        <div class="p-4 bg-gray-50 rounded-xl border-l-4 {{ $exam->subject->color ?? 'border-gray-500' }}">
                            <div class="flex items-start justify-between mb-2">
                                <h4 class="font-semibold text-gray-900">{{ $exam->subject->name ?? 'N/A' }}</h4>
                                <span class="text-xs font-medium px-2 py-1 bg-white rounded-full text-gray-600">
                                    @if ($daysUntil < 0)
                                        Passed
                                    @elseif($daysUntil == 0)
                                        Today
                                    @else
                                        H-{{ $daysUntil }}
                                    @endif
                                </span>
                            </div>
                            <p class="text-sm text-gray-600">{{ $exam->subject->code ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ $examDate->format('d M Y') }} •
                                {{ $exam->room ?? 'N/A' }}</p>
                        </div>
                    @empty
                        <div class="md:col-span-3 text-center py-8">
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
    </div>
@endsection
