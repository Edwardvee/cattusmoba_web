@extends("maintemplate")

@section("http_headers")
<title>Kyatsu! - Heroes</title>
<link href="css/heroes.css" rel="stylesheet">
@endsection
@section("http_body")

<body class="ola"> <!-- class ola para bajar el body 120px por el navbar-->
  
<div class="container">
   <div class="row">
     <div class="col"> <!-- descripcion de los heroes -->
         <h1 id="heroname" class="sub-estetico">Melisa</h1>
          <div class="row">
            <div class="col-8 niggabackground">
                  <h3>Actriz de voz: Ivan Quiroga</h3>
                  <h6>Cumpleaños / 04-06</h6>
                  <p class="message">Melisa es la bibliotecaria de los caballeros de Favonio de Mondstadt en Kyatsu! y, a pesar de su apariencia sosa, es un ser muy inteligente y una maga con increíble talento que en realidad se cohíbe por su temor al costo del conocimiento</p>
            </div> 
         </div>
      </div>

     <div class="col-6 pj-container"> <!-- imagenes de los heroes -->
       <img class="pj" src="{{url('img/melisa.png')}}"> 
     </div>

     <div class="col-12 align-self-end niggabackground"> <!--selector de heroes-->
           <button class="heroes" onclick="cambiarImagen('https://media.tenor.com/2kBRRgoejx4AAAAi/league-of-legends.gif', 'Melisa es la bibliotecaria de los caballeros de Favonio de Mondstadt en Kyatsu! y, a pesar de su apariencia sosa, es un ser muy inteligente y una maga con increíble talento que en realidad se cohíbe por su temor al costo del conocimiento','myImage2', 'Holas')"></button>
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
     function cambiarImagen(src, mensaje,img, mensaje2) {
                var imagen = document.getElementById(img);
                var message = document.getElementById("message");
                var heroname = document.getElementById("mensaje2")

                setTimeout(function() {
                    imagen.src = src;
                    message.textContent = mensaje;
                    heroname.textContent = mensaje2;
                    imagen.classList.add("animate-image"); // Agrega la clase "animate-image"
                }, 100);
                imagen.classList.remove("animate-image");

            }
</script>


@endsection("http_body")