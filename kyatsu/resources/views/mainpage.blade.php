@extends('maintemplate')
@section("http_headers")
<link href="css/mainpage.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section('http_body')
 
    <header>
        <!-- HONOR A LOS LEALES, LARGA VIDA AL EMPREADOR DE LA HUMANIDAD -->
        <h1 class="area"> Kyatsu! Arena </h1>
        <p id="rrandommsg"> ¿Eres digno de tanta accion?</p>
        <a class="Bdownload" href="https://tlauncher.org/installer">Jugar ahora</a>
        <svg class="arrows">
              <path class="a1" d="M0 0 L30 32 L60 0"></path>
              <path class="a2" d="M0 20 L30 52 L60 20"></path>
              <path class="a3" d="M0 40 L30 72 L60 40"></path>
            </svg>
    </header>

    <div class="content">
        <div class="row">
            <div class="nwn"> 
            <div class="col-12">
            <div class="card mb-3 ewe" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img id="myImage2" src="https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif" class="img-fluid rounded-start heroImg" alt="...">
                        </div>
                        <div class="col-md-9 CrdRightSide">
                            <div class="card-body">
                                <h5 class="card-title cardTitle">Heroes increibles</h5>
                                <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a
                                    tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
                                <div class="col-md-12 potente">
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Texto de la imagen 1','myImage2')">Daño<img class="butIcoHero" src="img/damage.png"></button>
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/WocrE_nW-pQAAAAi/lisichka.gif', 'Texto de la imagen 2','myImage2')">Soporte</button>
                                    <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/Px7kBr6Kq5kAAAAi/mordekaiser-morde.gif', 'Texto de la imagen 3','myImage2')">Tanque</button>
                                </div>
                                <p class="" id="message">Los daños se enfocan claramente en hacer daño.</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>

        <div class="col-12 notibg">
        <h1 class="mx-auto" style="color: white; width:250px"> - Notitoon - </h1> 
            <div class="row">
               <div class="col-6"> <!-- Aca va el carrousel de las noticias -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="https://static1-es.millenium.gg/articles/9/42/33/9/@/220251-faker-worlds-article_m-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://ichef.bbci.co.uk/news/640/cpsprodpb/18600/production/_119604899_fc1d42e8-4467-494a-af5c-35dd663dfffc.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://i.ytimg.com/vi/Av5SUjI_hR8/maxresdefault.jpg" alt="Third slide">
                        </div>
                        </div>
                </div>
               </div>
               <div class="col-6 niggabackground noti"><!-- Aca van los links a las noticas -->
                    <h4 class="mx-auto" style="width: 150px;">Mas reciente</h4>
                    <br>
                    <button class="linknot w-100"> SKT1 vuelve a ganar el world de Kyatsu! </button>
                    <br>
                    <button class="linknot w-100"> Encuentran a Ivan Quiroga en Afganistan</button>
                    <br>
                    <button class="linknot w-100"> Eventos de la version 12.4 </button>
                    <br>
                    <button class="linknot w-100"> ¡JoseDeOdo da sus consejos para JGs!</button>
                    <br>
                    <button> + Mas</button>

               </div> 
            </div>
        </div>

        <div class="col-12">
            <h1 class="mx-auto" style="width:250px"> Caracteristicas del juego </h1>

        </div>



        </div>
        </div>











        <script>
            var MPtext = ["¿Eres digno de tanta accion?", "Se parte de la historia", "¿Seras nuestro nakama?",
                "Te odiamos Nico", "¿Es la primera vez que te vemos?", "Welcome to the jungle", "¿Como llegaste a aqui?"
            ];
            var rand = Math.floor(Math.random() * MPtext.length);
            var randtext = MPtext[rand];
            document.getElementById("rrandommsg").innerHTML = randtext;

            function cambiarImagen(src, mensaje,img) {
                var imagen = document.getElementById(img);
                var message = document.getElementById("message");

                setTimeout(function() {
                    imagen.src = src;
                    message.textContent = mensaje;
                    imagen.classList.add("animate-image"); // Agrega la clase "animate-image"
                }, 100);
                imagen.classList.remove("animate-image");

            }
            $(document).ready(function() {
                $(window).scroll(function() {
                    $(".item-scroll").each(function(i) {
                        var bottom_of_object = $(this).offset().top - 300 + $(this).outerHeight();
                        var bottom_of_window = $(window).scrollTop() + $(window).height();

                        if (bottom_of_window > bottom_of_object) {

                            $(this).animate({
                                'opacity': '1'
                            }, 500);

                        }
                    });
                });
            });
        </script>
    </div>

@endsection("http_body")
