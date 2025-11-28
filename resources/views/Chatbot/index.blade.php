@extends('Layouts.App')

@section('title', 'chatbot')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-4">Chatbot Page</h1>

        <!-- FORM -->
        <form action="{{ route('chatbot.get') }}" method="POST">
            @csrf

            <textarea
                id="prompt"
                rows="4"
                class="border p-2 w-full"
                placeholder="Tulis pertanyaanmu..."
                name="prompt"
            >{{ old('prompt') }}</textarea>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded mt-2"
            >
                Kirim
            </button>
        </form>

        <!-- HASIL -->
        @isset($answer)
            <h2 class="mt-6 font-semibold">Jawaban:</h2>
            <textarea
                class="border p-2 w-full bg-gray-100"
                rows="6"
            >{{ $answer }}</textarea>
        @endisset

    </div>
@endsection
