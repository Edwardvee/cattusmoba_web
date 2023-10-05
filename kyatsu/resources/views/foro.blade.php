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




        <div class="container-fluid post border">
            <div class="row">
                <div class="col-lg-2 col-sm-12 post-user-info">
                    <div class="row d-flex text-center">
                        <div class="col-12 mt-3 user-name">
                            <p>Nombre de usuario</p>
                        </div>
                        <div class="col-12 mt-2 mb-5 user-pfp"><img class="rounded-1 shadow"
                                src="https://pm1.aminoapps.com/6407/de5edd6e322153713245e23c17b54ab662c5b0d8_00.jpg"
                                alt=""></div>
                        <div class="col-12 mt-4 post-date text-wrap">
                            <p class="text-muted">11/9/2023 11:18</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-10 post-content">
                    <div class="row"><p class="text-muted">>>000000</p> <i></i></div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque convallis ex quis nunc
                    lacinia, sit amet congue urna malesuada. Sed sit amet maximus felis. Suspendisse ultrices nisl elit,
                    suscipit malesuada dolor malesuada quis. Curabitur mollis augue non erat viverra, at suscipit mauris
                    vestibulum. Aenean vulputate sem sit amet quam dictum suscipit. Sed
                    pharetra accumsan lectus, in
                    scelerisque libero consectetur at. Phasellus nec semper urna. Curabitur sagittis auctor massa porta
                    venenatis. Pellentesque placerat magna massa, ut placerat dolor vestibulum in. Phasellus a sapien in
                    dolor euismod luctus eu vitae urna. Suspendisse aliquam tempus finibus. Maecenas auctor non tortor
                    eget suscipit. Quisque eleifend ut ex eu interdum. Etiam sodales ligula at congue accumsan.
                    Vestibulum pulvinar porta lorem, ornare fermentum tortor convallis tempus.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque convallis ex quis nunc
                    lacinia, sit amet congue urna malesuada. Sed sit amet maximus felis. Suspendisse ultrices nisl elit,
                    suscipit malesuada dolor malesuada quis. Curabitur mollis augue non erat viverra, at suscipit mauris
                    vestibulum. Aenean vulputate sem sit amet quam dictum suscipit. Sed
                    pharetra accumsan lectus.
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


    </div>

    <script></script>
