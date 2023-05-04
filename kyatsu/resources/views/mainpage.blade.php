@extends("maintemplate")

@section("http_headers")
<link href="css/mainpage.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section("http_body")
<body>
  <div><!--  aunque no tenga sentido esto lo centra ._. -->
    <header>
      <div class="area"> Kyatsu! Moba </div>
      <p id="rrandommsg"> ¿Eres digno de tanta accion?</p>
      <a class="Bdownload" href="https://tlauncher.org/installer">Juega ahora</a>
    </header>
  </div>
  <div class="redes">
    <p class="OurRed"> Siguenos en nuestras redes sociales</p>
    <br>
    <a href="youtube.com" class="redes_icon"><img class="Red" src="img/Discord.png" width="40px"></a>
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="redes_icon"><img class="Red" src="img/YouTube.png" width="40px"></a>
    <a href="youtube.com" class="redes_icon"><img class="Red" src="img/Facebook.png" width="40px"></a>
    <a href="https://www.instagram.com/dasomnya_industries/" class="redes_icon"> <img class="Red" src="img/Instagram.png" width="40px"></a>
  </div>
  <div class="content">
    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="col-md-4">
          <img id="myImage" src="img/cait.png" class="img-fluid rounded-start heroImg" alt="...">
        </div>
        <div class="col-md-8 CrdRightSide">
          <div class="card-body">
            <h5 class="card-title cardTitle">Heroes increibles</h5>
            <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
            <div class="col-md-12">
              <button class="heroesDesc" onclick="cambiarImagen('img/cait.png', 'Texto de la imagen 1')">Daño<img class="butIcoHero" src="img/damage.png"></button>
              <button class="heroesDesc" onclick="cambiarImagen('img/india.jpg', 'Texto de la imagen 2')">Soporte</button>
              <button class="heroesDesc" onclick="cambiarImagen('img/placeholder2.png', 'Texto de la imagen 3')">Tanque</button>
            </div>
            <p class="Descripcion" id="message">Los daños se enfocan claramente en hacer daño.</p>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>
</body>
<script>
  var MPtext = ["¿Eres digno de tanta accion?", "Se parte de la historia", "¿Seras nuestro nakama?", "Te odiamos Nico", "¿Es la primera vez que te vemos?", "Welcome to the jungle", "¿Como llegaste a aqui?"];
  var rand = Math.floor(Math.random() * MPtext.length);
  var randtext = MPtext[rand];
  document.getElementById("rrandommsg").innerHTML = randtext;
  function cambiarImagen(src, mensaje) {
    var imagen = document.getElementById("myImage");
    var message = document.getElementById("message");
    setTimeout(function() {
      imagen.src = src;
      message.textContent = mensaje;
      imagen.classList.add("animate-image"); // Agrega la clase "animate-image"
    }, 100);
    imagen.classList.remove("animate-image");
  }
</script>
@endsection("http_body")