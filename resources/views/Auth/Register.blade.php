<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
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

</body>
</html>