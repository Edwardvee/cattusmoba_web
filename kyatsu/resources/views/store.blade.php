@extends("maintemplate")

@section("http_body")
<head>
  <title>Kyatsu - Tienda</title>
  <link rel="stylesheet" href="{{url('css/store.css')}}">

</head>


<div class="container store row mx-auto text-center">
    <div class="col-md-3  me-auto" >
    <img class="coin" src="{{url('img/coin.png')}}"> 
  <p>1000 KP</p>
   <p style="margin-top: -20px">K-Points</p>
        <div class="price"> $7.99 </div>
    </div>
    <div class="col-md-3 me-auto">
    <img class="coin" src="{{url('img/coin.png')}}"> 
        <p>2800 KP</p>
    <p style="margin-top: -20px">K-Points</p>
    <div class="price "> $19.99 </div>
    </div>
    <div class="col-md-3  me-auto">
    <img class="coin" src="{{url('img/coin.png')}}"> 
      <p>5000 KP</p> 
     <p style="margin-top: -20px">K-Points</p>
    <div class="price"> $31.99 </div>
    </div>
    <div class="col-md-3  me-auto" >
    <img class="coin" src="{{url('img/coin.png')}}"> 
  <p>13500 KP</p>
   <p style="margin-top: -20px">K-Points</p>
        <div class="price"> $79.99 </div>
    </div>
  

</div>


@endsection("http_body")