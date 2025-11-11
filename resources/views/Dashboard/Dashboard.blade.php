<h1>HALO INI DASHBOARD</h1>

    <form action="{{ route('store_logout') }}" method="POST">
        @csrf

        <button type="submit">LOG OUT</button>
    </form>