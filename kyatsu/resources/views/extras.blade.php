<head>
  <title>Ta Te Ti</title>
  
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: ">
  <div class="container">
    <h1 class="text-center">Ta Te Ti</h1>
  <div class="row">

    <div id="player1-hero"  class="col hero-image d-flex justify-content-center">
    </div>
    <div class="col-md-4 d-flex justify-content-center">
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
          <button id="reset-button">Reiniciar Juego</button>
        </div>
    </div>
    <div id="player2-hero" class="col hero-image d-flex justify-content-center">
    </div>
  </div>
  <div class="col-12 d-flex justify-content-center ">
    @foreach ($getheroes as $heroes)
    <a><button class="heroes" style="background-image: url('img/heros_img/@php echo $heroes["uuid"];@endphp.png')"></a>
    @endforeach
  </div>
</div>
</body>

<style>
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
    flex-wrap: wrap;
    width: 300px;
    height: 300px;
  }

  .cells {
    width: 30%;
    height: 100px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 60px;
    cursor: pointer;
    background-size: cover;
  }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{('js/tatetiwebsocket.js')}}"></script>

