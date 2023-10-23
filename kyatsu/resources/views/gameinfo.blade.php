@extends('maintemplate')
@section("http_headers")
<link href="css/gameinfo.css" rel="stylesheet">
<title> Kyatsu!</title>
@endsection
@section('http_body')

<script>
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

</script>
<header>
<div class="hero-image">
  <div class="hero-text">
      <h3> TE DAMOS LA BIENVENIDA A LA ARENA</h3>
      <h1> APRENDE LOS FUNDAMENTOS </h1>
  </div>
</div>
</header>

<main>
    <!-- Heroes -->
    <section >
<div class="hero-image quees reveal">
  <div class="hero-text">
      <h3> ¿ Qué es Kyatsu! Arena ?</h3>
      <p>Kyatsu es un juego de estrategia por equipos en el que dos equipos de cinco campeones se enfrentan para ver quién destruye antes la base del otro. Elige de entre un elenco de 10 campeones para realizar jugadas épicas, asesinar rivales y derribar torretas para alzarte con la victoria.</p>
  </div>
</div>
</section>

 
</main>

<script>


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


