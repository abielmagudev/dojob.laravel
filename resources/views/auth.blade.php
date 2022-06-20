<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate</title>
</head>
<body>
    @if( $errors->any() )
    <p>Oops! The email or password are incorrect</p>
    @endif

    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        <div>
            <label for="inputEmail">Email</label>
            <input type="email" name="email" id="inputEmail">
        </div>
        <div>
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
