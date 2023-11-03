@extends("maintemplate")

<head>
  <title>Ta Te Ti</title>
  
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="margin-top: 90px">
  <div class="container">
    <h1 class="text-center" >Ta Te Ti</h1>
  <div class="row">
    <div id="player1-hero"  class="col hero-image d-flex justify-content-center ">
      <h1>Player1</h1>
    </div>
    <div class="col-md-4 d-flex justify-content-center text-center ">
    <div id="board">
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <div class="cells player"></div>
          <center><button class="justify-self-center btn btn-primary" id="reset-button" style="display:none" onclick="location.reload();">Reiniciar Juego</button> </center>
        </div> 
    </div>
    <div id="player2-hero" class="col hero-image d-flex justify-content-center">
      <h1>Player2</h1>
    </div>
  </div>
  <div class="turno_div">
    <center><h1 id="turno_h1"></h1></center>  </div>
  <div class="col-12 d-flex justify-content-center ">
    @foreach ($getheroes as $heroes)
    <a><button class="heroes" style="background-image: url('img/heros_img/@php echo $heroes["uuid"];@endphp.png')"></a>
    @endforeach
  </div>
</div>
</body>

<style>
  .slide-in-right {
  opacity: 1;
	-webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

@-webkit-keyframes slide-in-right {
  0% {
    -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}
@keyframes slide-in-right {
  0% {
    -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}
.slide-in-left {
	-webkit-animation: slide-in-left 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-left 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}
@-webkit-keyframes slide-in-left {
  0% {
    -webkit-transform: translateX(-1000px);
            transform: translateX(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}
@keyframes slide-in-left {
  0% {
    -webkit-transform: translateX(-1000px);
            transform: translateX(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
}
   .hero-image {
    width: 300px;
    height: 500px;
    background-size: cover;
  }
  .heroe_1{
    width:100%;
    height: 100%;
    background-color: blue;
  }
  .heroe_2{
    height: 100%;
    width: 100%;
    background-color: red;
  }
  .heroes {
    width: 120px;
    height: 120px;
    background-size: cover;
  }
  .col-12{
    margin-top: 32px;
  }
  #board {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    width: 300px;
    height: 300px;
  }

  .cells {
    display: flex;
  justify-content: center;
  align-items: center;
    width: 30%;
    height: 100px;
    border: 2px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 60px;
    cursor: pointer;
    background-size: cover;
  }

  .cells:nth-of-type(-n + 3){
  border-top: none;
  
}
.cells:nth-of-type(7), .cells:nth-of-type(8), .cells:nth-of-type(9) {
  border-bottom: none;
}
.cells:nth-of-type(1), .cells:nth-of-type(4), .cells:nth-of-type(7) {
  border-left: none;
}
/* .cells:nth-of-type(3), .cells:nth-of-type(6), .cells:nth-of-type(9) {
  border-left: none;
} */
.cells:nth-of-type(3n){
  border-right: none;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{('js/tatetiwebsocket.js')}}"></script>

