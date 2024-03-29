  @extends("maintemplate")

  @section("http_headers")
  <title>Kyatsu</title>
  <script src="{{ url('js/auth.js') }}"></script>
  <link href="css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
.btn-google {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  text-align: center;
  justify-content: center;
  text-decoration: none;
  color: #fff;
  background-color: #4285F4;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-google:hover {
  background-color: #3367D6;
}
 </style>
  
  @endsection
  @section("http_body")
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
    @if ($errors->any())
  <div class="modal" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Errores</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Mostrar el modal automáticamente cuando hay errores
    window.addEventListener('DOMContentLoaded', function () {
      var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
      errorModal.show();
    });
  </script>
@endif
      <div class="bodyregister">
        <div class="main">
          <input class="Auth_input" type="checkbox" id="chk" aria-hidden="true">
          <div class="signup">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <label for="chk" aria-hidden="true">Registrate</label>
              <p class="text-register">Unete a mas de 1.000.000 de jugadores</p>
              <a href="{{ route('oauth2') }}" class="btn-google">Ingresa con Google</a>
              <input class="Auth_input" type="text" name="name" placeholder="Usuario" required="">
              <input class="Auth_input" type="email" name="email" placeholder="Email" required="">
              <input class="Auth_input" type="text" name="password" placeholder="Contraseña" required="">
              <input class="Auth_input" type="text" name="password_confirmation" placeholder="Confirmar contraseña" required="">
   <!--            <input class="Auth_input" type="checkbox" name="remember" value="1">  -->
              

        

              <div class="d-flex justify-content-center g-recaptcha" data-sitekey="6LedxM8oAAAAANpr6zo9I7lCYEYi7L9fTmRQKsnK"></div>






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