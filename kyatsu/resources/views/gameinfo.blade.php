@extends("maintemplate")

@section("http_body")

<head>
  <title>Kyatsu - Info</title>
</head>

<body>
  @php
  echo(auth()->user())
  @endphp
  <P> a </P>
</body>
@endsection("http_body")