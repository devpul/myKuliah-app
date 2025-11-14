<h1>HALO INI DASHBOARD</h1>

<h2>Welcome {{ Auth::user()->name ?? 'guest' }}</h2>

    <form action="{{ route('store_logout') }}" method="POST">
        @csrf

        <button type="submit">LOG OUT</button>
    </form>