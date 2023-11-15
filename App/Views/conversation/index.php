<br><br><br><br><br><br><br><br><br><br>
<style>
    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
        /* Permite redimensionamento vertical */
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.5;
    }

    button {
        background-color: purple;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .chat-container {
        padding-left: 5%;
        padding-right: 5%;
        margin: 20px auto;
        overflow: hidden;
    }

    .message {
        clear: both;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .message p {
        padding: 10px;
        border-radius: 5px;
        max-width: 70%;
        margin: 5px;
        word-wrap: break-word;
    }

    .sent {
        float: right;
        background-color: purple;
        color: #fff;
    }

    .received {
        float: left;
        background-color: #ddd;
    }
</style>
<p style="color: white;">Você está conversando com: <?= $viewVar['userRecipient']->getNickname() ?>#<?= $viewVar['userRecipient']->getTag() ?></p>
<div class="chat-container">

</div>
<textarea id="mensagem"></textarea>
<button onclick="sentMessage(<?= $viewVar['userRecipient']->getIdUser() ?>)">Enviar mensagem</button>



<script src="/public/js/socket.io.min.js" ></script>
<script>
    var URL = "http://localhost:3000";
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
            getMessagesToChat()
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
            dataType: 'JSON',
            body: JSON.stringify(data)
        };

        // Fazendo a requisição usando fetch
        fetch('http://localhost:8000/conversation/sendMessage/', requestOptions)
            .then(response => {
                if (response.ok) {
                    return response.text(); // Parseia a resposta JSON caso a requisição seja bem-sucedida
                }
                throw new Error('Erro ao enviar a mensagem'); // Lança um erro caso a resposta não seja bem-sucedida
            })
            .then(data => {
                console.log('Mensagem enviada com sucesso:', data); // Lida com os dados da resposta
                getMessagesToChat()
                socket.emit("sentMessage", idUser_Recipent);
            })
            .catch(error => {
                console.error('Erro:', error); // Lida com erros de requisição
            });

    }

    function sentMessage(idEnviado) {
        const message = document.getElementById('mensagem').value;
        callAPISendMessage(message, idEnviado)
        
        document.getElementById('mensagem').value = "";

    }

    async function getMessagesToChat() {
        const conversationId = '<?= $viewVar['userRecipient']->getIdUser() ?>';

        try {
            const response = await fetch(`http://localhost:8000/conversation/chat/${conversationId}`);

            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status} - ${response.statusText}`);
            }

            const messages = await response.json();
            displayMessages(messages);
        } catch (error) {
            console.error(error);
        }
    }

    function displayMessages(messages) {
        const userLogged = <?= $viewVar['userLogged']->getIdUser() ?>
        // Obtém o elemento chat-container
        var chatContainer = document.querySelector(".chat-container");

        // Limpa o conteúdo atual do chat-container
        chatContainer.innerHTML = "";

        // Itera sobre as mensagens e adiciona cada uma ao chat-container
        messages.forEach(function(message) {
            var messageElement = document.createElement("div");
            messageElement.className = "message " + (message.sender.idUser === userLogged ? "sent" : "received");
            messageElement.innerHTML = "<p>" + message.message + "</p>";
            chatContainer.appendChild(messageElement);
        });
    }

    // Exemplo de uso: substitua 'ID_PASSADO' pelo ID da conversa desejada
    getMessagesToChat();
</script>