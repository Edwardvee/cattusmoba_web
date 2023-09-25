@extends("maintemplate")

@section("http_body")

<head>
  <title>Kyatsu - Tienda</title>
  <link rel="stylesheet" href="{{url('css/store.css')}}">
</head>

<div class="container">

  <div class="row">

    <div class="col-md-3">
      <div class="container este">
        <div class="card">
          <div class="imgBx">
            <img src={{url('img/ivangor.png')}}>
          </div>
          <div class="contentBx">
            <h2>500 Quirocoins</h2>
            <div class="size">
              <p class="text-light">No seas rata y compra mas de 500</p>
            </div>
            <div class="color">
              <p class="text-light">USD 15.99</p>
            </div>
            <a href="#">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="container est">
        <div class="card">
          <div class="imgBx">
            <img src={{url('img/ivangor.png')}}>
          </div>
          <div class="contentBx">
            <h2>1000 Quirocoins</h2>
              <div class="size">
                <p class="text-light">puto el que no compra</p>
              </div>
              <div class="color">
              <p class="text-light">USD 24.59</p>
            </div>
            <a href="#">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="container es">
        <div class="card">
          <div class="imgBx">
            <img src={{url('img/ivangor.png')}}>
          </div>
          <div class="contentBx">
            <h2>1500 Quirocoins</h2>
            <div class="size">
              <p class="text-light">si no compras mas te va a dar colera</p>
            </div>
            <div class="color">
              <p class="text-light">USD 49.99</p>
            </div>
            <a href="#">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="container t">
        <div class="card">
          <div class="imgBx">
            <img src={{url('img/ivangor.png')}}>
          </div>
          <div class="contentBx">
            <h2>2500 Quirocoins</h2>
            <div class="size">
              <p class="text-light">el Quirocoins vale menos que el peso pero mas que el dolar</p>
            </div>
            <div class="color">
              <p class="text-light">USD 99.99</p>
            </div>
            <a href="#">Comprar</a>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>