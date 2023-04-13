
@extends("maintemplate")

@section("http_body")

<head>
  <meta charset="UTF-8">
  <link href="css/mainpage.css" rel="stylesheet">
  <title> Kyatsu!</title>
</head>

<body>
<!--      <div class="card text-white border-0">

      <div class="card-img-overlay --card-img-overlay-purple d-flex flex-column justify-content-between align-items-start p-5 three"></div>

      <div class="card-img-overlay card-overlay-black hover-light d-flex flex-column justify-content-between align-items-start">
        <div class="d-flex justify-content-between w-100 mb-3">
          <div><span class="badge badge-lightblue mr-2"> TRENDS</span><span class="badge badge-warning"> DESIGN</span></div>

          <a href="javascript://">
            <div class="myicoo"></div>
          </a>
        </div>
        <div class="mb-4">

          <div class="h3"><a class="text-white text-decoration-none" href="javascript://">Web Design templates<br />Selection</a></div>
        </div>
        <div class="text-light">January 16 2023</div>
      </div>
    </div> -->

  <div><!--  aunque no tenga sentido esto lo centra ._. --> 
 <header>
    <h1 class="img-title">Kyatsu! Moba</h1>
    <p id="rrandommsg"> ¿Eres digno de tanta accion?</p>
    <a href="https://tlauncher.org/installer">Juega ahora</a>
  </header>
</div>

<div class="content"> 
 <div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/placeholder2.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 CrdRightSide">
      <div class="card-body">
        <h5 class="card-title cardTitle">Heroes increibles</h5>
        <p class="card-text cardText">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>

  <div>
  </div>
</div>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>
    <h1> Esta es la main page</h1>          
    <h1> Esta es la main page</h1>
    </div>
</body>

<script>
var MPtext = ["¿Eres digno de tanta accion?", "Se parte de la historia", "¿Seras nuestro nakama?", "Te odiamos Nico", "¿Es la primera vez que te vemos?", "Welcome to the jungle", "¿Como llegaste a aqui?"];
var rand = Math.floor(Math.random()*MPtext.length);
var randtext = MPtext[rand];
document.getElementById("rrandommsg").innerHTML = randtext;

</script>
@endsection("http_body")

