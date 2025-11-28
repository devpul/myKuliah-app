@extends('layouts.app')

@section('title', 'Edit Subject - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <h1 class="mb-5">Detail Subject</h1>
        {{-- <h2>{{ $subject }}</h2> --}}
        <ul class="flex flex-col gap-y-5">
            @for ($i = 1; $i <= 16; $i++)
                <a href="{{ route('subject.pertemuan', $subject->id) }}" class="hover:bg-blue-100"><li>Pertemuan {{ $i }}</li></a>
            @endfor
        </ul>
    </div>
@endsection
