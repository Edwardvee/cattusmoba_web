@extends("maintemplate")

@section("http_body")

<head>
  <title>Kyatsu - Tienda</title>
  <link rel="stylesheet" href="{{url('css/store.css')}}">
</head>


<div class="megaContainer row">
<div class="container col-12">
  <div class="card">
  <div class="image">
        <img src={{url('img/moneda1.png')}}>
      </div>
      <div class="content">
      <div class="card-body">
      <h3 class="card-title">1 Nicoins</h3>
      <p class="card-text">No seas rata y compra mas de 1</p>
      <a href="#" class="btn btn-primary">USD 1.99</a>
    </div>
    </div>
  </div>

  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #43345d;
      min-height: 800px;
    }

    .container {
      position: relative;
      width: 1100px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
    }

    .container .card {
      position: relative;
      max-width: 300px;
      height: 215px;
      background-color: #fff;
      margin: 30px 10px;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
      transition: 0.3s ease-in-out;
      border-radius: 15px;
    }

    .container .card:hover {
      height: 320px;
    }

    .container .card .image {
      position: relative;
      width: 260px;
      height: 260px;
      top: -40%;
      left: 8px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .container .card .image img {
      max-width: 100%;
      border-radius: 15px;
    }

    .container .card .content {
      position: relative;
      top: -140px;
      padding: 10px 15px;
      color: #111;
      text-align: center;
      visibility: hidden;
      opacity: 0;
      transition: 0.3s ease-in-out;
    }

    .container .card:hover .content {
      margin-top: 30px;
      visibility: visible;
      opacity: 1;
      transition-delay: 0.2s;
    }
  </style>