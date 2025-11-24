<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My-Kuliah</title>
    {{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> --}}
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script> 
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex">
        @include('layouts/sidebar')
    <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            @include('layouts/header')
            @yield('content')
        </div>
    </div>

    <!-- AI Chatbot Widget (Floating) -->
<div id="chatbot" class="fixed bottom-4 right-4 w-80 h-96 bg-white rounded-lg shadow-2xl border border-gray-200 hidden flex flex-col">
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4 rounded-t-lg flex justify-between items-center">
        <h4 class="font-semibold">AI Assistant - Blackbox Style</h4>
        <button id="close-chatbot" class="text-white hover:text-gray-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div id="chat-messages" class="flex-1 p-4 overflow-y-auto bg-gray-50">
        <div class="text-sm text-gray-600 mb-2">AI: Halo! Saya AI Assistant untuk membantu dengan pertanyaan perkuliahan. Apa yang bisa saya bantu hari ini?</div>
    </div>
    <div class="p-4 border-t border-gray-200">
        <div class="flex">
            <input id="chat-input" type="text" placeholder="Tanya tentang jadwal, tugas, dll..." class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button id="send-chat" class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600">Kirim</button>
        </div>
    </div>
</div>

<!-- Chatbot Toggle Button -->
<button id="open-chatbot" class="fixed bottom-4 right-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
    </svg>
</button>

<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>