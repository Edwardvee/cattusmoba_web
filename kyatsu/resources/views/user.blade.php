@extends("usertemplate")

@section("http_body")

<head>
    <title>Kyatsu! - Usuario</title>
</head>
<br>
<br><br><br><br>
<div class="container-fluid">
<p>Nombre de usuario: {{ $user["name"]}}</p>
<p>Creado en: {{ $user["created_at"]}}</p>
<p>Descripcion</p>  
</div>

@endsection("http_body")