<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <link href="css/navbar.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dasomnya') }}"><img src="img/empresa.png" width="85" height="85"></img></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ route('mainpage')}}"><img src="img/f.png" width="69" height="70"></img></a>

      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">


         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  style="font-size:23px" href="#" id="navbarDarkDropdownMenuLink" role="buztton" data-bs-toggle="dropdown" aria-expanded="false">
            Informacion del juego </a>
          <ul class="dropdown-menu dropdownDark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item dropdownText" href="#">Historia</a></li>
            <li><a class="dropdown-item dropdownText" href="#">Reglas</a></li>
            <li><a class="dropdown-item dropdownText" href="#">Cómo jugar</a></li>
          </ul>
        </li>

          <li class="nav-item">
            <a class="nav-link" style="font-size:23px" href="{{ route('heroes') }}">Héroes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size:23px" href="javascript:void(0)">Link</a>
          </li>
        </ul> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <form action="" class="search-bar">
          <input maxlength="16" class="input-search" type="search" placeholder="Busca un jugador" required>
          <i class="fa fa-search"></i>
          <a class="a-search" href="javascript:void(0)" id="clear-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg></a>
        </form>
      </div>

    </div>
  </nav>
  @yield("http_body")
</body>

</html>
<script>
  const clearInput = () => {
    const input = document.getElementsByTagName("input")[0];
    input.value = "";
  }

  const clearBtn = document.getElementById("clear-btn");
  clearBtn.addEventListener("click", clearInput);
</script>