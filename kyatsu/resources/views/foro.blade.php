@extends('maintemplate')
<link href="css/foro.css" rel="stylesheet">
@section('http_headers')
<title>Kyatsu! - Foro</title>
@endsection
@section('http_body')

<div class="container foro shadow p-3 mb-5 bg-body rounded">

    <div class="welcome">
        <h1>Bienvenido al foro!</h1>
    </div>
 <hr class="mb-3">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{route('foro')}}",
                dataType: 'JSON',
                success: function(forum_results) {
                    let foroDiv = $('.foro');
                    forum_results.forEach(post => {
                        console.log(post)
                        $($(document.createElement('div')).addClass("container-fluid post border").append($(document.createElement('div')).addClass('row').append($(document.createElement('div')).addClass('col-lg-2 col-sm-12 post-user-info').append($(document.createElement('div')).addClass('row d-flex text-center').append($(document.createElement('div')).addClass('col-12 mt-3 mb-3 user-name').append($(document.createElement('a')).attr('href', '#').html(Object.values(post)[2]))).append($(document.createElement('div')).addClass('col-12 mt-2 mb-5 user-pfp').append($(document.createElement('img')).attr('src', 'https://pm1.aminoapps.com/6407/de5edd6e322153713245e23c17b54ab662c5b0d8_00.jpg').addClass('rounded-1 shadow'))).append($(document.createElement('div')).addClass('col-12 mt-4 post-date text-wrap').append($(document.createElement('p')).addClass('text-muted').html(Object.values(post)[6]))))).append($(document.createElement('div')).addClass('col-lg-8 col-sm-10 post-content').append($(document.createElement('div')).addClass('row').append($(document.createElement('a')).addClass('text-muted id' + Object.values(post)[0] ).attr('href','#').attr('onmouseover','this.className = "text-muted text-decoration-underline id' + Object.values(post)[0] + '"').attr('onmouseout','this.className = "text-muted id' + Object.values(post)[0] + '"').html(">>" + Object.values(post)[0]))).append($(document.createElement('div')).addClass('container-fluid').html(Object.values(post)[3]))).append($(document.createElement('div')).addClass('col-lg-2 col-sm-2 post-buttons').append($(document.createElement('div')).addClass('row d-flex text-center').append($(document.createElement('div')).addClass('col-12 mt-3').append($(document.createElement('i')).addClass('bi bi-chat').attr('onclick','reply()').attr('onmouseover','this.className = "bi bi-chat-fill"').attr('onmouseout','this.className = "bi bi-chat"')).append($(document.createElement('p')).html(Object.values(post)[4]))).append($(document.createElement('div')).addClass('col-12 mt-3').append($(document.createElement('i')).addClass('bi bi-heart').attr('onclick','like()').attr('onmouseover','this.className = "bi bi-heart-fill"').attr('onmouseout','this.className = "bi bi-heart"')).append($(document.createElement('p')).html(Object.values(post)[5]))).append($(document.createElement('div')).addClass('col-12 mt-3').append($(document.createElement('i')).addClass('bi bi-flag').attr('onclick','flag()').attr('onmouseover','this.className = "bi bi-flag-fill"').attr('onmouseout','this.className = "bi bi-flag"'))))))).appendTo(foroDiv);
                        if(Object.values(post)[1] && Object.values(post)[1]>0){
                            $($(document.createElement('a')).addClass('text-mute fst-italic text-end').html( "   --Respondiendo a: " + Object.values(post)[1])).appendTo($(".id" + Object.values(post)[0]))
                        }
                    }
                    
                    );
                }
            })
        });
        // Get the button

    </script>

<a onclick="topFunction()" id="myBtn"><svg xmlns="http://www.w3.org/2000/svg" width="5vw" height="5vh" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
</svg></a>

    <a href="#head"><svg xmlns="http://www.w3.org/2000/svg" id="fixedbutton" width="5vw" height="5vh" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg></a>

    <!-- <div class="container-fluid post border">
        <div class="row">
            <div class="col-lg-2 col-sm-12 post-user-info">
                <div class="row d-flex text-center">
                    <div class="col-12 mt-3 mb-3 user-name">
                        <a href="#">Nombre de usuario</a>
                    </div>
                    <div class="col-12 mt-2 mb-5 user-pfp"><img class="rounded-1 shadow" src="https://pm1.aminoapps.com/6407/de5edd6e322153713245e23c17b54ab662c5b0d8_00.jpg" alt=""></div>
                    <div class="col-12 mt-4 post-date text-wrap">
                        <p class="text-muted">11/9/2023 11:18</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-10 post-content">
                <div class="row"><a href="#" class="text-muted" onmouseover="this.className = 'text-muted text-decoration-underline'" onmouseout="this.className = 'text-muted'">>>000000</a></div>
              
            </div>
            <div class="col-lg-2 col-sm-2 post-buttons">
                <div class="row d-flex text-center">
                    <div class="col-12 mt-3">
                        <i class="bi bi-chat" onclick="reply()" onmouseover="this.className = 'bi bi-chat-fill'" onmouseout="this.className = 'bi bi-chat'"></i>
                        <p>21</p>
                    </div>
                    <div class="col-12 mt-3">
                        <i class="bi bi-heart" onclick="like()" onmouseover="this.className = 'bi bi-heart-fill'" onmouseout="this.className = 'bi bi-heart'"></i>
                        <p>1</p>
                    </div>
                    <div class="col-12 mt-3">
                        <i class="bi bi-flag" onclick="flag()" onmouseover="this.className = 'bi bi-flag-fill'" onmouseout="this.className = 'bi bi-flag'"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

 -->


</div>

<style>
    #fixedbutton {
    position: fixed;
    bottom: 0px;
    right: 0px; 
    margin-bottom: 2% ;
}
#fixedbutton:hover{
    color: #66a3ff;
    transform: translateY(-0.25em);
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 7%;
  right: 0px;
  cursor: pointer;
  margin-bottom: 2% ;
}

#myBtn:hover {
}
</style>
<script>
    let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
@endsection