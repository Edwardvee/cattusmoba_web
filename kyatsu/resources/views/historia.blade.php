@extends("maintemplate")
<link href="css/historia.css" rel="stylesheet">
@section("http_headers")
<title>Kyatsu! - Historia</title>
@endsection
@section("http_body")

<main class="parent" onscroll="updateIcons();">
    <div id="pointer">.</div>
    <div class="pepe">
        <section id="one">
            <a data-toggle="modal" data-target="#exampleModal"> La arena </a>
       <!--      <h1> La arena</h1> -->

       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">La arena</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      La Arena de batalla es un modo de eliminación basado en rondas 4c4, sin limitaciones ni obstáculos; es un modo de destrucción. El equipo con más rondas exitosas gana. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
        </section>

        <section id="two">
        <a data-toggle="modal" data-target="#exampleModal2"> El bosque del silencio </a>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="hola" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="hola">El bosque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      El bosque del silencio, es el modo 1c1, en donde la habilidad individual es lo mas importante a la hora de la victoria. El jugador con mas rondas sera el ganador
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
        </section>
        
        <section id="three">
        <a data-toggle="modal" data-target="#exampleModal3"> El salar </a>
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="hola" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="hola">El salar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Enfrentate a otros 5 rivales, en este increible modo 5c5 en el cual la composicion de tu equipo y tu cooperacion con ellos, es lo que te llevara a la victoria
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
        </section>
        <section id="four">
        <a data-toggle="modal" data-target="#exampleModal4"> El mercado </a>
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="hola" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="hola">El mercado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      La tienda en donde puedes gastar tus k-coins, para aspectos unicos y mas...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
        </section>

      <div  class="guide" >
        <ul style="list-style-type: none; padding-left: 20px; padding-top: 10px">
            <li>
                <p id="L1" onclick="scrollGo(one, this.id)"><i id="L1icon" class="bi bi-arrow-right-circle-fill iconoubi"></i> La arena
                </p>
            </li>
            <li>
                <p id="L2" onclick="scrollGo(two, this.id)"><i id="L2icon" class="bi bi-arrow-right-circle iconoubi"></i>
                    El bosque</p>
            </li>
            <li>
                <p id="L3" onclick="scrollGo(three, this.id)"><i id="L3icon" class="bi bi-arrow-right-circle iconoubi"></i>
                    El salar</p>
            </li>
            <li>
                <p id="L4" onclick="scrollGo(four, this.id)"><i id="L4icon" class="bi bi-arrow-right-circle iconoubi"></i>
                    El mercado</p>
            </li>
        </ul>
        </div>
    </div>
</main>
<script>
    function scrollGo(id, button) {
        id.scrollIntoView({block: "end", behavior: "smooth"});
        iconChange(button);
        /*
   const info = id.getBoundingClientRect();
    scroll(info.x, info.y);
     */
    }

    function iconChange(icon) {
        let iconos = document.getElementsByClassName("iconoubi");
        for (i = 0; i < iconos.length; i++) {
            iconos[i].classList.remove("bi-arrow-right-circle");
            iconos[i].classList.remove("bi-arrow-right-circle-fill");
            iconos[i].classList.add("bi-arrow-right-circle");
        }
        let iconmod = icon + "icon";
        let poop = document.getElementById(iconmod);
        poop.classList.remove("bi-arrow-right-circle");
        poop.classList.add("bi-arrow-right-circle-fill");
    }

    function updateIcons() {
      var scrollTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      // Calcula las posiciones de las secciones en la página
      var onePosition = $("#one").offset().top;
      var twoPosition = $("#two").offset().top;
      var threePosition = $("#three").offset().top;
      var fourPosition = $("#four").offset().top;


      // Establece clases en los elementos de la guía según la posición de desplazamiento
      if (scrollTop >= onePosition && scrollTop < twoPosition) {
          iconChange("L1");
      } else if (scrollTop >= twoPosition && scrollTop < threePosition) {
          iconChange("L2");
      } else if (scrollTop >= threePosition && scrollTop < fourPosition) {
          iconChange("L3");
      } else if (scrollTop >= fourPosition) {
          iconChange("L4");
      }
    }

</script>
@endsection("http_body")