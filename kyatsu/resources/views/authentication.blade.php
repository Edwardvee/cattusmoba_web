  @extends("maintemplate")

@section("http_body")

<head>
  <title>Kyatsu</title>
  <link href="css/register.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <div class="leaves">
 <div class="set">
  <div><img src="img/leaf_1.png"></div>
  <div><img src="img/leaf_2.png"></div>
  <div><img src="img/leaf_3.png"></div>
  <div><img src="img/leaf_4.png"></div>
  <div><img src="img/leaf_1.png"></div>
  <div><img src="img/leaf_2.png"></div>
  <div><img src="img/leaf_3.png"></div>
  <div><img src="img/leaf_4.png"></div>
 </div>

  </div>
  @php
  echo(auth()->user())
  @endphp

<!--     <h1 class=""> Aca comienza la buena vida</h1>
    <h2 class=""> Una aventura epica auspiciada por Dasomnya </h2>
    <h3 class=""> ACCIÓN EN EQUIPO • GRATIS </h3>
    <img src="img/divider.png"> -->
    <form action="{{ route('login') }}">
<!--       <input class="Auth_input" type="text" name="username" placeholder="Nombre de usuario" required></input class="Auth_input">
      <input class="Auth_input" type="text" name="password" placeholder="Nombre de usuario" required></input class="Auth_input"> -->
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
   <!--  <form class="register-user" action="{{ route('register') }}" method="POST">
      @csrf
      <input class="Auth_input" type="text" name="name" placeholder="Nombre de usuario" required></input class="Auth_input">
      <input class="Auth_input" type="text" name="email" placeholder="Ingrese su email" required></input class="Auth_input">
      <input class="Auth_input" type="text" name="password" placeholder="Ingrese su contrasenia" required></input class="Auth_input">
      <input class="Auth_input" type="text" name="password_confirmation" placeholder="Repirta su contrasenia" required></input class="Auth_input">
      <input class="Auth_input" type="submit"></input class="Auth_input">
    </form> -->
    <div class="contain">
    <div class="bodyregister">
    <div class="main">  	
      <input class="Auth_input" type="checkbox" id="chk" aria-hidden="true">
      
			<div class="signup">
        <form>
          <label for="chk" aria-hidden="true">Registrate</label>
          <p class="text-register">Unete a mas de 1.000.000 de jugadores</p>
					<input class="Auth_input" type="text" name="txt" placeholder="Usuario" required="">
					<input class="Auth_input" type="email" name="email" placeholder="Email" required="">
					<input class="Auth_input" type="password" name="pswd" placeholder="Contraseña" required="">
					<button>Registrate</button>
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Logea</label>
          <p class="text-login">Te extañabamos</p>
					<input class="Auth_input" type="email" name="email" placeholder="Email" required="">
					<input class="Auth_input" type="password" name="pswd" placeholder="Contraseña" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
  </div>
  </div>
</body>
@endsection("http_body")