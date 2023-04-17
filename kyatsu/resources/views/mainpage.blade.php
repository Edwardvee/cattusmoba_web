
@extends("maintemplate")

@section("http_body")

<head>
  <meta charset="UTF-8">
  <link href="css/mainpage.css" rel="stylesheet">
  <title> Kyatsu!</title>
</head>

<body>
  
  
  <div><!--  aunque no tenga sentido esto lo centra ._. --> 
 <header>
    <h1 class="img-title">Kyatsu! Moba</h1>
    <p id="rrandommsg"> ¿Eres digno de tanta accion?</p>
    <a class="Bdownload" href="https://tlauncher.org/installer">Juega ahora</a>
  </header>
</div>

<div class="redes">
  <p class="OurRed"> Siguenos en nuestras redes sociales</p>
  <br> 
    <img class="Red" src="img/Discord.png" width="40px"> 
    <img class="Red" src="img/YouTube.png" width="40px">
    <img class="Red" src="img/Facebook.png" width="40px">
    <img class="Red" src="img/Instagram.png" width="40px">

  
</div>



<div class="content"> 

 <div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img id="myImage" src="img/placeholder2.png" class="img-fluid rounded-start" alt="...">
    </div>
  <div class="col-md-8 CrdRightSide">
      <div class="card-body">
        <h5 class="card-title cardTitle">Heroes increibles</h5>
        <p class="card-text cardText">Ya sea que prefieras lanzarte directo a la batalla, apoyar a tus compañeros de equipo, o algo intermedio, hay un lugar para ti en la arena</p>
      <div class="col-md-3">
        <button class="heroesDesc" onclick=dañojs(); id="daño">Daño</button>
        <button class="heroesDesc" onclick=soportejs(); id="soporte">Soporte</button>
        <button class="heroesDesc" onclick=tanquejs(); id="tanque">Tanque</button>
      </div>
        <p class="Descripcion" id="message">Los daños se enfocan claramente en hacer daño.</p>
      </div>
    </div>


  </div>

  <div>
  </div>
</div>
  

</div>
</body>

<script>
var MPtext = ["¿Eres digno de tanta accion?", "Se parte de la historia", "¿Seras nuestro nakama?", "Te odiamos Nico", "¿Es la primera vez que te vemos?", "Welcome to the jungle", "¿Como llegaste a aqui?"];
var rand = Math.floor(Math.random()*MPtext.length);
var randtext = MPtext[rand];
document.getElementById("rrandommsg").innerHTML = randtext;

function tanquejs(){
  document.getElementById('myImage')
    .src="img/cait.png";
    document.getElementById('message')
    .innerHTML="Los tanques claramente se centran en tanquear el daño y proteger a sus compañeros";
  }
    function soportejs(){
  document.getElementById('myImage')
    .src="img/india.jpg";
    document.getElementById('message')
    .innerHTML="Los soportes se centran en apoyar al equipo ya sea protegeiendo a sus compañeros, curandolos o potenciandolos";
  }
    function dañojs(){
  document.getElementById('myImage')
    .src="img/placeholder2.png";
    document.getElementById('message')
    .innerHTML="Los daños se enfocan claramente en hacer daño";
}
</script>
@endsection("http_body")

