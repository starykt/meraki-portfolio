<textarea id="mensagem"></textarea>
<button onclick="sentMessage(<?= $viewVar['userRecipient']->getIdUser() ?>)" style="margin-top: 500px;">Enviar mensagem</button>

<script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
<script>
    var URL = "http://172.16.3.24:3000";
    var socket = io(URL);

    let sessionID = {
        idUser: '<?= $viewVar['userLogged']->getIdUser() ?>',
        nickname: '<?= $viewVar['userLogged']->getNickname() ?>'
    };

    if (sessionID) {
        socket.auth = {
            sessionID
        };
        socket.connect();
    }

    socket.on("receivedMessage", (data) => {
        if (data.to.toString() == '<?= $viewVar['userLogged']->getIdUser() ?>') {
            console.log("Recebi a msg")
            var audio = new Audio('http://localhost:8000/public/audios/popup_message.mp3');
            audio.play();

        }
    });

    function callAPISendMessage(message, idUser_Recipent) {

        // Objeto com os dados a serem enviados no corpo da requisição
        const data = {
            message: message,
            idUser_Recipent: idUser_Recipent
        };

        // Configuração da requisição
        const requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        };

        // Fazendo a requisição usando fetch
        fetch('http://localhost:8000/conversation/sendMessage/'+idUser_Recipent+"/"+message, requestOptions)
            .then(response => {
                if (response.ok) {
                    return response.text(); // Parseia a resposta JSON caso a requisição seja bem-sucedida
                }
                throw new Error('Erro ao enviar a mensagem'); // Lança um erro caso a resposta não seja bem-sucedida
            })
            .then(data => {
                console.log('Mensagem enviada com sucesso:', data); // Lida com os dados da resposta
            })
            .catch(error => {
                console.error('Erro:', error); // Lida com erros de requisição
            });

    }

    function sentMessage(idEnviado) {
        const message= document.getElementById('mensagem').value;
        callAPISendMessage(message, idEnviado)
        socket.emit("sentMessage", idEnviado);

    }
</script>