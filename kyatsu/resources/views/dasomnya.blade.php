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
          <img src="{{url('img/arquera.png')}}" class="character" />
          </div>
          </a>
      </div>

</article>
<section>
<center><h1 style="color: black;">Conoce al equipo</h1></center>
<div class="slider">
  <div class="slide" ><img src="https://avatars.githubusercontent.com/u/106191316?v=4" /><p>Daniel Fernandez</p></div>
  <div class="slide" ><img src="https://avatars.githubusercontent.com/u/130793897?v=4" /><p>Wendy Churqui</p></div>
  <div class="slide" ><img src="https://avatars.githubusercontent.com/u/106191563?v=4" /><p>Lucas Boghossian</p></div>
  <div class="slide"><img src="https://avatars.githubusercontent.com/u/62914367?v=4" /><p> Nicolas Krulewiekti</p></div>
  <div class="slide"><img src="https://avatars.githubusercontent.com/u/106192270?v=4" /><p>Ivan Quiroga</p></div>
  <div class="slide" ><img src="https://avatars.githubusercontent.com/u/106595700?v=4" /><p> Manuel Casimiro</p></div>
    </div>
</section>
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




@-webkit-keyframes animation {
  from {
    opacity: 0;
    -webkit-transform: scale(1.2) rotateX(45deg);
    transform: scale(1.2) rotateX(45deg);
  }
  to {
  }
}

@-webkit-keyframes animation2 {
  from {
    opacity: 0;
    -webkit-transform: scale(1.2) rotateX(45deg);
    transform: scale(1.2) rotateX(45deg);
  }
  to {
  }
}

.slider div p {
  color: #1c1c1c;
  position: absolute;
  bottom: -65px;
  font-family: font;
  font-size: 22px;
}
.slider {
  -webkit-animation: animation ease 1s;
  animation-delay: 0.8s;
  animation-fill-mode: backwards;

  margin: 60px auto 0 auto;
  height: 360px;
  width: 240px;
  padding: 40px;
  top: 100px;

  perspective: 1000px;
  transition: ease-in-out 0.2s;
  /*-webkit-transform:rotateX(45deg);
             -webkit-transform-style:preserve-3d;
                 position:absolute;*/
}
/*.slider:active{ -webkit-transform:rotateZ(10deg);}*/

.slide img {
  text-align: center;
  width: 100%;
  height: 100%;
  -webkit-user-drag: none;
  user-drag: none;
  -moz-user-drag: none;
  border-radius: 2px;
}

.slide {
  -webkit-user-select: none;
  user-select: none;
  -moz-user-select: none;
  position: absolute;
  height: 280px;
  width: 240px;

  box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.3);
  background: #fcfcfc;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  text-align: center;
  /*overflow:hidden;*/
  border: 12px white solid;
  box-sizing: border-box;
  border-bottom: 55px white solid;
  border-radius: 5px;
}
.transition {
  -webkit-transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
  -moz-transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
  transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
}

</style>

<script>
  /*! Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
 */

window.addEventListener("load", onWndLoad, false);

function onWndLoad() {
  var slider = document.querySelector(".slider");
  var sliders = slider.children;

  var initX = null;
  var transX = 0;
  var rotZ = 0;
  var transY = 0;

  var curSlide = null;

  var Z_DIS = 50;
  var Y_DIS = 10;
  var TRANS_DUR = 0.4;

  var images = document.querySelectorAll("img");
  for (var i = 0; i < images.length; i++) {
    images[i].onmousemove = function (e) {
      e.preventDefault();
    };
    images[i].ondragstart = function (e) {
      return false;
    };
  }

  function init() {
    var z = 0,
      y = 0;

    for (var i = sliders.length - 1; i >= 0; i--) {
      sliders[i].style.transform =
        "translateZ(" + z + "px) translateY(" + y + "px)";

      z -= Z_DIS;
      y += Y_DIS;
    }

    attachEvents(sliders[sliders.length - 1]);
  }
  function attachEvents(elem) {
    curSlide = elem;

    curSlide.addEventListener("mousedown", slideMouseDown, false);
    curSlide.addEventListener("touchstart", slideMouseDown, false);
  }
  init();
  function slideMouseDown(e) {
    if (e.touches) {
      initX = e.touches[0].clientX;
    } else {
      initX = e.pageX;
    }

    document.addEventListener("mousemove", slideMouseMove, false);
    document.addEventListener("touchmove", slideMouseMove, false);

    document.addEventListener("mouseup", slideMouseUp, false);
    document.addEventListener("touchend", slideMouseUp, false);
  }
  var prevSlide = null;

  function slideMouseMove(e) {
    var mouseX;

    if (e.touches) {
      mouseX = e.touches[0].clientX;
    } else {
      mouseX = e.pageX;
    }

    transX += mouseX - initX;
    rotZ = transX / 20;

    transY = -Math.abs(transX / 15);

    curSlide.style.transition = "none";
    curSlide.style.webkitTransform =
      "translateX(" +
      transX +
      "px)" +
      " rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    curSlide.style.transform =
      "translateX(" +
      transX +
      "px)" +
      " rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    var j = 1;
    //remains elements
    for (var i = sliders.length - 2; i >= 0; i--) {
      sliders[i].style.webkitTransform =
        "translateX(" +
        transX / (2 * j) +
        "px)" +
        " rotateZ(" +
        rotZ / (2 * j) +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transform =
        "translateX(" +
        transX / (2 * j) +
        "px)" +
        " rotateZ(" +
        rotZ / (2 * j) +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transition = "none";
      j++;
    }

    initX = mouseX;
    e.preventDefault();
    if (Math.abs(transX) >= curSlide.offsetWidth - 30) {
      document.removeEventListener("mousemove", slideMouseMove, false);
      document.removeEventListener("touchmove", slideMouseMove, false);
      curSlide.style.transition = "ease 0.2s";
      curSlide.style.opacity = 0;
      prevSlide = curSlide;
      attachEvents(sliders[sliders.length - 2]);
      slideMouseUp();
      setTimeout(function () {
        slider.insertBefore(prevSlide, slider.firstChild);

        prevSlide.style.transition = "none";
        prevSlide.style.opacity = "1";
        slideMouseUp();
      }, 201);

      return;
    }
  }
  function slideMouseUp() {
    transX = 0;
    rotZ = 0;
    transY = 0;

    curSlide.style.transition =
      "cubic-bezier(0,1.95,.49,.73) " + TRANS_DUR + "s";

    curSlide.style.webkitTransform =
      "translateX(" +
      transX +
      "px)" +
      "rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    curSlide.style.transform =
      "translateX(" +
      transX +
      "px)" +
      "rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    //remains elements
    var j = 1;
    for (var i = sliders.length - 2; i >= 0; i--) {
      sliders[i].style.transition =
        "cubic-bezier(0,1.95,.49,.73) " + TRANS_DUR / (j + 0.9) + "s";
      sliders[i].style.webkitTransform =
        "translateX(" +
        transX +
        "px)" +
        "rotateZ(" +
        rotZ +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transform =
        "translateX(" +
        transX +
        "px)" +
        "rotateZ(" +
        rotZ +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";

      j++;
    }

    document.removeEventListener("mousemove", slideMouseMove, false);
    document.removeEventListener("touchmove", slideMouseMove, false);
  }
}

</script>