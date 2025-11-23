@extends('layout')

@section('content')
    <h1>INI TODOLIST</h1>

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="bg-green-500 text-white px-5 py-3">{{ session('success') }}</div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-group">
            <label>File</label>
            <input type="file" name="file_attachment" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-1 mt-2">Submit</button>
    </form>
@endsection
