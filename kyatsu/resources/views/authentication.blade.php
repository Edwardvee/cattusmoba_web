  @extends("maintemplate")

  @section("http_body")

  <head>
    <title>Kyatsu</title>
    <script src="{{ url('js/auth.js') }}"></script>
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
    </form>
    <div class="contain">
      <div class="bodyregister">
        <div class="main">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <input class="Auth_input" type="checkbox" id="chk" aria-hidden="true">
          <div class="signup">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <label for="chk" aria-hidden="true">Registrate</label>
              <p class="text-register">Unete a mas de 1.000.000 de jugadores</p>
              <input class="Auth_input" type="text" name="name" placeholder="Usuario" required="">
              <input class="Auth_input" type="email" name="email" placeholder="Email" required="">
              <input class="Auth_input" type="text" name="password" placeholder="Contraseña" required="">
              <input class="Auth_input" type="text" name="password_confirmation" placeholder="Confirmar contraseña" required="">
              <input class="Auth_input" type="checkbox" name="remember" value="1">
              <button type="submit">Registrate</button>
            </form>
          </div>

          <div class="login">
            <form method="POST" id="login_form" action="{{ route('login') }}">
              @csrf
              <label for="chk" aria-hidden="true">Logea</label>
              <p id="prepend_login" class="text-login">Te extañabamos</p>
              <input class="Auth_input" id="validator" type="text" name="email" placeholder="Email" required="">
              <input class="Auth_input" type="password" name="password" placeholder="Contraseña" required="">
              <input class="Auth_input" type="checkbox" name="remember" required="">
              <button type="submit">Login</button>
            </form>
            <button id="another_login" onclick="javascript:swipeLogin();" id="another_login"></button>
          </div>
          <script>
            swipeLogin();
          </script>
        </div>
      </div>
    </div>
  </body>
  @endsection("http_body")