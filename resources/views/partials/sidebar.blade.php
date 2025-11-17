    <div class="w-[150px] bg-gray-500 min-h-screen relative">
        <h2 class="mt-5">
            My Kuliah APP
        </h2>

        <ul class="flex flex-col gap-y-3 mt-5">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a>Mata Kuliah</a>
            <a>Jadwal</a>
            <a>Tugas</a>
            <a href="{{ route('todolist') }}">To do list</a>
            <form action="{{ route('store_logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold">LOG OUT</button>
            </form>
        </ul>

        <h2 class="absolute bottom-0 left-0 py-2 text-center bg-amber-300 w-full">Mahasiswa 1</h2>
    </div>  
