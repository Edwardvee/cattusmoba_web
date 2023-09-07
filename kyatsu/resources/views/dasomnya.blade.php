@section("http_body")
<head>
  <title>Dasomnya</title>
  <link href="css/dasomnya.css" rel="stylesheet">
</head>
<body>
<a class="volver" href="{{route('mainpage')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
</svg>
</a>
<header class="ms-header">
  <h1 class="ms-header__title">
    Nosotros somos
    <div class="ms-slider">
      <ul class="ms-slider__words">
        <li class="ms-slider__word">un equipo</li>
        <li class="ms-slider__word">una familia</li>
        <li class="ms-slider__word">Dasomnya</li>
        <li class="ms-slider__word">un equipo</li>
      </ul>
    </div>
  </h1>
</header>
<article class="c-c mx-auto text-center d-flex justify-content-center">
  <center> <h1 class="oñatitle" style="color:white;">Nuestros proyectos</h1></center>
      <div class="cards-container row">
      
          <a href="https://www.mythrillfiction.com/the-dark-rider" alt="Mythrill" target="_blank">
          <div class="card">
          <div class="wrapper">
          <img src="{{url('img/ph-portadaCM.png')}}" class="cover-image" />
          </div>
          <img src="{{url('img/ph-titleCM.png')}}" class="title" />
          <img  src="{{url('img/watamote.jpg')}}" class="character" />
          <img  src="{{url('img/nagatoro.jpg')}}" class="character-2" />
          <img  src="{{url('img/konosuba.jpg')}}" class="character-3" />
          </div>
          </a>


          <a href="https://www.mythrillfiction.com/force-mage" alt="Mythrill" target="_blank">
          <div class="card">
          <div class="wrapper">
          <img src="{{url('img/ph-portadaK.jpg')}}" class="cover-image" />
          </div>
          <img src="{{url('img/ph-titleK.png')}}" class="title" />
          <img src="https://ggayane.github.io/css-experiments/cards/force_mage-character.webp" class="character" />
          </div>
          </a>
      </div>

</article>
</body>

<style>
.oñatitle{
  margin-top: 20px;
  font-size: xx-large;
  font-family: sans-serif;
  padding-top: 40px;
}
  body{
    margin: 0;
    margin-top: -20px;
    margin-bottom: -20px;
    padding:-5px;
  }
  :root {
  --card-height: 400px;
  --card-width: calc(var(--card-height) / 1.5);
}
* {
  box-sizing: border-box;
}
.volver{
  background-color: white;
  top: 20%;
  right: 10%;
  bottom: 50%;
  position: -webkit-sticky;
  position: sticky;
  border-radius: 0%;
  width: 60px;
  height: 60px;
}
.c-c{
  margin: 0px;
  margin-top: -20px;
  background-color: #191c29;
}
.cards-container{
  width: 100vw;
  height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #191c29;
}
  .card {
  width: var(--card-width);
  height: var(--card-height);
  position: relative;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  padding: 0 36px;
  perspective: 2500px;
  margin: 0 50px;
}

.cover-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.wrapper {
  transition: all 0.5s;
  position: absolute;
  width: 100%;
  z-index: -1;
}

.card:hover .wrapper {
  transform: perspective(900px) translateY(-5%) rotateX(25deg) translateZ(0);
  box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
  -webkit-box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
}

.wrapper::before,
.wrapper::after {
  content: "";
  opacity: 0;
  width: 100%;
  height: 80px;
  transition: all 0.5s;
  position: absolute;
  left: 0;
}
.wrapper::before {
  top: 0;
  height: 100%;
  background-image: linear-gradient(
    to top,
    transparent 46%,
    rgba(12, 13, 19, 0.5) 68%,
    rgba(12, 13, 19) 97%
  );
}
.wrapper::after {
  bottom: 0;
  opacity: 1;
  background-image: linear-gradient(
    to bottom,
    transparent 46%,
    rgba(12, 13, 19, 0.5) 68%,
    rgba(12, 13, 19) 97%
  );
}

.card:hover .wrapper::before,
.wrapper::after {
  opacity: 1;
}

.card:hover .wrapper::after {
  height: 120px;
}
.title {
  width: 100%;
  transition: transform 0.5s;
}
.card:hover .title {
  transform: translate3d(0%, -50px, 100px);
}

.character {
  width: 80%;
  opacity: 0;
  transition: all 0.5s;
  position: absolute;
  z-index: -1;
}
.character-2 {
  width: 80%;
  opacity: 0;
  transition: all 1s;
  position: absolute;
  z-index: -1;
}
.character-3 {
  width: 80%;
  opacity: 0;
  transition: all 1.5s;
  position: absolute;
  z-index: -1;
}

.card:hover .character {
  opacity: 1;
  transform: translate3d(0%, -30%, 100px);
}
.card:hover .character-2 {
  opacity: 1;
  transform: translate3d(20%, -30%, 100px);
}
.card:hover .character-3 {
  opacity: 1;
  transform: translate3d(-20%, -30%, 100px);
}

</style>