@extends("maintemplate")

@section("http_body")


<head>
  <title>Kyatsu! - Heroes</title>
  <link href="css/heroes.css" rel="stylesheet">
</head>

<body>
<br>
<br>
<br><br>

  <p>Este es la pagina de Heroes</p>

<div class="container" >
  <div class="row">
    <div class="col mt-3">
    <article class="card mt-1" >
  <img
    class="card__background"
    src="img/jinx.png"
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

    </div>
    <div class="col mt-3">
    <article class="card">
  <img
    class="card__background"
    src="img/Aphelios.png"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow">
      <h2 class="card__title">Aphelios</h2>
      <p class="card__description">
      Aphelios cuenta con cinco armas donde solo puede utilizar dos a la vez. Cada arma tiene su propio ataque básico y su propia habilidad, 
      además de que cada arma cuenta con 50 balas de munición. Las armas de Aphelios aparecen en el siguiente orden: Calibrum: Aphelios puede atacar de larga distancia.
      </p>
    </div>
  </div>
</article>

    </div>
    <div class="col mt-3">
    <article class="card">
  <img
    class="card__background"
    src="img/vayne.png"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow">
      <h2 class="card__title">Vayne</h2>
      <p class="card__description">
       Como hija única de una adinerada pareja de Demacia, Vayne disfrutó de una crianza privilegiada. Pasó la mayor parte de su infancia
       distrayéndose con actividades solitarias: leía, aprendía música y coleccionaba ávidamente insectos que encontraba en los terrenos de la mansión.
      </p>
    </div>
  </div>
</article>
    </div>
  </div>
</div>




<div class="container">
  <div class="row">
    <div class="col mt-3">
    <article class="card">
  <img
    class="card__background"
    src="img/ezreal.png"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow" >
      <h2 class="card__title">Ezreal</h2>
      <p class="card__description">
      Nacido y criado en un barrio adinerado de Piltóver, Ezreal siempre fue un niño curioso. Sus padres 
      eran arqueólogos reconocidos, por lo que se acostumbró a sus largas ausencias lejos del hogar familiar, fantaseando con frecuencia con unirse a ellos durante sus viajes.
      </p>
    </div>
  </div>
</article>
</div>
<div class="col mt-3">
    <article class="card">
  <img
    class="card__background"
    src="img/cait.png"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow" >
      <h2 class="card__title">Caitlyn</h2>
      <p class="card__description">
      Nacido y criado en un barrio adinerado de Piltóver, Ezreal siempre fue un niño curioso. Sus padres 
      eran arqueólogos reconocidos, por lo que se acostumbró a sus largas ausencias lejos del hogar familiar, fantaseando con frecuencia con unirse a ellos durante sus viajes.
      </p>
    </div>
  </div>
</article>

    </div>
    <div class="col mt-3">
    <article class="card">
  <img
    class="card__background"
    src="img/as.jpg"
    width="1920"
    height="2193"
  />
  <div class="card__content | flow">
    <div class="card__content--container | flow">
      <h2 class="card__title">Juan</h2>
      <p class="card__description">
      Juan
      </p>
    </div>
  </div>
</article>
    </div>
  </div>
</div>


</body>

@endsection("http_body")