<head>
  <title>Ta Te Ti</title>
</head>

<body>
  <div class="d-flex text-center">
    <h1 class="text-center">Ta-Te-Ti</h1>

    <div class="row">
      <div class="col-md-4"></div>
      
      <div class="col-md-4">
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

      <div class="col-md-4"></div>

    </div>
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
    background-size: cover;
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
const heroButtons = document.querySelectorAll(".heroes");

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

let player1 = null;
let player2 = null;
let gameEnded = false;
let currentPlayer = null;
let cellOccupied = Array(9).fill(false);

heroButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    if (player1 === null) {
      player1 = new Player("ivan", "X", button.style.backgroundImage);
      currentPlayer = player1;
      button.style.display = "none"; // Oculta el botón del héroe seleccionado
    } else if (player2 === null) {
      player2 = new Player("manuel", "O", button.style.backgroundImage);
      button.style.display = "none"; // Oculta el botón del héroe seleccionado
    }
  });
});

cells.forEach((cell, index) => {
  cell.addEventListener("click", () => {
    if (gameEnded || cellOccupied[index]) {
      return;
    }

    cell.style.backgroundImage = currentPlayer.url;
    cellOccupied[index] = true;

    if (checkWin()) {
      gameEnded = true;
      alert(currentPlayer.name + ' es el ganador!');
      showResetButton();
    } else if (checkTie()) {
      gameEnded = true;
      alert("Excelente juego, es un empate!");
      showResetButton();
    }
    currentPlayer = currentPlayer === player1 ? player2 : player1;
  });
});

const resetButton = document.getElementById("reset-button");
resetButton.addEventListener("click", () => {
  resetGame();
});

function checkWin() {
  return winConditions.some(condition => {
    return condition.every(index => {
      return cellOccupied[index] && cells[index].style.backgroundImage === currentPlayer.url;
    });
  });
}

function checkTie() {
  return cellOccupied.every(occupied => occupied);
}

function showResetButton() {
  resetButton.style.display = "block";
}

function resetGame() {
  cells.forEach((cell, index) => {
    cell.style.backgroundImage = "";
    cellOccupied[index] = false;
  });
  currentPlayer = player1;
  gameEnded = false;
  resetButton.style.display = "none";
}
</script>