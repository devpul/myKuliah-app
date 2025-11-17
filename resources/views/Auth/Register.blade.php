
    <h1>REGISTER FORM</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        <div class="input-group">
            <label for="">name</label>
            <input type="text" name="name" required>
        </div>
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

    <a href="{{ route('login') }}">Log in</a>

