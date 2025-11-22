@extends('layouts.app')

@section('title', 'Timetable - MyKuliah')

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

        $classes = [
            ['id' => 1, 'subject_id' => 1, 'day' => 1, 'start' => '08:00', 'end' => '10:00', 'room' => 'Lab 301'],
            ['id' => 2, 'subject_id' => 2, 'day' => 1, 'start' => '10:30', 'end' => '12:00', 'room' => 'Ruang 204'],
            ['id' => 3, 'subject_id' => 3, 'day' => 2, 'start' => '08:00', 'end' => '09:30', 'room' => 'Lab Fisika'],
            ['id' => 4, 'subject_id' => 4, 'day' => 2, 'start' => '13:00', 'end' => '14:30', 'room' => 'Ruang 105'],
            ['id' => 5, 'subject_id' => 5, 'day' => 3, 'start' => '08:00', 'end' => '10:00', 'room' => 'Lab 302'],
            ['id' => 6, 'subject_id' => 1, 'day' => 3, 'start' => '13:00', 'end' => '15:00', 'room' => 'Lab 301'],
            ['id' => 7, 'subject_id' => 2, 'day' => 4, 'start' => '10:00', 'end' => '12:00', 'room' => 'Ruang 204'],
            ['id' => 8, 'subject_id' => 3, 'day' => 5, 'start' => '08:00', 'end' => '09:30', 'room' => 'Lab Fisika'],
        ];
    @endphp

    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Timetable</h1>
                <p class="mt-2 text-sm text-gray-700">Week 45 • 10-16 November 2025</p>
            </div>
            <div class="mt-4 sm:mt-0 flex gap-2">
                <button onclick="switchView('day')" id="btn-day"
                    class="px-4 py-2 text-sm font-medium rounded-lg bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                    Day
                </button>
                <button onclick="switchView('week')" id="btn-week"
                    class="px-4 py-2 text-sm font-medium rounded-lg bg-primary-600 text-white hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                    Week
                </button>
                <button onclick="switchView('month')" id="btn-month"
                    class="px-4 py-2 text-sm font-medium rounded-lg bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                    Month
                </button>
            </div>
        </div>

        <!-- View Containers -->
        <div id="view-day" class="hidden">
            @include('timetable._view-day', ['classes' => $classes, 'subjects' => $subjects])
        </div>

        <div id="view-week" class="block">
            @include('timetable._view-week', ['classes' => $classes, 'subjects' => $subjects])
        </div>

        <div id="view-month" class="hidden">
            @include('timetable._view-month', ['classes' => $classes, 'subjects' => $subjects])
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function switchView(view) {
            // Hide all views
            document.getElementById('view-day').classList.add('hidden');
            document.getElementById('view-week').classList.add('hidden');
            document.getElementById('view-month').classList.add('hidden');

            // Show selected view
            document.getElementById('view-' + view).classList.remove('hidden');

            // Update button styles
            ['day', 'week', 'month'].forEach(v => {
                const btn = document.getElementById('btn-' + v);
                if (v === view) {
                    btn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                    btn.classList.add('bg-primary-600', 'text-white');
                } else {
                    btn.classList.remove('bg-primary-600', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                }
            });
        }
    </script>
@endpush
