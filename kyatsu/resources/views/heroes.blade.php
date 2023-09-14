@extends("maintemplate")
@section("http_headers")
<title>Kyatsu! - Heroes</title>
<link href="{{url('css/heroes.css')}}" rel="stylesheet">

@endsection
@section("http_body")
@php 

$heroes_all = $heroes_all->toArray();
$hero_show = request()->route('name');
/* for($i = 0; $i < count($heroes_all); $i++)
{ $heroes = array_search('naruto',$heroes_all[$i]); } */
$heroes = array_search($hero_show, array_column($heroes_all, "name"));
$heroes = $heroes_all[$heroes]

@endphp
<!-- HONOR A LOS LEALES, LARGA VIDA AL EMPREADOR DE LA HUMANIDAD -->

<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  <div class="container">
    <div class="row">
      <div class="col"> <!-- descripcion de los heroes -->
        <h1 id="heroname" class="sub-estetico">{{ $heroes["name"] }}</h1>
        <div class="row">
          <div class="col-8 niggabackground">
            <h3>Actriz de voz: Ivan Quiroga</h3>
            <h6>Cumpleaños / 04-06</h6>
            <p class="message">{{ $heroes['description'] }}</p>
          </div>
        </div>
      </div>

      <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
        <img class="pj" src="{{url('img/'.  $heroes['name'] . '.png')}} ">
      </div>

      <div class="col-12 align-self-end niggabackground"> <!--selector de heroes-->
        <!-- <button class="heroes" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Melisa es la bibliotecaria de los caballeros de Favonio de Mondstadt en Kyatsu! y, a pesar de su apariencia sosa, es un ser muy inteligente y una maga con increíble talento que en realidad se cohíbe por su temor al costo del conocimiento','myImage2', 'Holas')"></button>
-->
        @php
        foreach($heroes_all as $hero_ind){

        echo "<a href='" . $hero_ind['name'] . "'><button class='heroes' id='" . $hero_ind['name'] . "' style='background-image: url(../img/" . $hero_ind['name'] ."alt". ".png)'></button></a>" ; }; @endphp </div>

      </div>
    </div>
</body>

<script>


</script>


@endsection("http_body")