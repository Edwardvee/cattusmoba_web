@extends("maintemplate")

@section("http_body")
<head>
  <title>Kyatsu - Info</title>
  <link rel="stylesheet" href="{{url('css/users.css')}}">

</head>

<br>
<br><br>
<div class="container-fluid">
  <div class="wrapper">
    <div class="header">
      <div class="profile-icon">
        <img src="{{url('img/f.png')}}">
        <div class="level"><span class="level">100
        </span></div>
      </div>
      <div class="info">
        <div class="name">
          <h1 class="player-name"> {{ $user["name"]}}</h1>
        </div>
        <div class="creation-date">
          <p>Creado en: {{ $user["created_at"]}}</p>
        </div>
      </div>
      
    </div>
  </div>
  @auth
@php
$username = auth()->user()->uuid ;
if($username == $user["uuid"]){
  echo("este es tu perfil");
}
else {
  echo("a");
}
@endphp
@endauth

<p>Partidas recientes</p>

<div class="content"></div>

</div>

@endsection("http_body")