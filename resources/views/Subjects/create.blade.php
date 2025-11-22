@extends('layouts.app')

@section('title', 'Create Subject - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('subjects.index') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                ← Back to Subjects
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Subject</h1>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-sm font-medium text-red-900 mb-2">Please fix the following errors:</h3>
                    <ul class="list-disc list-inside space-y-1 text-sm text-red-800">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subjects.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Subject Name -->
                <div>
                    <label for="subject_name" class="block text-sm font-medium text-gray-700 mb-2">
                        Subject Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="subject_name" name="subject_name" value="{{ old('subject_name') }}" required
                        class="w-full rounded-lg border {{ $errors->has('subject_name') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="e.g., Algoritma & Pemrograman">
                    @error('subject_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <!-- Semester -->
                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">
                            Semester <span class="text-red-500">*</span>
                        </label>
                        <select id="semester" name="semester" required
                            class="w-full rounded-lg border {{ $errors->has('semester') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                            <option value="">-- Select --</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </select>
                        @error('semester')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Credits -->
                    <div>
                        <label for="credits" class="block text-sm font-medium text-gray-700 mb-2">
                            Credits (SKS) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="credits" name="credits" value="{{ old('credits') }}" required
                            min="1" max="10"
                            class="w-full rounded-lg border {{ $errors->has('credits') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        @error('credits')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Lecturer -->
                <div>
                    <label for="lecture_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Lecturer
                    </label>
                    <select id="lecture_id" name="lecture_id"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        <option value="">-- Select Lecturer --</option>
                        @foreach ($lectures as $lecture)
                            <option value="{{ $lecture->id }}" {{ old('lecture_id') == $lecture->id ? 'selected' : '' }}>
                                {{ $lecture->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="Add course description...">{{ old('description') }}</textarea>
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 bg-primary-600 text-white rounded-lg px-4 py-2 font-medium hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600">
                        Create Subject
                    </button>
                    <a href="{{ route('subjects.index') }}"
                        class="flex-1 bg-gray-100 text-gray-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
