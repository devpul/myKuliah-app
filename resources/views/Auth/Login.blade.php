
    <h1>LOGIN FORM</h1>

    @if (session('failed'))
        <div style="color:red">{{ session('failed') }}</div>
    @elseif (session('success'))
        <div style="color:red">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('store_login') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="">email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="">password</label>
            <input type="password" name="password" required>
        </div>  
        <button type="submit">Log in</button>
    </form>

    