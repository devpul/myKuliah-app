@extends('layouts.app')

@section('title', 'Subjects - MyKuliah')

@section('content')
    @php
        $subjects = [
            [
                'id' => 1,
                'code' => 'CS101',
                'name' => 'Algoritma & Pemrograman',
                'color' => 'bg-blue-500',
                'lecturer' => 'Dr. Ahmad Subagyo',
                'room' => 'Lab 301',
                'credits' => 3,
            ],
            [
                'id' => 2,
                'code' => 'MTK201',
                'name' => 'Kalkulus II',
                'color' => 'bg-green-500',
                'lecturer' => 'Prof. Siti Nurhaliza',
                'room' => 'Ruang 204',
                'credits' => 4,
            ],
            [
                'id' => 3,
                'code' => 'FIS101',
                'name' => 'Fisika Dasar',
                'color' => 'bg-purple-500',
                'lecturer' => 'Dr. Budi Santoso',
                'room' => 'Lab Fisika',
                'credits' => 3,
            ],
            [
                'id' => 4,
                'code' => 'ENG102',
                'name' => 'English for IT',
                'color' => 'bg-yellow-500',
                'lecturer' => 'Ms. Jessica Lee',
                'room' => 'Ruang 105',
                'credits' => 2,
            ],
            [
                'id' => 5,
                'code' => 'DB201',
                'name' => 'Basis Data',
                'color' => 'bg-red-500',
                'lecturer' => 'Dr. Rina Kusuma',
                'room' => 'Lab 302',
                'credits' => 3,
            ],
            [
                'id' => 6,
                'code' => 'WEB301',
                'name' => 'Pemrograman Web',
                'color' => 'bg-pink-500',
                'lecturer' => 'Ir. Joko Widodo',
                'room' => 'Lab 303',
                'credits' => 3,
            ],
        ];

        $totalCredits = collect($subjects)->sum('credits');
    @endphp

    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Subjects</h1>
                <p class="mt-2 text-sm text-gray-700">Manage your subjects and courses</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <button onclick="openModal('add-subject-modal')"
                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Subject
                </button>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Subjects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ count($subjects) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Credits</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalCredits }}</p>
                    </div>
                    <div class="h-12 w-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Average Credits</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            {{ number_format($totalCredits / count($subjects), 1) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($subjects as $subject)
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden">
                    <div class="{{ $subject['color'] }} h-3"></div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold {{ $subject['color'] }} bg-opacity-10 text-gray-900">
                                        {{ $subject['code'] }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $subject['credits'] }} SKS</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $subject['name'] }}</h3>
                            </div>
                            <div
                                class="{{ $subject['color'] }} h-10 w-10 rounded-lg bg-opacity-10 flex items-center justify-center">
                                <svg class="h-6 w-6 {{ $subject['color'] }} text-opacity-100" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $subject['lecturer'] }}</p>
                                    <p class="text-xs text-gray-500">Lecturer</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $subject['room'] }}</p>
                                    <p class="text-xs text-gray-500">Default Room</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200 flex items-center justify-between">
                            <button class="text-sm font-medium text-primary-600 hover:text-primary-700">View
                                Details</button>
                            <div class="flex gap-2">
                                <button class="p-1.5 text-gray-400 hover:text-primary-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-red-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Color Legend -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Subject Colors</h3>
            <div class="flex flex-wrap gap-4">
                @foreach ($subjects as $subject)
                    <div class="flex items-center gap-2">
                        <div class="{{ $subject['color'] }} h-4 w-4 rounded"></div>
                        <span class="text-sm text-gray-700">{{ $subject['code'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
