@extends("maintemplate")

@section("http_body")


<head>
  <title>Kyatsu! - Heroes</title>
  <link href="css/heroes.css" rel="stylesheet">
</head>

<body>
  <p>Este es la pagina de Heroes</p>

  <article class="card">
  <img
    class="card__background"
    src="img/jinx.png"
    alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow">
      <h2 class="card__title">Jinx</h2>
      <p class="card__description">
      Jinx, una maniática e impulsiva criminal de Zaun, vive para sembrar el caos sin pararse a pensar en las consecuencias, 
      Con un arsenal de juguetes letales a su disposición, desata las explosiones más brillantes y los estallidos más ruidosos
       para dejar un rastro de caos y pánico a su paso.
      </p>
    </div>
  </div>
</article>

</body>

@endsection("http_body")