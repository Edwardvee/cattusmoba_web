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
    //    window.HEROES_PAGINATOR.information.name = window.ADMIN_PAGINATOR.information.name;
     //  window.HEROES_PAGINATOR = success;
      }
    ).catch((error) => {
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

<!-- HONOR A LOS LEALES, LARGA VIDA AL EMPREADOR DE LA HUMANIDAD -->

<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  <div class="container" id="paginator_heroes">
    <div class="row">
      <div class="col"> <!-- descripcion de los heroes -->
        <h1 id="heroname" class="sub-estetico">Buscando heroes....</h1>
        <div class="row">
          <div class="col-8 niggabackground">
            <h3>Actriz de voz: Buscando...</h3>
            <h6>Cumpleaños: Buscando...</h6>
            <p class="message">Cargando mensaje...</p>
          </div>
        </div>
      </div>

      <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
        <img class="pj" src="url('img/'.  $heroes['name'] . '.png') ">
      </div>

      <div class="col-12 align-self-end niggabackground"> <!--selector de heroes-->
        <!-- <button class="heroes" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Melisa es la bibliotecaria de los caballeros de Favonio de Mondstadt en Kyatsu! y, a pesar de su apariencia sosa, es un ser muy inteligente y una maga con increíble talento que en realidad se cohíbe por su temor al costo del conocimiento','myImage2', 'Holas')"></button>
-->

        "<a href='hero name'><button class='heroes' id='" . $hero_ind[name] . "' style='background-image: url(../img/hero_ind[name])'></button></a> </div>

      </div>
    </div>
</body>

<script>


</script>


@endsection