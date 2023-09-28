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
$heroes = $heroes_all[$heroes];
@endphp


<script>
  $(window).on("load", function(){
    $('#character').addClass('slide-in-right');
});
$(window).on("load", function(){
    $('#description').addClass('scale-in-center');
});
</script>


<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  <div class="container">
    <div class="row">
      <div class="col"> <!-- descripcion de los heroes -->
        <h1 id="heroname" class="sub-estetico">{{ $heroes["name"] }}</h1>
        <div class="row">
          <div id="description"  style="opacity: 0;" class="col-8 darkbg">
            <h4>Actriz de voz: {{ $heroes['voice_actor'] }}</h4>
            <h6>Cumpleaños / 04-06</h6>
            <p class="message">{{ $heroes['description'] }}</p>
          </div>
        </div>
      </div>

      <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
        <img id="character" style="opacity: 0;" class="pj" src="{{url('img/'.  $heroes['name'] . '.png')}} ">
      </div>

      <div class="col-12 align-self-end darkbg"> <!--selector de heroes-->
        @php
        foreach($heroes_all as $hero_ind){
        echo "<a href='" . $hero_ind['name'] . "'><button class='heroes' id='" . $hero_ind['name'] . "' style='background-image: url(../img/" . $hero_ind['name'] ."alt". ".png)'></button></a>" ; }; @endphp </div>
      </div>
    </div>
</body>

<style>

</style>


@endsection("http_body")