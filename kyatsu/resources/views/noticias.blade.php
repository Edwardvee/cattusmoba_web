@extends('maintemplate')
@section("http_headers")
<link href="css/noticias.css" rel="stylesheet">
<title> Kyatsu! - Noticias</title>
@endsection

@section('http_body')
 <div   >
 @foreach ($getnoticias as $noticia)
 <div class="card mb-4" style="">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{url('img/'.  $noticia["name"] .'.png')}}" class="img-fluid rounded-start" alt="..." style="height: 100%">
                        </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <p class="card-text"><small class="text-muted">{{ $noticia["category"] }}</small></p>
                            <h5 class="card-title">{{$noticia["name"] }}</h5>
                            <p class="card-text newsText">{{ $noticia["content"] }}</p>
                            <p class="card-text"><small class="text-muted">Subido el {{ $noticia["created_at"] }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>     
 @endforeach

 </div>
@endsection("http_body")
