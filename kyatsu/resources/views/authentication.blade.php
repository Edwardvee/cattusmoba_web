<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @php
    echo(auth()->user())
    @endphp
    <form action="{{ route('login') }}">
        <input type="text" name="username" placeholder="Nombre de usuario" required></input>
        <input type="text" name="password" placeholder="Nombre de usuario" required></input>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre de usuario" required></input>
        <input type="text" name="email" placeholder="Ingrese su email" required></input>
        <input type="text" name="password" placeholder="Ingrese su contrasenia" required></input>
        <input type="text" name="password_confirmation" placeholder="Repirta su contrasenia" required></input>
        <input type="submit"></input>
    </form>
</body>
</html>