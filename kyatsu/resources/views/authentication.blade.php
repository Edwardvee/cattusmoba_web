@extends("maintemplate")

@section("http_body")

<head>
  <title>Kyatsu</title>
</head>

<body>
  @php
  echo(auth()->user())
  @endphp
  <center>
    <h1 class=""> Aca comienza la buena vida</h1>
    <h2 class=""> Una aventura epica auspiciada por Dasomnya </h2>
    <h3 class=""> ACCIÓN EN EQUIPO • GRATIS </h3>
    <img src="img/divider.png">
    <h3 class="">Login</h3>
    <form action="{{ route('login') }}" id="login_form" method="POST">
      @csrf
      <input id="validator" type="text" name="name" placeholder="Nombre de usuario/Email"></input>
      <input type="text" name="password" placeholder="Contrasenia" required></input>
      <input type="submit"></input>
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
    <h3 class=""> Register</h3>
    <form class="register-user" action="{{ route('register') }}" method="POST">
      @csrf
      <input type="text" name="name" placeholder="Nombre de usuario" required></input>
      <input type="text" name="email" placeholder="Ingrese su email" required></input>
      <input type="text" name="password" placeholder="Ingrese su contrasenia" required></input>
      <input type="text" name="password_confirmation" placeholder="Repirta su contrasenia" required></input>
      <input type="submit"></input>
    </form>

    <script>
      let login_form = document.getElementById("login_form");
      login_form.addEventListener("submit", (event) => {
        event.preventDefault();
        let validator = document.getElementById("validator");
        validator.setAttribute("name", ((validator.value.indexOf("@") == "-1") ? "name" : "email"));
        login_form.submit();
      });
  </script>
</body>
@endsection("http_body")