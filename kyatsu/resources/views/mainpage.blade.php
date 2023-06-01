@extends('maintemplate')
@section("http_headers")
<link href="css/mainpage.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section('http_body')
 
    <header>
        <h1 class="area"> Kyatsu! Arena </h1>
        <p id="rrandommsg"> ¿Eres digno de tanta accion?</p>
        <a class="Bdownload" href="https://tlauncher.org/installer">Juega ahora</a>
    </header>

    <div class="content">

     <div class="nwn"> 
        
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

        <div class="item-scroll">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img id="myImage2" src="img/cait.png" class="img-fluid rounded-start heroImg" alt="...">
                    </div>
                    <div class="col-md-9 CrdRightSide">
                        <div class="card-body">
                            <h5 class="card-title cardTitle">Heroes increibles</h5>
                            <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a
                                tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
                            <div class="col-md-12">
                                <button class="heroesDesc" onclick="cambiarImagen('img/cait.png', 'Texto de la imagen 1','myImage2')">Daño<img class="butIcoHero" src="img/damage.png"></button>
                                <button class="heroesDesc" onclick="cambiarImagen('img/india.jpg', 'Texto de la imagen 2','myImage2')">Soporte</button>
                                <button class="heroesDesc" onclick="cambiarImagen('img/placeholder2.png', 'Texto de la imagen 3','myImage2')">Tanque</button>
                            </div>
                            <p class="" id="message">Los daños se enfocan claramente en hacer daño.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-scroll">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img id="myImage3" src="img/cait.png" class="img-fluid rounded-start heroImg" alt="...">
                    </div>
                    <div class="col-md-9 CrdRightSide">
                        <div class="card-body">
                            <h5 class="card-title cardTitle">Heroes increibles</h5>
                            <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a
                                tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
                            <div class="col-md-12">
                                <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Texto de la imagen 1','myImage3')">Daño<img class="butIcoHero" src="img/damage.png"></button>
                                <button class="heroesDesc" onclick="cambiarImagen('img/india.jpg', 'Texto de la imagen 2','myImage3')">Soporte</button>
                                <button class="heroesDesc" onclick="cambiarImagen('https://media.tenor.com/Px7kBr6Kq5kAAAAi/mordekaiser-morde.gif', 'Texto de la imagen 3','myImage3')">Tanque</button>
                            </div>
                            <p class="" id="message">Los daños se enfocan claramente en hacer daño.</p>
                        </div>
                    </div>
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
