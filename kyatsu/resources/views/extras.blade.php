<head>
  <title>Ta Te Ti</title>
</head>

<body>
  <div class="d-flex text-center">
    <h1 class="text-center">Ta-Te-Ti</h1>
    <center>
      <div id="board">
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <div class="cells player"></div>
        <button id="reset-button">Reiniciar Juego</button>
      </div>
    </center>
  </div>
  <div class="col-12">
    @foreach ($getheroes as $heroes)
    <a><button class="heroes" style="background-image: url('img/heros_img/@php echo $heroes["uuid"];@endphp.png')"></a>
    @endforeach
  </div>
</body>

<style>
  .heroes {
    width: 120px;
    height: 120px;
    background-size: cover;
  }
  .col-12{
    margin-top: 32px;
  }
  #board {
    display: flex;
    flex-wrap: wrap;
    width: 300px;
    height: 300px;
  }

  .cells {
    width: 30%;
    height: 100px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 60px;
    cursor: pointer;
  }

  .player-x {
    background-image: url('ruta_imagen_jugador_x.png');
    background-size: cover;
  }

  .player-o {
    background-image: url('ruta_imagen_jugador_o.png');
    background-size: cover;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  const cells = document.querySelectorAll(".cells");

  const winConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ];

  function Player(name, token, url) {
    this.name = name;
    this.token = token;
    this.url = url;
  }

  const player1 = new Player("ivan", "X", '<img style="width: inherit" src="{{url('img/heros_img/90b2b001-072d-4e42-8bb7-4a0346c4834c.png')}}">');
  const player2 = new Player("manuel", "O", '<img style="width: inherit" src="{{url('img/heros_img/795773be-63a5-4d48-83d1-fb6a2a744ce6.png')}}">');


  let gameEnd = false;
  let currentPlayer = player1
  cells.forEach(cell => {
    cell.addEventListener("click", () => {
      if (gameEnd) {
        return;
      }
      if (cell.innerHTML === "") {  

        cell.innerHTML = currentPlayer.url;

        if (checkWin()) {
          gameEnd = true;
          alert(currentPlayer.name + ' es el ganador!');
          showResetButton(); // Muestra el botón de reinicio
        } else if (checkTie()) {
          gameEnd = true;
          alert("Excelente juego, es un empate!");
          showResetButton(); // Muestra el botón de reinicio
        }
        if (currentPlayer == player1) {
          currentPlayer = player2
        } else {
          currentPlayer = player1
        }
      }
    });
  });

  // Manejador de eventos para el botón de reinicio
  const resetButton = document.getElementById("reset-button");
  resetButton.addEventListener("click", () => {
    resetGame(); // Llama a la función para reiniciar el juego
  });

  function checkWin() {
    return winConditions.some(condition => {
      return condition.every(index => {
        return cells[index].innerHTML == currentPlayer.url;
      });
    });
  }

  function checkTie() {
    return Array.from(cells).every(cell => {
      return cell.innerHTML !== "";
    });
  }

  // Función para mostrar el botón de reinicio
  function showResetButton() {
    resetButton.style.display = "block";
  }

  // Función para reiniciar el juego
  function resetGame() {
    cells.forEach(cell => {
      cell.innerHTML = "";
    });
    currentPlayer = player1;
    gameEnd = false;
    resetButton.style.display = "none"; // Oculta el botón de reinicio
  }
</script>