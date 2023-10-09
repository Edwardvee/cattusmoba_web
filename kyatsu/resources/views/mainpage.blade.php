@extends('maintemplate')
@section("http_headers")
<link href="css/mainpage.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section('http_body')

<header>
<div class="hero-image">
  <div class="hero-text">
    <h1 class="titulo tracking-in-expand-fwd"> Kyatsu! Arena </h1>
    <p id="rrandommsg"> A </p>
    <a class="Bdownload" href="https://tlauncher.org/installer">Jugar ahora</a>
  </div>
</div>
</header>

<main>
    <!-- Heroes -->
    <section>

        <div class="heroes-image row">
              <div class="hero-img col-6 d-flex justify-content-center reveal-l">
                  <img id="myImage2" src="https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif" class="img-fluid rounded-start heroImg" alt="...">
              </div>
              <div class="heroe-info col-6 p-3 reveal">
                    <h2 style="color: #FAF1CF;">Heroes unicos </h5>
                    <p style="color:rgb(152, 210, 245);">Ya sea que prefieras lanzarte directo a la batalla, apoyar a tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
                    <div class="col-md-12">
                                    <button class="heroesDesc adc m-3" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Texto de la imagen 1','myImage2')"><img src="{{url('img/adc.png')}}"></button>
                                    <button class="heroesDesc sup m-3" onclick="cambiarImagen('https://media.tenor.com/WocrE_nW-pQAAAAi/lisichka.gif', 'Texto de la imagen 2','myImage2')"><img src="{{url('img/sup.png')}}"></button>
                                    <button class="heroesDesc tank m-3" onclick="cambiarImagen('https://media.tenor.com/Px7kBr6Kq5kAAAAi/mordekaiser-morde.gif', 'Texto de la imagen 3','myImage2')"><img src="{{url('img/shield.png')}}"></button>
                                  </div>
                    <p style="color: rgb(152, 210, 245)" id="message">Texto de la imagen 1</p>
              </div>
        </div>

    </section>

    <!-- Zonas -->
    <section>
            <div class="zonas">
              <center><h1 style="color: #A6DEFF; padding-top: 60px;"> - Información de las áreas - </h1></center>
              <div class="items reveal">
                  <div class="item active">
                    <img src="{{url('img/ubicacion1.jpg')}}">
                  </div>
                  <div class=" item next">
                    <img src="{{url('img/ubicacion2.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('img/ubicacion3.jpg')}}">
                  </div>
                  <div class="item prev">
                    <img src="{{url('img/ubicacion4.jpg')}}">
                  </div>
                  <div class="button-container">
                    <div class="buttone"><i class="fas fa-angle-left"></i></div>
                    <div class="buttone"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
            </div>
    </section>
    
<!-- Noticias -->
    <section>
        <div style="color: #A6DEFF; padding-top: 80px;" class="noticias">
            <center><h1> - Noticias - </h1></center>
            <div class="card-group gap-5">
      @foreach ($noticiasget as $noticia)
          <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{url('img/'.  $noticia["name"] .'.png')}}" class="img-fluid rounded-start" alt="..." style="height: 100%">
                        </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <p class="card-text"><small class="text-muted">{{ $noticia["category"] }}</small></p>
                            <h5 class="card-title">{{$noticia["name"] }}</h5>
                            <p class="card-text newsText">{{ $noticia["content"] }}</p>
                            <p class="card-text"><small class="text-muted">Subido el {{ $noticia["created_at"] }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>      
      @endforeach
  </div>
        </div>
    </section>

    <section >
<div class="a quees reveal">

</section>

</main>

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

function reveal() {
  var reveals = document.querySelectorAll(".reveal");
  var revealsl = document.querySelectorAll(".reveal-l");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
  for (var i = 0; i < revealsl.length; i++) {
    var windowHeightl = window.innerHeight;
    var elementTopl = revealsl[i].getBoundingClientRect().top;
    var elementVisiblel = 150;

    if (elementTopl < windowHeightl - elementVisiblel) {
      revealsl[i].classList.add("active");
    } else {
      revealsl[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);

const slider = document.querySelector(".items");
		const slides = document.querySelectorAll(".item");
		const button = document.querySelectorAll(".buttone");

		let current = 0;
		let prev = 3;
		let next = 1;

		for (let i = 0; i < button.length; i++) {
			button[i].addEventListener("click", () => i == 0 ? gotoPrev() : gotoNext());
		}

		const gotoPrev = () => current > 0 ? gotoNum(current - 1) : gotoNum(slides.length - 1);

		const gotoNext = () => current < 3 ? gotoNum(current + 1) : gotoNum(0);

		const gotoNum = number => {
			current = number;
			prev = current - 1;
			next = current + 1;

			for (let i = 0; i < slides.length; i++) {
				slides[i].classList.remove("active");
				slides[i].classList.remove("prev");
				slides[i].classList.remove("next");
			}

			if (next == 4) {
				next = 0;
			}

			if (prev == -1) {
				prev = 3;
			}

			slides[current].classList.add("active");
			slides[prev].classList.add("prev");
			slides[next].classList.add("next");
		}

</script>
<style>

</style>
@endsection("http_body")

