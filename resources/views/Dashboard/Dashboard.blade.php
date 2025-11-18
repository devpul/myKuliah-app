@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex">
    <!-- Sidebar -->
    <div class="w-56 bg-gradient-to-b from-indigo-800 to-purple-900 text-white shadow-lg">
        <div class="p-6">
            <h2 class="text-xl flex gap-3 font-bold mb-6"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            MyKuliah</h2>
            <nav>
                <a href="#" class="block flex gap-3 py-2 px-4 rounded-lg hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="block flex gap-3 py-2 px-4 rounded-lg hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    Schedule
                </a>
                <a href="#" class="block flex gap-3 py-2 px-4 rounded-lg hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                    Tasks
                </a>
                <a href="#" class="block flex gap-3 py-2 px-4 rounded-lg hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Exams
                </a>
                <a href="#" class="block flex gap-3 py-2 px-4 rounded-lg hover:bg-white/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    Xtracurricular
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md p-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name ?? 'Mahasiswa' }}!</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600 mr-5">Nomor Mahasiswa: {{ Auth::user()->mahasiswa_id ?? 'N/A' }}</span>
                <button type="button" onclick="toggleDropdown('profile-dropdown')"
                    class="-m-1.5 flex items-center p-1.5">
                <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
                </button>
            </div>
            <div id="profile-dropdown"
                class="hidden absolute right-5   top-15 z-10 mt-5 w-48 origin-top-right rounded-xl bg-white py-2 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                <hr class="my-2">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Sign
                    out</a>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6 flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Card Jadwal Kuliah -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Jadwal Kuliah Hari Ini</h3>
                    <ul class="space-y-2">
                        @foreach($jadwal as $item)
                        <li class="flex justify-between">
                            <span class="text-gray-700">{{ $item['mata_kuliah'] }}</span>
                            <span class="text-sm text-gray-500">{{ $item['waktu'] }} - {{ $item['ruangan'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Lihat Semua Jadwal</a>
                </div>

                <!-- Card Progress Tugas -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Progress Tugas</h3>
                    @foreach($tugas as $item)
                    <div class="mb-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-gray-700">{{ $item['nama'] }}</span>
                            <span class="text-sm text-gray-500">{{ $item['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: {{ $item['progress'] }}%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Deadline: {{ $item['deadline'] }}</p>
                    </div>
                    @endforeach
                    <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Kelola Tugas</a>
                </div>

                <!-- Card Statistik -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Bulan Ini</h3>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-indigo-600">85%</p>
                        <p class="text-gray-600">Kehadiran Kuliah</p>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-3xl font-bold text-green-600">12</p>
                        <p class="text-gray-600">Tugas Selesai</p>
                    </div>
                </div>
            </div>

            <!-- Area Kosong untuk Konten Tambahan -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Berita & Pengumuman</h3>
                <p class="text-gray-600">Belum ada pengumuman baru. Tetap pantau untuk update terbaru!</p>
            </div>
        </main>
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

<script>
    // Toggle Chatbot
    document.getElementById('open-chatbot').addEventListener('click', function() {
        document.getElementById('chatbot').classList.toggle('hidden');
        document.getElementById('open-chatbot').classList.add('hidden');
    });
    document.getElementById('close-chatbot').addEventListener('click', function() {
        document.getElementById('chatbot').classList.add('hidden');
        document.getElementById('open-chatbot').classList.remove('hidden');
    });

    // Simulasi AI Responses (seperti Blackbox AI)
    const responses = {
        'jadwal': 'Jadwal kuliah Anda hari ini: Pemrograman Web pukul 08:00 di Lab Komputer 1. Lihat dashboard untuk detail lengkap!',
        'tugas': 'Progress tugas Anda: Algoritma 75%. Fokus selesaikan bagian terakhir untuk deadline 15 Oktober.',
        'tips belajar': 'Tips: Buat jadwal harian, istirahat setiap 1 jam, dan gunakan teknik Pomodoro untuk produktivitas maksimal.',
        'default': 'Maaf, saya belum paham pertanyaan Anda. Coba tanya tentang jadwal, tugas, atau tips belajar!'
    };

    function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }
</script>
@endsection