@extends("maintemplate")

@section("http_body")

<head>
    <title>Kyatsu! - Historia</title>
  </head>
<body>
<p>Nombre de usuario: {{ $user["name"]}}</p>
<p>Creado en: {{ $user["created_at"]}}</p>
<p>Descripcion</p>
</body>

@endsection("http_body")