@extends("maintemplate")
<link href="css/historia.css" rel="stylesheet">
@section("http_headers")
<title>Kyatsu! - Historia</title>
@endsection
@section("http_body")
<br>
<br>
<br>
<br>
<br>
<main>
<div class="pepe">
   <section id="one">
    <h1>Ubicacion 1</h1>
   </section>
   <section id="two">
    <h1>Ubicacion 2</h1>
   </section>
   <section id="three">
    <h1>Ubicacion 3</h1>
   </section>
   <section id="four">
    <h1>Ubicacion 4</h1>
   </section>


    <ul class="guide">
        <li>
            <p id="L1" onclick="scrollGo(one, this.id)"><i id="L1icon" class="bi bi-arrow-right-circle-fill iconoubi"></i> Ubicacion 1
            </p> 
        </li>
        <li>
        <p id="L2" onclick="scrollGo(two, this.id)"><i id="L2icon" class="bi bi-arrow-right-circle iconoubi"></i>
             Ubicacion 2</p>
            </li>
        <li>
        <p id="L3" onclick="scrollGo(three, this.id)"><i id="L3icon"class="bi bi-arrow-right-circle iconoubi"></i>
             Ubicacion 3</p>      
      </li>
        <li>
        <p id="L4" onclick="scrollGo(four, this.id)"><i id="L4icon" class="bi bi-arrow-right-circle iconoubi"></i>
             Ubicacion 4</p>
    </li>
    </ul>
    
</div>
</main>
<script>

function scrollGo(id, button){
    id.scrollIntoView(false);
    let iconos = document.getElementsByClassName("iconoubi");
    for(i=0; i<iconos.length; i++){
        iconos[i].classList.remove("bi-arrow-right-circle");
        iconos[i].classList.remove("bi-arrow-right-circle-fill");
        iconos[i].classList.add("bi-arrow-right-circle");
    }
    let iconmod = button + "icon";
    let poop = document.getElementById( iconmod );
    poop.classList.remove("bi-arrow-right-circle");
    poop.classList.add("bi-arrow-right-circle-fill");
       /*
   const info = id.getBoundingClientRect();
    scroll(info.x, info.y);
     */
}
</script>
@endsection("http_body")


