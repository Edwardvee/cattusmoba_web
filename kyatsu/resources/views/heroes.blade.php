@extends("maintemplate")

@section("http_headers")
<title>Kyatsu! - Heroes</title>
<link href="css/heroes.css" rel="stylesheet">
@endsection
@section("http_body")
<!-- HONOR A LOS LEALES, LARGA VIDA AL EMPREADOR DE LA HUMANIDAD -->

<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  
<div class="container">
   <div class="row">
     <div class="col"> <!-- descripcion de los heroes -->
         <h1 class="sub-estetico">Melisa</h1>
          <div class="row">
            <div class="col-8 niggabackground">
                  <h3>Actriz de voz: Ivan Quiroga</h3>
                  <h6>Cumpleaños / 04-06</h6>
                  <p>Lisa Minci es la bibliotecaria de los caballeros de Favonio de Mondstadt en Kyatsu! y, a pesar de su apariencia sosa, es un ser muy inteligente y una maga con increíble talento que en realidad se cohíbe por su temor al costo del conocimiento</p>
            </div> 
         </div>
      </div>

     <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
       <img class="pj" src="https://img1.picmix.com/output/stamp/normal/2/1/7/6/1866712_2dde6.png"> 
     </div>

     <div class="col-12 align-self-end niggabackground"> <!--selector de heroes-->
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>
           <button class="heroes"></button>

     </div> 

   </div>
</div>
</body>
<script>
     function cambiarImagen(src, mensaje,img) {
                var imagen = document.getElementById(img);
                var message = document.getElementById("message");

                setTimeout(function() {
                    imagen.src = src;
                    message.textContent = mensaje;
                    imagen.classList.add("animate-image"); // Agrega la clase "animate-image"
                }, 100);
                imagen.classList.remove("animate-image");

            }
</script>


@endsection("http_body")