@extends('layouts.app')

@section('title', 'Create Exam - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="mb-6">
            <a href="{{ route('exams.index') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                ← Back to Exams
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Exam</h1>

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

            <form action="{{ route('exams.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="category_id" value="{{ $examsCategory->id }}">
                <input type="hidden" name="type" value="exam">

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Exam Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                        class="w-full rounded-lg border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="e.g., Midterm Exam">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                        placeholder="Add details about this exam...">{{ old('description') }}</textarea>
                </div>

                <!-- Subject Field -->
                <div>
                    <label for="subject_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Subject
                    </label>
                    <select id="subject_id" name="subject_id"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        <option value="">-- Select Subject --</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }} ({{ $subject->code }})
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Time Field -->
                    <div>
                        <label for="time" class="block text-sm font-medium text-gray-700 mb-2">
                            Time
                        </label>
                        <input type="time" id="time" name="time" value="{{ old('time') }}"
                            class="w-full rounded-lg border {{ $errors->has('time') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        @error('time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Room Field -->
                    <div>
                        <label for="room" class="block text-sm font-medium text-gray-700 mb-2">
                            Room
                        </label>
                        <input type="text" id="room" name="room" value="{{ old('room') }}"
                            class="w-full rounded-lg border {{ $errors->has('room') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500"
                            placeholder="e.g., Room 101">
                        @error('room')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Due Date Field -->
                <div>
                    <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Due Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required
                        class="w-full rounded-lg border {{ $errors->has('due_date') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                    @error('due_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Priority Field -->
                <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">
                        Priority <span class="text-red-500">*</span>
                    </label>
                    <select id="priority" name="priority" required
                        class="w-full rounded-lg border {{ $errors->has('priority') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        <option value="">-- Select Priority --</option>
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Field -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full rounded-lg border {{ $errors->has('status') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        <option value="doing" {{ old('status', 'doing') == 'doing' ? 'selected' : '' }}>In Progress
                        </option>
                        <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 bg-primary-600 text-white rounded-lg px-4 py-2 font-medium hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600">
                        Create Exam
                    </button>
                    <a href="{{ route('exams.index') }}"
                        class="flex-1 bg-gray-100 text-gray-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
