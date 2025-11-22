@extends('layouts.app')

@section('title', 'Edit Task - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('tasks.index') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                ← Back to Tasks
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Task</h1>

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

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Task Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required
                        class="w-full rounded-lg border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }} shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
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
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">{{ old('description', $task->description) }}</textarea>
                </div>

                <!-- Category Field -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Category
                    </label>
                    <select id="category_id" name="category_id"
                        class="w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:border-primary-500 focus:ring-primary-500">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Due Date Field -->
                <div>
                    <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Due Date <span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" id="due_date" name="due_date"
                        value="{{ old('due_date', $task->due_date) }}" required
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
                        <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low
                        </option>
                        <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium
                        </option>
                        <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High
                        </option>
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
                        <option value="doing" {{ old('status', $task->status) == 'doing' ? 'selected' : '' }}>In Progress
                        </option>
                        <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 bg-primary-600 text-white rounded-lg px-4 py-2 font-medium hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}"
                        class="flex-1 bg-gray-100 text-gray-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>

            <!-- Delete Section -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-red-900 mb-4">Danger Zone</h3>
                <p class="text-sm text-gray-600 mb-4">Once you delete this task, there is no going back.</p>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you absolutely sure? This cannot be undone.')"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700">
                        Delete Task
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
