<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="\public\css\style-chat.css" />

</head>

<body>
    <div class="container">
        <p style="color: #000;
            font-family: Inter;
            font-size: 32px;
            font-style: normal;
            line-height: normal;
            z-index:3;
            padding-left: 100px;"> <?= $viewVar['userRecipient']->getNickname() ?>#<?= $viewVar['userRecipient']->getTag() ?></p>
        <div class="chat-container"></div>
        <div class="textarea-wrapper">
            <textarea id="mensagem" placeholder="..."></textarea>
            <div class="button-container">
                <button onclick="sentMessage(<?= $viewVar['userRecipient']->getIdUser() ?>)">
                    <img src="\public\images\playButton.png" alt="Ícone do botão">
                </button>
            </div>
        </div>
    </div>

    <script src="/public/js/socket.io.min.js"></script>

    </div>
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
            const data = {
                message: message,
                idUser_Recipent: idUser_Recipent
            };

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                dataType: 'JSON',
                body: JSON.stringify(data)
            };

            fetch('http://localhost:8000/conversation/sendMessage/', requestOptions)
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                    throw new Error('Erro ao enviar a mensagem');
                })
                .then(data => {
                    console.log('Mensagem enviada com sucesso:', data);
                    getMessagesToChat()
                    socket.emit("sentMessage", idUser_Recipent);
                })
                .catch(error => {
                    console.error('Erro:', error);
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
            const userLogged = <?= $viewVar['userLogged']->getIdUser() ?>;
            var chatContainer = document.querySelector(".chat-container");
            chatContainer.innerHTML = "";

            messages.forEach(function(message, index) {
                var messageElement = document.createElement("div");
                messageElement.className = "message " + (message.sender.idUser === userLogged ? "sent" : "received");
                let content = "";

                if (message.sender.idUser !== userLogged) {
                    content += `<img src='http://<?php echo APP_HOST; ?>/public/images/users/${message.sender.avatar}' class='img-user-message-received'>`;
                }

                content += "<p>" + message.message + "</p>";

                if (message.sender.idUser === userLogged) {
                    content += `<img src='http://<?php echo APP_HOST; ?>/public/images/users/${message.sender.avatar}' class='img-user-message-sent'>`;
                }

                messageElement.innerHTML = content;

                if (index === 0) {
                    // Adiciona um margin-top à primeira mensagem
                    messageElement.style.marginTop = "20px"; // Ajuste o valor conforme necessário
                }

                chatContainer.appendChild(messageElement);
                scrollToBottom();
            });
        }

        function scrollToBottom() {
            var chatContainer = document.querySelector(".chat-container");
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        getMessagesToChat();
        scrollToBottom();
    </script>