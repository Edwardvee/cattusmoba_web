@section("http_body")

  <head>
    <title>Ta Te Ti</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div class="d-flex text-center">
      <h1 class="text-center">Ta-Te-Ti</h1>
   <center> <div id="board">
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <div class="cells"></div>
      <button id="reset-button">Reiniciar Juego</button>
    </div></center>
    
    </div>
    
  <!--    @foreach ($getheroes as $heroes)
    
                        <div class="row g-0">
                        <img src="{{url('img/heros_img/'.  $heroes["uuid"] .'.png')}}" class="img-fluid rounded-start" alt="..." style="height: 100%">
                        </div>
        
    
     @endforeach -->
    <script src="./script.js"></script>
  </body>
















<style>
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
</style>
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
let currentPlayer = "X";
let gameEnd = false;

cells.forEach(cell => {
  cell.addEventListener("click", () => {
    if (gameEnd) {
      return;
    }
    if (cell.textContent === "") {
      cell.textContent = currentPlayer;
      if (checkWin()) {
        gameEnd = true;
        alert(`${currentPlayer} es el ganador!`);
        showResetButton(); // Muestra el botón de reinicio
      } else if (checkTie()) {
        gameEnd = true;
        alert("Excelente juego, es un empate!");
        showResetButton(); // Muestra el botón de reinicio
      } else {
        currentPlayer = currentPlayer === "X" ? "O" : "X";
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
      return cells[index].textContent === currentPlayer;
    });
  });
}

function checkTie() {
  return Array.from(cells).every(cell => {
    return cell.textContent !== "";
  });
}

// Función para mostrar el botón de reinicio
function showResetButton() {
  resetButton.style.display = "block";
}

// Función para reiniciar el juego
function resetGame() {
  cells.forEach(cell => {
    cell.textContent = "";
  });
  currentPlayer = "X";
  gameEnd = false;
  resetButton.style.display = "none"; // Oculta el botón de reinicio
}

</script>
@endsection("http_body")