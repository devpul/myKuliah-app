@extends('layout')

@section('content')
    <div class="flex flex-col gap-y-2">
        <h1>HALO INI DASHBOARD</h1>
        @if (session('success'))
            <div style="color:green">{{ session('success') }}</div>
        @endif
        <p>Minggu, 9 November 2025</p>
    </div>
    <h2>Welcome {{ Auth::user()->name ?? 'guest' }} 👋</h2>

    <!-- highlight cards -->
    <div class="md:grid-cols-3 grid grid-cols-1  gap-x-3 gap-y-3 ">
        <!-- card 1 -->
        <div class="bg-white px-4 py-2 shadow">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
        <!-- card 1 -->
        <div class="bg-white px-4 py-2 shadow">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
        <!-- card 1 -->
        <div class="bg-white px-4 py-2 shadow">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
    </div>

    <!-- kelas hari ini -->
    <div class="flex flex-col gap-y-4 bg-white p-6 shadow">
        <div class="flex items-center gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h2 class="font-bold text-xl">Kelas Hari Ini</h2>
        </div>

        <!-- single card 1 -->
        <div class="border-l-[0.3rem] border-blue-500">
            <div class="flex justify-between items-center p-5">
                <div class="flex flex-col">
                    <p class="font-bold text-md">Pemrograman Web</p>
                    <p class="text-sm">Lab A</p>
                </div>
                <p class="bg-gray-300 rounded-full font-semibold text-sm px-3 py-1">08:00 - 10:00</p>
            </div>
        </div>
        <!-- single card 2 -->
        <div class="border-l-[0.3rem] border-blue-500">
            <div class="flex justify-between items-center p-5">
                <div class="flex flex-col">
                    <p class="font-bold text-md">Pemrograman Web</p>
                    <p class="text-sm">Lab A</p>
                </div>
                <p class="bg-gray-300 rounded-full font-semibold text-sm px-3 py-1">08:00 - 10:00</p>
            </div>
        </div>
    </div>

    <!-- Tugas Mendatang -->
    <div class="flex flex-col gap-y-4 bg-white p-6 shadow">
        <div class="flex items-center gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h2 class="font-bold text-xl">Tugas Mendatang</h2>
        </div>

        <!-- single card 1 -->
        <div class="border-l-[0.3rem] border-blue-500">
            <div class="flex justify-between items-center p-5">
                <div class="flex flex-col">
                    <p class="font-bold text-md">Pemrograman Web</p>
                    <p class="text-sm">Lab A</p>
                </div>
                <p class="bg-gray-300 rounded-full font-semibold text-sm px-3 py-1">08:00 - 10:00</p>
            </div>
        </div>
        <!-- single card 2 -->
        <div class="border-l-[0.3rem] border-blue-500">
            <div class="flex justify-between items-center p-5">
                <div class="flex flex-col">
                    <p class="font-bold text-md">Pemrograman Web</p>
                    <p class="text-sm">Lab A</p>
                </div>
                <p class="bg-gray-300 rounded-full font-semibold text-sm px-3 py-1">08:00 - 10:00</p>
            </div>
        </div>
    </div>
    
@endsection
    