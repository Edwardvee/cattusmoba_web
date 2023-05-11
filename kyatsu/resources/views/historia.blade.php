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
    <h1>oña</h1>
   </section>
   <section id="two">
    <h1>año</h1>
   </section>
   <section id="three">
    <h1>ñoa</h1>
   </section>
   <section id="four">
    <h1>aoñ</h1>
   </section>


    <ul class="guide">
        <li>
        <button id="one">oña</button> 
        </li>
        <li>
        <p>oña</p>
            </li>
        <li>
        <p>oña</p>      
      </li>
        <li>
        <p>oña</p>
    </li>
    </ul>
    
</div>
</main>
<script>

$(document).ready(function (){
   
    var one = $("#one").position() ;
    $("#one").(function(){
       alert('g');
    });

    $("body").addClass("preventScroll");
});

</script>
@endsection("http_body")


