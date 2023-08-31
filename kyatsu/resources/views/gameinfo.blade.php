@extends("maintemplate")

@section("http_headers")
<title>Kyatsu! - Heroes</title>
<link href="css/gameinfo.css" rel="stylesheet">
@endsection
@section("http_body")

<head>
  <title>Kyatsu - Info</title>
</head>

<body class="html">
  <div class="col">
 <div class="row">
  <div class="col-6 d-flex justify-content-center align-items-center">
    <img src="https://cdn-icons-png.flaticon.com/512/1496/1496108.png">
  </div>
  <div class="col-6 ">
    <h1>Como jugar</h1>
     <div class="row">
      <div clasS="col-8 niggabackground">
        <p>Kyatsu! es un enfrentamiento estrategico entre equipos, en el cual debes elegir un personaje con habilidades unicas y colaborar con tus compañeros para destruir la base enemiga. Coordina tus acciones, mejora tu personaje y domina el mapa, utilizando tácticas de combate y tomando decisiones rápidas para obtener la victoria en batallas intensas y competitivas.</p>
       <center> <button class="playnow">JUEGA AHORA!</button>
      </div>
     </div>
  </div>
 </div>

 <div class="row">
  <div class="col-6">
    <h1>Personajes</h1>
     <div class="row">
      <div clasS="col-8 niggabackground">
        <p>Elige a tu personaje favorito, hay una gran cantidad de ellos para seleccionar, ya sea que quieras tener un rol mas agresivo o ser esa alma bondadosa que cura a sus aliados, hay un lugar para ti en Kyatsu!</p>
       <center> <button class="playnow">JUEGA AHORA!</button>
      </div>
     </div>
  </div>
  <div class="col-6 d-flex justify-content-center align-items-center">
    <img src="{{url('img/IvanAborigen.png')}}" width="50%" height="50%">
  </div>
 </div>

 </div>
</body>

@php
  echo(auth()->user())
  @endphp
  <P> a </P>
@endsection("http_body")