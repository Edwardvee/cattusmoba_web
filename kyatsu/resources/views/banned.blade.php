@extends("maintemplate")
@section("http_headers")
    <style>
        body  {
            background-image: url("img/banned/banhammer.jpg");
            background-color: #cccccc;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
        }
        @keyframes moving {
            from {transform: translateX(-100vh);}
            to {
                transform: translateX(0vh);
            }
        }
        
        .animacion {
            animation: moving 1.5s forwards;
            display: flex;
            border-style: solid;
            display: inline-block;
            padding: 1.5vh;
            border-radius: 10vh 10vh 10vh 10vh;
            font-size: 3vh;
            background-color: black;
            color: white;
            align-items: flex-start;
            text-align: center;
        }
        .center {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            height: 100vh;
            margin: 3vh;
        }
        .form-floating:hover {
            -webkit-transition: transform 0.5s ease-in-out;
            transform: scale(1.1);
        }
        textarea {
            height: auto !important;
        }
    </style>
@endsection
@section("http_body")
    <div class="center">
        <p class="animacion">Usted ha sido suspendido del servicio</p>
            <form>
            <div class="form-floating mb-3 mt-3">
                <input type="text" readonly class="form-control" id="input--1" value="{{ $banned['bannable_id'] }}">
                <label for="input-0">UUID</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <textarea type="textarea" readonly class="form-control textarea-resize-auto" id="input-0">{{ $banned['comment'] }}</textarea>
                <label for="input-0">Razon de suspencion</label>
            </div>
            <div class="form-floating mt-3 mb-3"> 
                <input type="text" readonly class="form-control" value="{{ $banner }}" id="input-1">
                <label for="input-1">Baneado por</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <textarea type="textarea" readonly class="form-control textarea-resize-auto" id="input-2">{{ $ban_reason }}</textarea>
                <label for="input-2">Categoria de suspencion</label>
            </div>
            <div class="form-floating mt-3 mb-3"> 
                <input type="text" readonly class="form-control" value="  {{ $banned['expired_at'] }} " id="input-2">
                <label for="input-2">Fecha de expiracion del baneo</label>
            </div>
            </form>
        <p class="alert alert-warning">Usted tiene 7 (SIETE) DÍAS desde la fecha de suspencion para apelar</p>
    </div>
@endsection