<!-- Header -->
<header class="bg-white shadow-md p-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name ?? 'Mahasiswa' }}!</h1>
    <div class="flex items-center space-x-4">
        <span class="text-gray-600 mr-5">Nomor Mahasiswa: {{ Auth::user()->mahasiswa_id ?? 'N/A' }}</span>
        <button type="button" onclick="toggleDropdown('profile-dropdown')"
            class="-m-1.5 flex items-center p-1.5">
        <img src="{{ Auth::user()->profile ? asset(Auth::user()->profile) : asset('img/profile.png') }}" alt="Avatar" class="w-10 h-10 rounded-full">
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