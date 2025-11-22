@extends('layouts.app')

@section('title', 'Tasks - MyKuliah')

@section('content')
    @php
        $subjects = [
            ['id' => 1, 'code' => 'CS101', 'name' => 'Algoritma & Pemrograman', 'color' => 'bg-blue-500'],
            ['id' => 2, 'code' => 'MTK201', 'name' => 'Kalkulus II', 'color' => 'bg-green-500'],
            ['id' => 3, 'code' => 'FIS101', 'name' => 'Fisika Dasar', 'color' => 'bg-purple-500'],
            ['id' => 4, 'code' => 'ENG102', 'name' => 'English for IT', 'color' => 'bg-yellow-500'],
            ['id' => 5, 'code' => 'DB201', 'name' => 'Basis Data', 'color' => 'bg-red-500'],
        ];

        $tasks = [
            [
                'id' => 1,
                'title' => 'Tugas Algoritma Sorting',
                'subject_id' => 1,
                'due_date' => '2025-11-10',
                'priority' => 'high',
                'status' => 'due_today',
            ],
            [
                'id' => 2,
                'title' => 'Latihan Integral',
                'subject_id' => 2,
                'due_date' => '2025-11-08',
                'priority' => 'medium',
                'status' => 'overdue',
            ],
            [
                'id' => 3,
                'title' => 'Lab Report Mekanika',
                'subject_id' => 3,
                'due_date' => '2025-11-15',
                'priority' => 'high',
                'status' => 'scheduled',
            ],
            [
                'id' => 4,
                'title' => 'Essay Technology Impact',
                'subject_id' => 4,
                'due_date' => '2025-11-12',
                'priority' => 'medium',
                'status' => 'scheduled',
            ],
            [
                'id' => 5,
                'title' => 'Project ERD Design',
                'subject_id' => 5,
                'due_date' => '2025-11-05',
                'priority' => 'high',
                'status' => 'completed',
            ],
            [
                'id' => 6,
                'title' => 'Presentasi Proyek Akhir',
                'subject_id' => 1,
                'due_date' => '2025-11-18',
                'priority' => 'high',
                'status' => 'scheduled',
            ],
            [
                'id' => 7,
                'title' => 'Quiz Persiapan UTS',
                'subject_id' => 2,
                'due_date' => '2025-11-11',
                'priority' => 'low',
                'status' => 'scheduled',
            ],
            [
                'id' => 8,
                'title' => 'Laporan Praktikum 3',
                'subject_id' => 3,
                'due_date' => '2025-11-03',
                'priority' => 'medium',
                'status' => 'completed',
            ],
        ];

        $statusBadges = [
            'overdue' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Overdue'],
            'due_today' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'label' => 'Due Today'],
            'scheduled' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'Scheduled'],
            'completed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Completed'],
        ];

        $priorityBadges = [
            'high' => ['text' => 'text-red-700', 'icon' => '!!!'],
            'medium' => ['text' => 'text-yellow-700', 'icon' => '!!'],
            'low' => ['text' => 'text-gray-700', 'icon' => '!'],
        ];
    @endphp

    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tasks</h1>
                <p class="mt-2 text-sm text-gray-700">Manage your homework and assignments</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <button onclick="openModal('add-task-modal')"
                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Task
                </button>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-2 inline-flex gap-2">
                <button onclick="filterTasks('all')" id="filter-all"
                    class="px-4 py-2 text-sm font-medium rounded-lg bg-primary-600 text-white">
                    All
                </button>
                <button onclick="filterTasks('due_today')" id="filter-due_today"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Due Today
                </button>
                <button onclick="filterTasks('overdue')" id="filter-overdue"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Overdue
                </button>
                <button onclick="filterTasks('completed')" id="filter-completed"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Completed
                </button>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900">
                                <input type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Subject
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Due Date
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Priority
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-6">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white" id="tasks-tbody">
                        @foreach ($tasks as $task)
                            @php
                                $subject = collect($subjects)->firstWhere('id', $task['subject_id']);
                                $status = $statusBadges[$task['status']];
                                $priority = $priorityBadges[$task['priority']];
                            @endphp
                            <tr class="hover:bg-gray-50 task-row" data-status="{{ $task['status'] }}">
                                <td class="py-4 pl-6 pr-3">
                                    <input type="checkbox" {{ $task['status'] == 'completed' ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="{{ $subject['color'] }} h-8 w-1 rounded-full"></div>
                                        <span class="font-medium text-gray-900">{{ $subject['code'] }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-900">
                                    <div class="font-medium">{{ $task['title'] }}</div>
                                    <div class="text-gray-500 mt-1">{{ $subject['name'] }}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">
                                    {{ date('d M Y', strtotime($task['due_date'])) }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <span class="font-semibold {{ $priority['text'] }}">
                                        {{ $priority['icon'] }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <span
                                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $status['bg'] }} {{ $status['text'] }}">
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm">
                                    <button class="text-primary-600 hover:text-primary-900 font-medium">Edit</button>
                                    <button class="ml-4 text-red-600 hover:text-red-900 font-medium">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Tasks</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ count($tasks) }}</p>
                    </div>
                    <div class="h-10 w-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Completed</p>
                        <p class="text-2xl font-bold text-green-600 mt-2">
                            {{ collect($tasks)->where('status', 'completed')->count() }}</p>
                    </div>
                    <div class="h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Overdue</p>
                        <p class="text-2xl font-bold text-red-600 mt-2">
                            {{ collect($tasks)->where('status', 'overdue')->count() }}</p>
                    </div>
                    <div class="h-10 w-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Due Today</p>
                        <p class="text-2xl font-bold text-amber-600 mt-2">
                            {{ collect($tasks)->where('status', 'due_today')->count() }}</p>
                    </div>
                    <div class="h-10 w-10 bg-amber-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function filterTasks(status) {
            const rows = document.querySelectorAll('.task-row');
            const buttons = document.querySelectorAll('[id^="filter-"]');

            // Update button styles
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary-600', 'text-white');
                btn.classList.add('text-gray-700', 'hover:bg-gray-50');
            });
            document.getElementById('filter-' + status).classList.remove('text-gray-700', 'hover:bg-gray-50');
            document.getElementById('filter-' + status).classList.add('bg-primary-600', 'text-white');

            // Filter rows
            rows.forEach(row => {
                if (status === 'all' || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
@endpush
