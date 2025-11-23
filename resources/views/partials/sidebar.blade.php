    <div id="sidebar" class="w-[300px] bg-white min-h-screen relative px-5 shadow">
        <h2 class="mt-5">
            <h2 class="font-bold text-2xl">MyKuliah</h2>
            <p class="small text-sm">Kelola kuliahmu dengan mudah</p>
        </h2>

        <hr class="mt-5">

        <ul class="flex flex-col gap-y-3 mt-5 font-semibold">
            <a id="toggleSidebar" href="" class="hover:text-white hover:bg-blue-500 px-4 rounded-xl">
                <div class="py-3">
                    Sidebar
                </div>
            </a>

            <a href="{{ route('dashboard') }}" class="hover:text-white hover:bg-blue-500 px-4 rounded-xl">
                <div class="py-3">
                    Dashboard
                </div>
            </a>
            <a href="{{ route('subjects') }}" class="hover:text-white hover:bg-blue-500 px-4 rounded-xl">
                <div class="py-3">
                    Mata Kuliah
                </div>
            </a>
            <a href="{{ route('events') }}" class="hover:text-white hover:bg-blue-500 px-4 rounded-xl">
                <div class="py-3">
                    Jadwal
                </div>
            </a>
            <a href="" class="hover:text-white hover:bg-blue-500 px-4 rounded-xl">
                <div class="py-3">
                    Tugas
                </div>
            </a>
            <a href="{{ route('todolist') }}" class="hover:text-white hover:bg-blue-500 px-4 rounded-md">
                <div class="py-3">
                    To do list
                </div>
            </a>

            <a href="{{ route('lectures') }}" class="hover:text-white hover:bg-green-500 px-4 rounded-md">
                <div class="py-3">
                    Pengajar
                </div>
            </a>
            <form action="{{ route('store_logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-left px-4 py-2 hover:bg-red-500  w-full rounded text-black font-semibold">Log out</button>
            </form>
        </ul>

        <h2 class="absolute bottom-0 left-0 py-2 text-center bg-blue-300 w-full">Mahasiswa 1</h2>
    </div> 

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('toggleSidebar');

        document.addEventListener('DOMContentLoaded', function () {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
            
                sidebar.classList.toggle('hidden');
            });
        });
        
    </script>
