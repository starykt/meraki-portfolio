
const express = require('express');
const app = express();
const http = require('http');
const httpServer = http.createServer(app);

app.get('/', (req, res) => {
  res.send('<h1>Hello world</h1>');
});

const io = require("socket.io")(httpServer, {
  cors: {
    origin: "*"
  },
});

io.on("connection", function (socket) {
  const auth = socket.handshake.auth
  if (auth != undefined && auth != null && auth != NaN) {
    let session_id = auth;
    console.log("socket connected", session_id);
  } else {
    console.log("Sessão invalida")
  }
  
  socket.on("sentMessage", (idEnviado) => {
    console.log("Enviando mensagem para", idEnviado)
      io.emit("receivedMessage", {to: idEnviado, from: auth.sessionID.idUser});

  });

});



httpServer.listen(3000, () =>
  console.log(`server listening at http://localhost:3000`)
);