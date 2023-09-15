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
        <img src="{{url('img/augusto.jpg')}}">
        <div class="level"><span class="level">100
          </span></div>
      </div>

      <div class="info">
        <div class="name">
          <h1 class="player-name">{{ $user["name"] }}</h1>
        </div>
        <div class="creation-date">
          <h5>Creado en: {{ $user["created_at"]}}</h5>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-12 winrates">

        <div class="row justify-content-start winrate-champ">
              <div class="col icon-side">
                <img src="{{url('img/ezreal.png')}}" alt="" class="champ-icon">
                <p>0% winrate</p>
                <p>1.7/21.1/4.6</p>
              </div>
              <div class="content col-8"></div>
            </div>

        </div>


        <div class="col-md-9 col-sm-12 matches-container">
          <div class="container-fluid matches">
            <p>Partidas recientes</p>
            @auth
            @php
            $username = auth()->user()->uuid ;
            if($username == $user["uuid"]){
            echo("este es tu perfil");
            }
            else {
            echo("Perfil");
            }
            @endphp
            @endauth

            <div class="row justify-content-start match">
              <div class="col icon-side">
                <img src="{{url('img/ezreal.png')}}" alt="" class="champ-icon">
              </div>
              <div class="content col-8"></div>
            </div>
            <div class="row justify-content-start match">
              <div class="col icon-side">
                <img src="{{url('img/ezreal.png')}}" alt="" class="champ-icon">
              </div>
              <div class="content col-8"></div>
            </div>

            <div class="row justify-content-start match">
              <div class="col icon-side">
                <img src="{{url('img/cait.png')}}" alt="" class="champ-icon">
              </div>
              <div class="content col-8"></div>
            </div>

            <div class="row justify-content-start match">
              <div class="col icon-side">
                <img src="{{url('img/vayne.png')}}" alt="" class="champ-icon">
              </div>
              <div class="content col-8"></div>
            </div>

            <div class="row justify-content-start match">
              <div class="col icon-side">
                <img src="{{url('img/aphelios.png')}}" alt="" class="champ-icon">
              </div>
              <div class="content col-8"></div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>




  @endsection("http_body")