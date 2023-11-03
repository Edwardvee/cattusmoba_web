const Websocket = require('ws')
const server = new Websocket.Server({port: '8080'})
jugadores=[]

server.on('connection', socket =>{
    if(jugadores.length < 2){
    socket.id = jugadores.length
    jugadores.push(socket)
    console.log("nuevo jugador")

    }
    if(socket.id == 0){
        socket.send(JSON.stringify({
            type:0,
            message:"player1"
        }))
    }
    if(socket.id == 1){
        socket.send(JSON.stringify({
            type:0,
            message:"player2"
        }))
    }

    socket.on('message', function message(data) {
        
        jsondata = JSON.parse(data)
        
       
        if(jsondata.type == 2){
            console.log("Personaje")
            server.clients.forEach(function each(socket){
                socket.send(JSON.stringify({
                    type:2,
                    player:jsondata.player, 
                    index:jsondata.index
                }));
            })
        }
        if(jsondata.type == 1){
        
            console.log("Jugada")
            server.clients.forEach(function each(socket){
                socket.send(JSON.stringify({
                    type:1, index:jsondata.index, currentPlayer:jsondata.currentPlayer}
                ));
            })
        }

        if(jsondata.type == 3){
        
            console.log("Status")
            server.clients.forEach(function each(socket){
                socket.send(JSON.stringify({
                    type:3, message:"Termino el Juego!"}
                ));
                socket.close();
                jugadores = [];
            })
        }
        
      });
})

const { json } = require("express");