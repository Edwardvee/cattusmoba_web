

const socket = new WebSocket("ws://localhost:8080")
  const cells = document.querySelectorAll(".cells");
const heroButtons = document.querySelectorAll(".heroes");
const player1Hero = document.getElementById("player1-hero");
  const player2Hero = document.getElementById("player2-hero");
  const resetButton = document.getElementById("reset-button");
  const turno_h1 = document.getElementById("turno_h1");

  resetButton.addEventListener("click", () => {
    location.reload();
  });
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

function Player(name, url) {
  this.name = name;
  this.url = url;
}

let you = null;
let player1 = null;
let player2 = null;
let gameEnded = false;
yourturn = false;
let cellOccupied = Array(9).fill(false);


function playMove(index, player){
    if (gameEnded || cellOccupied[index]) {
        return;
      }
      cells[index].style.backgroundImage = player.url; 
      cellOccupied[index] = true;
      if (checkWin(player)) { 
        gameEnded = true;
        alert(player.name + ' es el ganador!');
        socket.send(JSON.stringify({
          type:3,
          message:"Hay un ganador!"
        }))
        showResetButton();
      } else if (checkTie()) {
        gameEnded = true;
        alert("Excelente juego, es un empate!");
        socket.send(JSON.stringify({
          type:3,
          message:"Hay un Empate!"
        }))
        showResetButton();
      }
    
      
      yourturn = false
      if(yourturn == true){
        turno_h1.innerText = "Tu turno"
      }
      if(yourturn == false ){
        turno_h1.innerText = "Turno del oponente"
      }
};

function selectPlayer(player, btn_index){
  if (player == 'player1' && player1 == null) {
 
    player1 = new Player("player1", heroButtons[btn_index].style.backgroundImage);
    player1Hero.style.backgroundImage = heroButtons[btn_index].style.backgroundImage; // Muestra el héroe del jugador 1
    currentPlayer = player1;
    heroButtons[btn_index].style.display = "none"; 
    if(you === 'player1'){
      you = player1
      yourturn = true
    }
  }
  else if (player == 'player2' && player2 == null) {
      player2 = new Player("player2", heroButtons[btn_index].style.backgroundImage);
      player2Hero.style.backgroundImage =  heroButtons[btn_index].style.backgroundImage; // Muestra el héroe del jugador 2
      heroButtons[btn_index].style.display = "none"; 
      if(you === 'player2'){
        you = player2
      }
    } 
}



heroButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
      socket.send(JSON.stringify({type:2, player:you, index:index}))
      selectPlayer(you, index) 
  });
});

cells.forEach((cell, index) => {
  cell.addEventListener("click", () => {
    if (gameEnded || cellOccupied[index] || player1 == null || player2 == null) {
      return;
    }
    try{
      if(yourturn == true){
        yourturn = false;
      var jugada = {type:1, index:index, currentPlayer:you};
      socket.send(JSON.stringify(jugada))
        playMove(index, you) 
      }
    } 

    catch(error){
        console.log(error)
    }

  });
});




function checkWin(player) {
  return winConditions.some(condition => {
    return condition.every(index => {
      return cellOccupied[index] && cells[index].style.backgroundImage === player.url;
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



//conexion al websocket



socket.onmessage = ({ data }) => {

        try {
            jsonresult = JSON.parse(data)
            console.log(jsonresult)
            switch(jsonresult.type){
              case 0: 
              
              you = jsonresult.message
              console.log("eres "+ you);
              break;

              case 1: 
                playMove(jsonresult.index,jsonresult.currentPlayer);
                if(jsonresult.currentPlayer.name != you.name){
                  yourturn = true;
                
                }
                else{
                  yourturn = false;
                }  if(yourturn == true){
                  turno_h1.innerText = "Tu turno"
                }
                if(yourturn == false ){
                  turno_h1.innerText = "Turno del oponente"
                }


              break;
              case 2:  
              selectPlayer(jsonresult.player,jsonresult.index)
            break;
            }
                

        } catch (error) {
            console.log(error)
        }
}
const w_cell = document.querySelectorAll(".cells");

 
