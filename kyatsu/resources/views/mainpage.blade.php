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
            <div class="hero-img col-6">
            <img id="myImage2" src="https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif" class="img-fluid rounded-start heroImg" alt="...">
            </div>
            <div class="heroe-info col-6">
            <h5 class="card-title cardTitle">Heroes increibles</h5>
                                <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a
                                    tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
            </div>
        </div>
    </section>
</main>

@endsection("http_body")

<style>


</style>

