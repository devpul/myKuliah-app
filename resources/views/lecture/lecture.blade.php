@extends('layout')

@section('content')
    <div class="flex justify-between items-center">
        <div class="flex flex-col">
            <h1 class="font-bold text-2xl">Pengajar</h1>
            <p>Daftar pengajar ataupun dosen</p>
        </div>
        <a href="{{ route('create_lecture') }}" class="bg-blue-500 font-semibold text-white text-center p-2 rounded shadow">Tambah Dosen</a>
    </div>

    <div class="rounded py-4  bg-white text-center shadow">
        <div class="px-10 flex justify-between">
            <div class="flex flex-col gap-y-3">
                <h1 class="text-3xl font-bold text-blue-500">6</h1>
                <p class="text-sm">Total Mata Kuliah</p>
            </div>
            <div class="flex flex-col gap-y-3">
                <h1 class="text-3xl font-bold text-blue-500">6</h1>
                <p class="text-sm">Total Mata Kuliah</p>
            </div>
            <div class="flex flex-col gap-y-3">
                <h1 class="text-3xl font-bold text-blue-500">6</h1>
                <p class="text-sm">Total Mata Kuliah</p>
            </div>
            <div class="flex flex-col gap-y-3">
                <h1 class="text-3xl font-bold text-blue-500">6</h1>
                <p class="text-sm">Total Mata Kuliah</p>
            </div>
        </div>
    </div>
    

    <div class="lg:grid-cols-3 grid grid-cols-2  gap-x-5 gap-y-5">
        <!-- card 1 -->
        <div class="flex justify-between bg-white px-4 py-4 border-t-[0.7rem] border-blue-500 rounded-xl shadow">
            <div class="flex flex-col w-full">
                <div class="flex justify-between">
                    <div class="flex flex-col gap-y-5">
                        <div class="space-y-2">
                            <p class="bg-blue-200 text-blue-500 rounded-full inline-flex text-xs font-semibold px-3 py-1">IF301</p>
                            <h2 class="font-bold text-xl">Pemrograman Web</h2>
                        </div>
                        <div class="space-y-2">
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <p >Dr. Budi Santoso</p>
                            </div>
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p >3 SKS</p>
                            </div>
                        </div>
                    </div>
                
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </div>
                </div>
 
                <hr class="mt-4 pb-5">

                <div class="flex justify-between gap-x-3">
                    <div class="bg-blue-500 py-2 text-white w-full text-center rounded hover:bg-blue-600 transition cursor-pointer">Detail</div>
                    <div class="bg-gray-200 py-2 text-black w-full text-center rounded hover:bg-gray-300 transition cursor-pointer">Materi</div>
                </div>
            </div>
            
            
        </div>
        <!-- card 2 -->
        <div class="flex justify-between bg-white px-4 py-4 border-t-[0.7rem] border-red-500 rounded-xl shadow">
            <div class="flex flex-col w-full">
                <div class="flex justify-between">
                    <div class="flex flex-col gap-y-5">
                        <div class="space-y-2">
                            <p class="bg-blue-200 text-blue-500 rounded-full inline-flex text-xs font-semibold px-3 py-1">IF301</p>
                            <h2 class="font-bold text-xl">Pemrograman Web</h2>
                        </div>
                        <div class="space-y-2">
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <p >Dr. Budi Santoso</p>
                            </div>
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p >3 SKS</p>
                            </div>
                        </div>
                    </div>
                
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </div>
                </div>
 
                <hr class="mt-4 pb-5">

                <div class="flex justify-between gap-x-3">
                    <div class="bg-blue-500 py-2 text-white w-full text-center rounded hover:bg-blue-600 transition cursor-pointer">Detail</div>
                    <div class="bg-gray-200 py-2 text-black w-full text-center rounded hover:bg-gray-300 transition cursor-pointer">Materi</div>
                </div>
            </div>
            
            
        </div>
        <!-- card 3 -->
        <div class="flex justify-between bg-white px-4 py-4 border-t-[0.7rem] border-green-500 rounded-xl shadow">
            <div class="flex flex-col w-full">
                <div class="flex justify-between">
                    <div class="flex flex-col gap-y-5">
                        <div class="space-y-2">
                            <p class="bg-blue-200 text-blue-500 rounded-full inline-flex text-xs font-semibold px-3 py-1">IF301</p>
                            <h2 class="font-bold text-xl">Pemrograman Web</h2>
                        </div>
                        <div class="space-y-2">
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <p >Dr. Budi Santoso</p>
                            </div>
                            <div class="flex gap-x-2 text-sm">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p >3 SKS</p>
                            </div>
                        </div>
                    </div>
                
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </div>
                </div>
 
                <hr class="mt-4 pb-5">

                <div class="flex justify-between gap-x-3">
                    <div class="bg-blue-500 py-2 text-white w-full text-center rounded hover:bg-blue-600 transition cursor-pointer">Detail</div>
                    <div class="bg-gray-200 py-2 text-black w-full text-center rounded hover:bg-gray-300 transition cursor-pointer">Materi</div>
                </div>
            </div>
            
            
        </div>
    </div>
@endsection
