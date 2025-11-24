@extends('layouts.app')

@section('title', 'Timetable - MyKuliah')

@section('content')
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
            @include('timetable._view-day', ['schedules' => $schedules, 'subjects' => $subjects])
        </div>

        <div id="view-week" class="block">
            @include('timetable._view-week', ['schedules' => $schedules, 'subjects' => $subjects])
        </div>

        <div id="view-month" class="hidden">
            @include('timetable._view-month', ['schedules' => $schedules, 'subjects' => $subjects])
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
