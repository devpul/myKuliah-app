@extends('layouts.app')

@section('title', 'Xtra Activities - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Xtra Activities</h1>
                <p class="mt-2 text-sm text-gray-700">Track your extracurricular activities and commitments</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('xtra.create') }}"
                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Activity
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Category Filter -->
        <div class="mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-2 inline-flex gap-2 flex-wrap">
                <button onclick="filterCategory('all')" id="cat-all"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    All
                </button>
                @foreach ($categoryConfig as $key => $config)
                    <button onclick="filterCategory('{{ $key }}')" id="cat-{{ $key }}"
                        class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                        {{ $config['label'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Activities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($activities as $activity)
                @php
                    $config = $categoryConfig[$activity->category] ?? $categoryConfig['other'];
                    $activityDate = \Carbon\Carbon::parse($activity->date);
                    $daysUntil = $currentDate->startOfDay()->diffInDays($activityDate->startOfDay(), false);
                    $bgColor = 'bg-' . $config['color'] . '-500';
                    $textColor = 'text-' . $config['color'] . '-600';
                    $ringColor = 'ring-' . $config['color'] . '-500';
                @endphp

                <div class="activity-card bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden"
                    data-category="{{ $activity->category }}">
                    <div class="{{ $bgColor }} h-2"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-start gap-4 mb-4">
                                <div class="{{ $bgColor }} bg-opacity-10 rounded-lg p-3">
                                    <svg class="h-6 w-6 {{ $textColor }}" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $config['icon'] }}" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $activity->name }}</h3>
                                    <span
                                        class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $bgColor }} bg-opacity-10 {{ $textColor }}">
                                        {{ $config['label'] }}
                                    </span>
                                </div>
                            </div>

                            <p class="text-sm text-gray-600 mb-4 line-clamp-2 min-h-[40px]">{{ $activity->description }}</p>

                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $activityDate->format('d M Y') }} • {{ \Carbon\Carbon::parse($activity->time)->format('H:i') }}
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $activity->location ?? 'No location' }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium">
                                    @if ($daysUntil < 0)
                                        <span class="text-gray-500">Passed {{ abs($daysUntil) }} days ago</span>
                                    @elseif ($daysUntil == 0)
                                        <span class="text-amber-600">Today</span>
                                    @else
                                        <span class="text-blue-600">In {{ $daysUntil }} days</span>
                                    @endif
                                </span>
                                <div class="flex gap-2">
                                    <a href="{{ route('xtra.edit', $activity->id) }}" class="p-1.5 text-gray-400 hover:text-primary-600 rounded hover:bg-gray-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('xtra.destroy', $activity->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600 rounded hover:bg-gray-50" onclick="return confirm('Are you sure you want to delete this activity?')">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No extra activities found</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by adding a new activity.</p>
                    <div class="mt-6">
                        <a href="{{ route('xtra.create') }}" class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Activity
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $activities->links() }}
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function filterCategory(category) {
            let url = "{{ route('xtra.index') }}";
            if (category !== 'all') {
                url += "?category=" + category;
            }
            window.location.href = url;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('category') || 'all';

            const buttons = document.querySelectorAll('[id^="cat-"]');
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary-600', 'text-white');
                btn.classList.add('text-gray-700', 'hover:bg-gray-50');
            });

            const activeButton = document.getElementById('cat-' + category);
            if (activeButton) {
                activeButton.classList.remove('text-gray-700', 'hover:bg-gray-50');
                activeButton.classList.add('bg-primary-600', 'text-white');
            }
        });
    </script>
@endpush
