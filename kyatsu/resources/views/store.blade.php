  @extends("maintemplate")

  @section("http_body")
  <head>
    <title>Kyatsu - Tienda</title>
    <link rel="stylesheet" href="{{url('css/store.css')}}">
  </head>
  <body> 
<div class="megaContainer row">
  <div class="container col-3">
    <div class = card>
      <div class = image>
        <img href = "#" src={{url('img/moneda1.png')}}> 
      </div>
      <div class = content>
        <h3>1 Nicois</h3>
        <p>No seas rata y compra mas de 1</p>
      </div>
    </div>    
    </div>

    <div class="container col-3">
    <div class = card>
      <div class = image>
        <img href = "#" src={{url('img/moneda1.png')}}> 
      </div>
      <div class = content>
        <h3>50 Nicoins</h3>
       <p>50 Nicoins (no confunindirse con 50 sombras de grey)</p>  
      </div>
    </div>    
    </div>
    <div class="container col-3">
    <div class = card>
      <div class = image>
        <img href = "#" src={{url('img/moneda1.png')}}> 
      </div>
      <div class = content>
        <h3>500+2 Nicoins<</h3>
        <p>te regalamos 2 Nicoins para que sepas que sos el 2 en todo</p>
    </div>
    </div>    
    </div>

 <div class = "container col-3">
    <div class = card>
      <div class = image>
        <img href = "#" src={{url('img/moneda1.png')}}> 
      </div>
      <div class = content>
        <h3>>5E+1321 Nicoins</h3>
        <p>Ahora el Nicoin vale menos que el peso pero mas que el dolar</p>
      </div>
    </div>    
  </div>

  </div>
</body>

<style>
* { 
  margin : 0;
  padding: 0;
  box-sizing : border-box;
  font-family : "Poppins", sans-serif;
}
body {
  display : flex;
  align-items : center;
  justify-content : center;  
  background-color: #43345d;
  min-height : 800px;
}

.container {
  position : relative;
  width : 1100px;
  display : flex;
  align-items : center;
  justify-content : center;
  padding : 30px;  
}

.container .card {
  position: relative;
  max-width : 300px;
  height : 215px;  
  background-color : #fff;
  margin : 30px 10px;
  padding : 20px 15px;
  display : flex;
  flex-direction : column;
  box-shadow : 0 5px 20px rgba(0,0,0,0.5);
  transition : 0.3s ease-in-out;
  border-radius : 15px;
}
.container .card:hover {
  height : 320px;    
}

.container .card .image {
  position : relative;
  width : 260px;
  height : 260px;
  top : -40%;
  left: 8px;
  box-shadow : 0 5px 20px rgba(0,0,0,0.2);
  z-index : 1;
}

.container .card .image img {
  max-width : 100%;
  border-radius : 15px;
}

.container .card .content {
  position : relative;
  top : -140px;
  padding : 10px 15px;
  color : #111;
  text-align : center;
  visibility : hidden;
  opacity : 0;
  transition : 0.3s ease-in-out;
}

.container .card:hover .content {
   margin-top : 30px;
   visibility : visible;
   opacity : 1;
   transition-delay: 0.2s;
}
</style>