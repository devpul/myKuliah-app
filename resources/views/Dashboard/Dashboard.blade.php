@extends('layouts.app')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 flex-1">
        <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <!-- Task Progress Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-gray-900">Tasks Progress</h3>
                <span class="text-2xl font-bold text-primary-600">50%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-primary-600 h-2 rounded-full transition-all duration-300" style="width: 50%"></div>
            </div>
            <p class="mt-2 text-xs text-gray-600">1 of 2 tasks completed</p>
        </div>

        <!-- Classes Today Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Classes Today</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
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
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
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
                <!-- Class 1 (hardcoded subject 1) -->
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <div class="bg-blue-500 h-12 w-1 rounded-full"></div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900">Algoritma & Pemrograman</h4>
                        <p class="text-sm text-gray-600 mt-1">08:00 - 10:00</p>
                        <p class="text-sm text-gray-500">Lab 301 • Dr. Ahmad Subagyo</p>
                    </div>
                    <span class="text-xs font-medium text-gray-500">CS101</span>
                </div>

                <!-- Class 2 (hardcoded subject 2) -->
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <div class="bg-green-500 h-12 w-1 rounded-full"></div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900">Kalkulus II</h4>
                        <p class="text-sm text-gray-600 mt-1">10:30 - 12:00</p>
                        <p class="text-sm text-gray-500">Ruang 204 • Prof. Siti Nurhaliza</p>
                    </div>
                    <span class="text-xs font-medium text-gray-500">MTK201</span>
                </div>
            </div>
        </div>

        <!-- Upcoming Tasks -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Upcoming Tasks</h3>
                <a href="#" class="text-sm font-medium text-primary-600 hover:text-primary-700">View
                    all</a>
            </div>
            <div class="p-6 space-y-3">
                <!-- Task 1 -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="bg-blue-500 h-8 w-1 rounded-full"></div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-gray-900 truncate">Tugas Algoritma Sorting</p>
                        <p class="text-sm text-gray-600">CS101 • 2025-11-10</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800">Due
                        Today</span>
                </div>

                <!-- Task 2 -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="bg-green-500 h-8 w-1 rounded-full"></div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-gray-900 truncate">Latihan Integral</p>
                        <p class="text-sm text-gray-600">MTK201 • 2025-11-08</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Overdue</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Next Exams Section -->
    <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Next Exams</h3>
            <a href="#" class="text-sm font-medium text-primary-600 hover:text-primary-700">View
                all</a>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Exam 1 -->
                <div class="p-4 bg-gray-50 rounded-xl border-l-4 bg-blue-50">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">Algoritma & Pemrograman</h4>
                        <span class="text-xs font-medium px-2 py-1 bg-white rounded-full text-gray-600">H-10</span>
                    </div>
                    <p class="text-sm text-gray-600">CS101</p>
                    <p class="text-sm text-gray-500 mt-2">20 Nov 2025 • Lab 301</p>
                </div>

                <!-- Exam 2 -->
                <div class="p-4 bg-gray-50 rounded-xl border-l-4 bg-green-50">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">Kalkulus II</h4>
                        <span class="text-xs font-medium px-2 py-1 bg-white rounded-full text-gray-600">H-12</span>
                    </div>
                    <p class="text-sm text-gray-600">MTK201</p>
                    <p class="text-sm text-gray-500 mt-2">22 Nov 2025 • Ruang 204</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection