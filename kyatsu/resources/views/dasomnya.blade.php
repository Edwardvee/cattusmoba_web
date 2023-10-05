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

<section class="timer">
  <h1>Tiempo hasta la entrega del proyecto</h1>
 <center> <p style="color: #161616;   font-size: xx-large; " id="demo"></p> </center>
  
</section>
</body>

<style>

</style>

<script>
  /*! Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
 */

 // Set the date we're counting down to
var countDownDate = new Date("Nov 30, 2023 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

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