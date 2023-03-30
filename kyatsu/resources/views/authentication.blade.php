@extends("maintemplate")

@section("http_body")

<body>
  @php
  echo(auth()->user())
  @endphp
  <center>
    <h1 class=""> Aca comienza la buena vida</h1>
    <h2 class=""> Una aventura epica auspiciada por Dasomnya </h2>
    <h3 class=""> ACCIÓN EN EQUIPOg • GRATIS </h3>
    <img src="img/divider.png">
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
@endsection("http_body")