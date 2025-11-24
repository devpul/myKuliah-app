@extends('layouts.app')

@section('title', 'Edit Subject - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="mb-6">
            <a href="{{ route('subjects.index') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                ← Back to Subjects
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Subject</h1>

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

            <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Subject Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Subject Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $subject->name) }}" required
                        class="w-full rounded-lg border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="e.g., Algoritma & Pemrograman">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <!-- Code -->
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700 mb-2">
                            Code <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="code" name="code" value="{{ old('code', $subject->code) }}" required
                            class="w-full rounded-lg border {{ $errors->has('code') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                            placeholder="e.g., CS101">
                        @error('code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Room -->
                    <div>
                        <label for="room" class="block text-sm font-medium text-gray-700 mb-2">
                            Room
                        </label>
                        <input type="text" id="room" name="room" value="{{ old('room', $subject->room) }}"
                            class="w-full rounded-lg border {{ $errors->has('room') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                            placeholder="e.g., Room 101">
                        @error('room')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
                                <option value="{{ $i }}" {{ old('semester', $subject->semester) == $i ? 'selected' : '' }}>
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
                        <input type="number" id="credits" name="credits" value="{{ old('credits', $subject->credits) }}" required
                            min="1" max="10"
                            class="w-full rounded-lg border {{ $errors->has('credits') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        @error('credits')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">
                        Color
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach ([
                            'bg-red-500' => 'Red',
                            'bg-orange-500' => 'Orange',
                            'bg-amber-500' => 'Amber',
                            'bg-yellow-500' => 'Yellow',
                            'bg-green-500' => 'Green',
                            'bg-emerald-500' => 'Emerald',
                            'bg-cyan-500' => 'Cyan',
                            'bg-blue-500' => 'Blue',
                            'bg-indigo-500' => 'Indigo',
                            'bg-violet-500' => 'Violet',
                            'bg-pink-500' => 'Pink',
                            'bg-stone-500' => 'Stone',
                            'bg-gray-500' => 'Gray',
                        ] as $class => $name)
                            <label class="relative">
                                <input type="radio" name="color" value="{{ $class }}" class="sr-only peer" {{ old('color', $subject->color) == $class ? 'checked' : '' }}>
                                <div class="w-8 h-8 rounded-full {{ $class }} cursor-pointer ring-2 ring-transparent peer-checked:ring-offset-2 peer-checked:ring-primary-500 peer-checked:border-white"></div>
                                <div class="absolute bottom-full mb-2 hidden peer-hover:block px-2 py-1 bg-gray-700 text-white text-xs rounded-md">
                                    {{ $name }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lecturer -->
                <div>
                    <label for="lecture_name" class="block text-sm font-medium text-gray-700 mb-2">
                        Lecturer Name
                    </label>
                    <input type="text" id="lecture_name" name="lecture_name" value="{{ old('lecture_name', $subject->lecture_name) }}"
                        class="w-full rounded-lg border {{ $errors->has('lecture_name') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="e.g., Dr. Jane Doe">
                    @error('lecture_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="Add course description...">{{ old('description', $subject->description) }}</textarea>
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 bg-primary-600 text-white rounded-lg px-4 py-2 font-medium hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600">
                        Update Subject
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
