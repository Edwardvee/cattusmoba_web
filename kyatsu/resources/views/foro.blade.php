@extends('maintemplate')
<link href="{{ url('css/foro.css') }}" rel="stylesheet">
@section('http_headers')
    <title>Kyatsu! - Foro</title>
@endsection
@section('http_body')
    <div class="container foro shadow p-3 mb-5 bg-body rounded">

        <div class="welcome">
            <h1>Bienvenido al foro!</h1>
        </div>
        <hr class="mb-5">

        <div class="textbox_n">
            <form id="post_something">
                @csrf
                
                <input type="text" name="parentPost" id="parentPost" value="0" style="display: none">
                <p id="replier"></p>
                <textarea class="form-control" name="content" id="content_post" rows="10"></textarea>
                <div class="d-flex my-3 justify-content-end">
                    <button type="submit" onclick="forumButton()" id="submit_comment" class="btn btn-primary"><i class="bi bi-send"></i>
                        Subir!</button>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-center my-3">
            <div class="spinner-border" id="cargando" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="container-fluid" id="foro">

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>

            function forumButton() {
                let textboxforum = document.getElementsByClassName('textbox_n')[0];
                if (textboxforum) {
                    textboxforum.className = "textbox_f";
                } else {
                    let textboxforum = document.getElementsByClassName('textbox_f')[0];
                    textboxforum.className = "textbox_n";

                }
            }
            function reply(n){
                let textboxforum = document.getElementsByClassName('textbox_n')[0];
                if (textboxforum) {
                    textboxforum.className = "textbox_f";
                }
                topFunction();
                replier = document.getElementById("replier");
                replier.innerText = "Respondiendo al post " + n;
                parentPost = document.getElementById("parentPost");
                parentPost.value = n;

            }
           @php 
           if(!auth()->user()){
            echo "$('#submit_comment').click(function(){
                window.location = '" . url('authentication') . "'
            }); $('#submit_comment').text('Inicia sesion para comentar!');";
           }
           @endphp
            $("#cargando").hide();

            function callAjax() {
                $(document).ready(function() {
                    $(document).ajaxStart(function() {
                        $("#cargando").show();
                    })
                    $(document).ajaxStop(function() {
                        $("#cargando").hide();
                    })
                    $.ajax({
                        url: "@if (Request::url() === '/foro'){route('foro')} @endif @if (Request::url() === '/foro/hilo/'){route(foro.hilo, id)}@endif",
                        dataType: 'JSON',
                        success: function(forum_results) {

                            let foroDiv = $('#foro');
                            $("#foro").append($(document.createElement("div")).addClass("spinner-border"));

                            foroDiv.empty();
                            forum_results.forEach(post => {
                                    console.log(post)
                                    $($(document.createElement('div')).attr('foroid',Object.values(post)[0]).addClass(
                                        "container-fluid post border").append($(document
                                            .createElement('div')).addClass('row').append($(
                                            document
                                            .createElement('div')).addClass(
                                            'col-lg-2 col-sm-12 post-user-info').append($(
                                            document.createElement('div')).addClass(
                                            'row d-flex text-center').append($(document
                                            .createElement('div')).addClass(
                                            'col-12 mt-3 mb-3 user-name').append($(
                                            document.createElement('a')).attr(
                                            'href', '#').html(Object.values(
                                            post)[
                                            2]))).append($(document.createElement(
                                                'div'))
                                            .addClass('col-12 mt-2 mb-5 user-pfp')
                                            .append($(
                                                document.createElement('img')).attr(
                                                'src',
                                                'https://pm1.aminoapps.com/6407/de5edd6e322153713245e23c17b54ab662c5b0d8_00.jpg'
                                            ).addClass('rounded-1 shadow'))).append($(
                                                document.createElement('div')).addClass(
                                                'col-12 mt-4 post-date text-wrap')
                                            .append($(
                                                    document.createElement('p'))
                                                .addClass(
                                                    'text-muted').html(Object.values(
                                                    post)[
                                                    6]))))).append($(document.createElement(
                                                'div'))
                                            .addClass('col-lg-8 col-sm-10 post-content').append(
                                                $(
                                                    document.createElement('div')).addClass(
                                                    'row')
                                                .append($(document.createElement('a')).addClass(
                                                        'text-muted id' + Object.values(post)[0]
                                                    )
                                                    .attr('href',
                                                        '{{ route('foro.show', '') }}' +
                                                        '/' + Object.values(post)[0]).attr(
                                                        'onmouseover',
                                                        'this.className = "text-muted text-decoration-underline id' +
                                                        Object.values(post)[0] + '"').attr(
                                                        'onmouseout',
                                                        'this.className = "text-muted id' +
                                                        Object
                                                        .values(post)[0] + '"').html(">>" +
                                                        Object
                                                        .values(post)[0]))).append($(document
                                                .createElement('div')).addClass(
                                                'container-fluid').text(Object.values(post)[
                                                3])))
                                        .append($(document.createElement('div')).addClass(
                                            'col-lg-2 col-sm-2 post-buttons').append($(
                                            document
                                            .createElement('div')).addClass(
                                            'row d-flex text-center mb-4').append($(
                                                document
                                                .createElement('div')).addClass(
                                                'col-12 mt-3').append($(document
                                                    .createElement('i')).addClass(
                                                    'bi bi-chat').attr('onclick',
                                                    'reply('+ Object.values(post)[0]+')')
                                                .attr('onmouseover',
                                                    'this.className = "bi bi-chat-fill"'
                                                )
                                                .attr('onmouseout',
                                                    'this.className = "bi bi-chat"'))
                                            .append($(document.createElement('p')).html(
                                                Object.values(post)[4]))).append($(
                                                document
                                                .createElement('div')).addClass(
                                                'col-12 mt-3').append($(document
                                                    .createElement('i')).addClass(
                                                    'bi bi-heart').attr('onclick',
                                                    'like()')
                                                .attr('onmouseover',
                                                    'this.className = "bi bi-heart-fill"'
                                                )
                                                .attr('onmouseout',
                                                    'this.className = "bi bi-heart"'))
                                            .append($(document.createElement('p')).html(
                                                Object.values(post)[5]))).append($(
                                            document
                                            .createElement('div')).addClass(
                                            'col-12 mt-3').append($(document
                                                .createElement('i')).addClass(
                                                'bi bi-flag').attr('onclick',
                                                'window.location = "' + (route("postreport.create", {
                                                    uuid: String(Object.values(post)[0])
                                                }) ) + '"')
                                            .attr('onmouseover',
                                                'this.className = "bi bi-flag-fill"'
                                            )
                                            .attr('onmouseout',
                                                'this.className = "bi bi-flag"'))))))).appendTo(
                                        foroDiv);
                                    if (Object.values(post)[1] && Object.values(post)[1] > 0) {
                                        $($(document.createElement('a')).attr('href',
                                                    '{{ route('foro.show', '') }}' + '/' + Object
                                                    .values(
                                                        post)[1]).addClass(
                                                    'text-mute fst-italic text-end')
                                                .html("   --Respondiendo a: " + Object.values(post)[1]))
                                            .appendTo($(".id" + Object.values(post)[0]))
                                    }
                                }

                            );
                        }
                    })


                });
            }
            callAjax();
            $("#post_something").submit(function(e) {
                e.preventDefault();
                var content_text = $("#content_post").val();
                var isChildOf = $("#parentPost").val();
                var _token = $("[name='_token']").val();
               
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    url: "{{ route('foro.post') }}",
                    type: "POST",
                    data: {
                        token: _token,
                        isChildOf: isChildOf,
                        content: content_text
                    },
                    method: "POST",
                    success: function(response) {

                        $("#content_post").val('');
                        $("#foro").append($(document.createElement("div")).addClass("spinner-border"));
                        callAjax();
                        $("#parentPost").val('0');


                    },
                    error: function() {
                        console.log("error")
                        $("#parentPost").val('0');

                    }
                })
            });
        </script>
        <a onclick="topFunction()" id="myBtn"><svg xmlns="http://www.w3.org/2000/svg" width="5vw" height="5vh"
                fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
            </svg></a>

        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" id="fixedbutton" onclick="forumButton()" width="5vw"
                height="5vh" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg></a>
    </div>
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



    <style>
        #fixedbutton {
            position: fixed;
            bottom: 0px;
            right: 0px;
            margin-bottom: 2%;
        }

        #fixedbutton:hover {
            color: #66a3ff;
            transform: translateY(-0.25em);
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 7%;
            right: 0px;
            cursor: pointer;
            margin-bottom: 2%;
        }

        #myBtn:hover {}
    </style>
    <script>
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

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
