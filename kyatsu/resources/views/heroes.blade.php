@extends("maintemplate")
@section("http_headers")
<title>Kyatsu! - Heroes</title>
<link href="{{url('css/heroes.css')}}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">
  $(document).ready(() => {
    window.moment = moment;
    import("{{url('js/build/heroes_paginator.js')}}").then((success) => {
      console.log(success)
      window.HEROES_PAGINATOR = new success.HeroesPaginator();
      window.HEROES_PAGINATOR.information.name = "null";
      //    window.HEROES_PAGINATOR.information.name = window.ADMIN_PAGINATOR.information.name;
      //  window.HEROES_PAGINATOR = success;
    }).catch((error) => {
      console.warn(error);
      Swal.fire({
        title: "Error",
        text: "Ha ocurrido un fallo al cargar los heroes, la seccion actual se encuentra fuera de servicio",
        icon: "error",
        allowOutsideClick: false,
        showConfirmButton: false,
      });
    })
  });
</script>

@endsection
@section("http_body")

<script>
  $(window).on("load", function() {
    $('#character').addClass('slide-in-right');
  });
  $(window).on("load", function() {
    $('#description').addClass('scale-in-center');
  });
</script>


<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  <div class="container" id="paginator_heroes">
    <div class="row" id="PaginableHere">
      <div class="col"> <!-- descripcion de los heroes -->
        <h1 id="heroname" class="sub-estetico">Buscando heroes....</h1>
        <div class="row">
          <div id="description" style="opacity: 0;" class="col-8 darkbg">
            <h4>Actriz de voz: Voice Actor</h4>
            <h6>Cumpleaños: Buscando...</h6>
            <p class="message">Descripcion</p>
          </div>
        </div>
      </div>

      <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
        <img id="character" style="opacity: 1;" class="pj" src="HeroesName.png ">
      </div>

      <div class="col-12 align-self-end darkbg"> <!--selector de heroes-->
        "<a href='" . $hero_ind[name] . "'><button class='heroes' id='" . $hero_ind[name] . "' style='background-image: url(../img/heronamealt.png)'></button></a> </div>
    </div>
  </div>
</body>

@endsection