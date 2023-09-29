@extends('maintemplate')
@section("http_headers")
<link href="css/mainpage.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section('http_body')

<header>
<div class="hero-image">
  <div class="hero-text">
    <h1 class="titulo"> Kyatsu! Arena </h1>
    <p id="rrandommsg"> A </p>
    <a class="Bdownload" href="https://tlauncher.org/installer">Jugar ahora</a>
  </div>
</div>
</header>

<main>
    <!-- Heroes -->
    <section>

        <div class="heroes-image row">
              <div class="hero-img col-6 d-flex justify-content-center">
                  <img id="myImage2" src="https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif" class="img-fluid rounded-start heroImg" alt="...">
              </div>
              <div class="heroe-info col-6 p-3">
                    <h2 style="color: #FAF1CF;">Heroes unicos </h5>
                    <p style="color:rgb(152, 210, 245);">Ya sea que prefieras lanzarte directo a la batalla, apoyar a tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
                    <div class="col-md-12">
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Texto de la imagen 1','myImage2')">Daño</button>
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/WocrE_nW-pQAAAAi/lisichka.gif', 'Texto de la imagen 2','myImage2')">Soporte</button>
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/Px7kBr6Kq5kAAAAi/mordekaiser-morde.gif', 'Texto de la imagen 3','myImage2')"><img src="{{url('img/shield.png')}}"></button>
                    </div>
                    <p style="color: rgb(152, 210, 245)" id="message">Los daños se enfocan claramente en hacer daño.</p>
              </div>
        </div>

    </section>

    <!-- Noticias -->
    <section>

    </section>



</main>

@endsection("http_body")

<style>


</style>

<script>
  var MPtext = ["¿Eres digno de tanta accion?", "Se parte de la historia", "¿Seras nuestro nakama?",
        "Te odiamos Nico", "¿Es la primera vez que te vemos?", "Welcome to the jungle", "¿Como llegaste a aqui?"
    ];
    var rand = Math.floor(Math.random() * MPtext.length);
    var randtext = MPtext[rand];
    document.getElementById("rrandommsg").innerHTML = randtext;

    function cambiarImagen(src, mensaje, img) {
        var imagen = document.getElementById(img);
        var message = document.getElementById("message");

        setTimeout(function() {
            imagen.src = src;
            message.textContent = mensaje;
            imagen.classList.add("animate-image"); // Agrega la clase "animate-image"
        }, 100);
        imagen.classList.remove("animate-image");

    }

</script>