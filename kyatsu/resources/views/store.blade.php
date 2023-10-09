@extends("maintemplate")

@section("http_body")

<script src="https://sdk.mercadopago.com/js/v2"></script> 
<head>
  <title>Kyatsu - Tienda</title>
  <link rel="stylesheet" href="{{url('css/store.css')}}">
</head>
<div class="container">
  <div class="row">
    <div class="col-md-3  bounce-in-left {">
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
            <a id="myBtn">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 bounce-in-top">
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
            <a id="myBtn2">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 bounce-in-top">
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
            <a id="myBtn3">Comprar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 bounce-in-right">
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
            <a  id="myBtn4">Comprar</a>
          </div>
        </div>
      </div>
    </div>
    <div id="myModal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
<div class="container">
  <path d="M13.7678 10.2322L10.2322 13.7678M13.7678 13.7678L10.2322 10.2322" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round"/></svg>
<div class="heading">
  <img src={{url('img/empresa.png')}} width="55" height="55" viewBox="0 0 24 24">
  <h1 id="titulo-compra">Detalles de pago</h1>
  </div>
  <label for="name">Nombre</label>
    <input class="fondotarjeta" type="text" id="name" name="name" placeholder="Nombre completo"/>
  <br>
  <label for="name">Envio de comprobante</label>
    <input class="fondotarjeta" type="text" id="name" name="name" placeholder="ingresa tu correo"/>
  <br>
  <label for="card">Número de tarjeta</label>
    <input class="fondotarjeta" type="text" minlength="16" maxlength="16" id="card" name="card" placeholder="0000 0000 0000 0000"/>
  <br>
  <div class="exp-cvc">
    <div class="expiration">
  <label for="expiry">Fecha de expiración</label>
    <input class="fondotarjeta" name="expiry" id="expiry" type="text" required placeholder="00/00"/>
    <br>
    </div>
    <div class="security">
  <label for="cvc">CVC</label>
    <input class="fondotarjeta" type="text" minlength="3" maxlength="4" id="cvc" name="cvc" placeholder="XXXX" />
  <br>
    </div>
  </div>

<div class="container row">
<div class="btnn col">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.8768 16.1682C13.0292 15.7535 13.6375 15.7535 13.7899 16.1682L14.2066 17.3023C14.2554 17.435 14.3637 17.5395 14.5013 17.5865L15.6774 17.9884C16.1075 18.1353 16.1075 18.7218 15.6774 18.8688L14.5013 19.2706C14.3637 19.3177 14.2554 19.4221 14.2066 19.5549L13.7899 20.6889C13.6375 21.1037 13.0292 21.1037 12.8768 20.6889L12.4601 19.5549C12.4113 19.4221 12.303 19.3177 12.1653 19.2706L10.9892 18.8688C10.5591 18.7218 10.5591 18.1353 10.9892 17.9884L12.1653 17.5865C12.303 17.5395 12.4113 17.435 12.4601 17.3023L12.8768 16.1682Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M14.6394 3.47278C14.8711 2.84241 15.7956 2.84241 16.0272 3.47278L16.8211 5.63332C16.8953 5.8351 17.0599 5.99384 17.2691 6.06534L19.5097 6.83089C20.1634 7.05426 20.1634 7.94574 19.5097 8.16911L17.2691 8.93466C17.0599 9.00616 16.8953 9.1649 16.8211 9.36668L16.0272 11.5272C15.7956 12.1576 14.8711 12.1576 14.6394 11.5272L13.8455 9.36668C13.7714 9.1649 13.6068 9.00616 13.3975 8.93466L11.157 8.16911C10.5032 7.94574 10.5032 7.05426 11.157 6.83089L13.3975 6.06534C13.6068 5.99384 13.7714 5.8351 13.8455 5.63332L14.6394 3.47278Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M6.48641 9.36289C6.65786 8.87904 7.34214 8.87904 7.51358 9.36289L7.9824 10.686C8.03728 10.8409 8.15913 10.9627 8.31401 11.0176L9.63711 11.4864C10.121 11.6579 10.121 12.3421 9.63711 12.5136L8.31401 12.9824C8.15913 13.0373 8.03728 13.1591 7.9824 13.314L7.51358 14.6371C7.34214 15.121 6.65786 15.121 6.48641 14.6371L6.0176 13.314C5.96272 13.1591 5.84087 13.0373 5.68599 12.9824L4.36289 12.5136C3.87904 12.3421 3.87904 11.6579 4.36289 11.4864L5.68599 11.0176C5.84087 10.9627 5.96272 10.8409 6.0176 10.686L6.48641 9.36289Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round"/>
</svg>
<div id="submit">Comprar</div>
</div>


<div class="btnn col mplol" >pagar</div>


<?php
$access_token='TEST-6678738600000427-092909-610f68117364afd8e10da0ca791ba649-1244103756';
MercadoPago\SDK::setAccessToken($access_token);
$preference=new MercadoPago\Preference();
$preference->back_urls=array(
  "success"=>"google.com",
  "failure"=>"youtube.com",
  "pending"=>"ornnhub.com"
);
$productos=[];
$item = new MercadoPago\Item();
$item->title="Quirocoins";
$item->quantity=1;
$item->unit_price=1500;
array_push($productos, $item);
$preference->id;
$preference->items=$productos;
$preference->save();

?>

</div>
</div>
</div>
</div>
</div>


<script>
var public_key='TEST-ec0c3fc0-d331-4cc3-8edd-0474d32047ab';
function botonmp() {
  const mp = new MercadoPago(public_key, {
                  locale: 'es-AR'
              });
          
              const checkout = mp.checkout({
                  preference: {
                      id: '<?php echo $preference->id; ?>',
                  },
              });
              // Abre el formulario de pago
              checkout.open();
}
var botonMP = document.querySelector('.mplol');
if (botonMP) {
    botonMP.addEventListener('click', function () {
        // Ejecuta tu función personalizada cuando se haga clic en el botón
        botonmp();
    });
}


 /*  modal 1er item */
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
  var h1 = document.getElementById("titulo-compra");
  h1.innerHTML = "Detalles de pago - 500 Quirocoins";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

 /*  modal 2do item */
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn2");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
  var h1 = document.getElementById("titulo-compra");
  h1.innerHTML = "Detalles de pago - 1000 Quirocoins";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

 /*  modal 3er item */
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn3");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
  var h1 = document.getElementById("titulo-compra");
  h1.innerHTML = "Detalles de pago - 1500 Quirocoins";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

 /*  modal 4to  item */
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn4");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
  var h1 = document.getElementById("titulo-compra");
  h1.innerHTML = "Detalles de pago - 2500 Quirocoins";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
document.addEventListener("DOMContentLoaded", function() {
    $('.mercadopago-button').css('background-color', 'transparent');
    $('.mercadopago-button').css('width', '100%');
    $('.mercadopago-button').css('color', 'black'); 
    var boton = document.getElementsByClassName("btnn col mplol");
    boton.value = "Potente";
    let currentProduct;

    function abrirVentanaPago(preferenceId) {
        var botonPago = $("script[data-preference-id='" + preferenceId + "']").next();
        currentProduct = preferenceId;
        botonPago.click();
    }

    // Resto de tu código aquí
});

    window.addEventListener("message", function (event) {

        if(event.origin === "https://www.mercadopago.com.ar"){
            
            if (event.data.type === "submit") {

                let compra = currentProduct; 
                console.log("Información de la compra:", currentProduct);
                $.ajax({
                    url: "views/store.blade.php",
                    method: "POST",
                    data: {producto: currentProduct},

                    success: function(res){
                        alert("Compra realizada con éxito");
                    },
                    
                    error: function(res){
                        console.log(res);
                        alert("Hubo un error en la compra, comunicarse con soporte urgentemente");
                    }
                });
            } 
        }
    });
  let mercadobuton = document.getElementsByClassName('mplol')[0];
  mercadobuton.innerHTML = "<i class='bi bi-cash-stack'></i> Pagar con Mercado Pago" 
</script>

